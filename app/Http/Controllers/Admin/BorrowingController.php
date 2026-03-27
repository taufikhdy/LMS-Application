<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    //

    public function borrows()
    {
        $borrowings = Borrowing::with('user', 'details.book')->latest()->get();

        return view('admin.borrowings.borrowings', compact('borrowings'));
    }

    public function detail($id)
    {
        $borrowing = Borrowing::with('details.book', 'user')->findOrFail($id);
        return view('admin.borrowings.detail', compact('borrowing'));
    }

    public function returnBook($id)
    {
        $borrowing = Borrowing::findOrFail($id);

        $borrowing->update([
            'status' => 'returned',
            'return_date' => now()
        ]);

        foreach($borrowing->details as $detail){
            $detail->update([
                'returned_at' => now()
            ]);

            $detail->book->increment('stock');
        }

        return redirect()->route('admin.borrows.index');
    }

    public function delete($id)
    {
        Borrowing::destroy($id);
        return redirect()->route('admin.borrows.index');
    }
}
