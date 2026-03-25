<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BorrowDetail;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBorrowingController extends Controller
{
    //

    public function index()
    {
        $books = Book::where('stock', '>', 0)->latest()->get();
        return view('user.books.index', compact('books'));
    }

    public function borrowStore(Request $request)
    {
        $borrowing = Borrowing::create([
            'user_id' => Auth::user()->id,
            'borrow_date' => now(),
            'status' => 'borrowed'
        ]);

        foreach($request->book_ids as $bookId){
            $book = Book::findOrFail($bookId);

            if($book->stock <= 0){
                return redirect()->back()->with('error', 'Stock Tidak Tersedia');
            }

            BorrowDetail::create([
                'borrowing_id' => $borrowing->id,
                'book_id' => $bookId
            ]);

            $book->decrement('stock');

            return redirect()->route('user.history');
        }
    }

    public function history()
    {
        $borrowings = Borrowing::where('user_id', Auth::user()->id)->with('deatils.book')->latest()->get();
        return view('user.history', compact('borrowings'));
    }
}
