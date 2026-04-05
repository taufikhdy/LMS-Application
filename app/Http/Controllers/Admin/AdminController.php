<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $books = Book::with('categories')->latest()->get();
        return view('admin.dashboard', compact('books'));
    }
}
