<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //

    public function index()
    {
        $books = Book::with('categories')->latest()->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $book = Book::create($request->all());
        $book->categories()->sync($request->category_id);

        return redirect()->route('admin.books.index');
    }

    public function detail($id)
    {
        $book = Book::with('categories')->findOrFail($id);
        return view('admin.books.detail', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::latest()->get();

        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        $book->categories()->sync($request->category_id);

        return redirect()->route('admin.books.index');
    }

    public function delete($id)
    {
        Book::destroy($id);
        return redirect()->route('admin.books.index');
    }
}
