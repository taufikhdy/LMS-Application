<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BorrowDetail;
use App\Models\Borrowing;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserBorrowingController extends Controller
{
    public function borrows()
    {
        $borrowings = Borrowing::with('details.book')
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->get();

        return view('user.borrowings.borrowings', compact('borrowings'));
    }

    public function borrowStore(Request $request)
    {
        // validasi
        $request->validate([
            'books' => 'array'
        ]);

        $books = $request->books ?? [];

        $fines = User::withSum('borrowings', 'fine')->where('id', Auth::user()->id)->first();

        if (count($books) === 0) {
            return back()->with('error', 'Silahkan pilih minimal 1 buku');
        }

        // max 3 buku
        elseif (count($books) > 3) {
            return back()->with('error', 'Maksimal 3 buku');
        }

        elseif($fines->borrowings_sum_fine > 0){
            return back()->with('error', 'Silahkan bayar denda terlebih dahulu agar bisa meminjam buku');
        }

        DB::transaction(function () use ($request) {

            $borrowing = Borrowing::create([
                'user_id' => Auth::user()->id,
                'borrow_date' => now(),
                'due_date' => null,
                'status' => 'pending'
            ]);

            // ambil buku
            $books = Book::whereIn('id', $request->books)->get();

            foreach ($books as $book) {

                // validasi stok
                if ($book->stock <= 0) {
                    throw new \Exception('Stok habis');
                }

                $borrowing->details()->create([
                    'book_id' => $book->id
                ]);
            }

            // hapus dari cart
            CartItem::whereIn('book_id', $request->books)
                ->whereHas('cart', function ($q) {
                    $q->where('user_id', Auth::user()->id);
                })
                ->delete();
        });

        return redirect()->route('user.borrows')
            ->with('success', 'Pengajuan berhasil');
    }
}
