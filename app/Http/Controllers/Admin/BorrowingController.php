<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    //

    public function adminBorrows()
    {
        $borrowings = Borrowing::with('user', 'details.book')->where('status', 'pending')->latest()->get();
        $returning = Borrowing::with('user', 'details.book')->where('status', 'borrowed')->latest()->get();

        return view('admin.borrowings.borrowings', compact('borrowings', 'returning'));
    }

    public function detail($id)
    {
        $borrowing = Borrowing::with('details.book', 'user')->findOrFail($id);
        return view('admin.borrowings.detail', compact('borrowing'));
    }

    public function confirm($id)
    {
        $borrowing = Borrowing::with('details')->findOrFail($id);

        foreach ($borrowing->details as $detail) {
            Book::find($detail->book_id)->decrement('stock');
        }

        $borrowing->update([
            'status' => 'borrowed',
            'due_date' => Carbon::now()->addDays(7)
        ]);

        return back()->with('success', 'Dikonfirmasi');
    }

    public function returnBook($id)
    {
        $borrowing = Borrowing::with('details')->findOrFail($id);

        $today = Carbon::now();
        $due = Carbon::parse($borrowing->due_date);
        $fine = 0;

        if ($today->gt($due)) {
            $daysLate = $today->diffInDays($due);
            $fine = $daysLate * 1000;
        }

        foreach ($borrowing->details as $detail) {
            $detail->update([
                'returned_at' => now()
            ]);

            $detail->book->increment('stock');
        }

        $borrowing->update([
            'status' => 'returned',
            'return_date' => now(),
            'fine' => $fine
        ]);

        return redirect()->route('admin.borrows');
    }

    public function delete($id)
    {
        Borrowing::destroy($id);
        return redirect()->route('admin.borrows');
    }
}
