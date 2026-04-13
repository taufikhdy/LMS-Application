<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $transaksi = Borrowing::count();
        $pending = Borrowing::where('status', 'pending')->count();

        $books = Book::withCount('borrowDetails')
            ->orderBy('borrow_details_count', 'desc') //snake_case + _count
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('books', 'transaksi', 'pending'));
    }
}
