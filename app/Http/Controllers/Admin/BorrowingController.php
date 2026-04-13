<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BorrowDetail;
use App\Models\Borrowing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    //

    public function adminBorrows(Request $request)
    {
        $search = $request->search;

        $pending = Borrowing::with('user', 'details.book')
            ->where('status', 'pending');

        if ($search) {
            $pending->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $pending = $pending->latest()->get();


        $borrowed = Borrowing::with('user', 'details.book')
            ->where('status', 'borrowed');

        if ($search) {
            $borrowed->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $borrowed = $borrowed->latest()->get();

        return view('admin.borrowings.borrowings', compact('pending', 'borrowed'));
    }

    public function detail($id)
    {
        $details = BorrowDetail::with('borrowing', 'book')->where('borrowing_id', $id)->get();
        return view('admin.borrowings.detail', compact('details'));
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

    // public function reject($id)
    // {
    //     $borrowing = Borrowing::with('details')->findOrFail($id);

    //     $borrowing->update([
    //         'status' => 'borrowed',
    //         'due_date' => Carbon::now()->addDays(7)
    //     ]);

    //     return back()->with('success', 'Dikonfirmasi');
    // }

    public function returnBook($id)
    {
        $borrowing = Borrowing::with('details')->findOrFail($id);

        $today = Carbon::now()->startOfDay();
        $due = Carbon::parse($borrowing->due_date)->startOfDay();
        $fine = 0;

        if ($today->greaterThan($due)) {
            $daysLate = $due->diffInDays($today);
            $fine = $daysLate * 4000;
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

        // $details = BorrowDetail::where('borrow_id', $borrowing->id);

        // foreach($details as $detail){
        //     $detail->returned_at = 'now';
        // }

        return redirect()->route('admin.borrows')->with('success', 'Dikonfirmasi');
    }

    public function fines(){
        $borrowing = Borrowing::with('user')->latest()->get();

        return view('admin.fine.fine', compact('borrowing'));
    }

    public function delete($id)
    {
        Borrowing::destroy($id);
        return redirect()->route('admin.borrows');
    }
}
