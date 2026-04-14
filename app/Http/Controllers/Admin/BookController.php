<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function books(Request $request)
    {
        $search = $request->search;

        $books = Book::query();

        if ($search) {
            $books->where('title', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%")
                ->orWhere('publisher', 'like', "%$search%")
                ->orWhereHas('categories', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%");
                });
        }

        // $books = $books->with('categories')->latest()->get();
        $books = $books
            ->with('categories')
            ->withCount(['borrowDetails as borrowed_count' => function ($q) {
                $q->whereHas('borrowing', function ($q2) {
                    $q2->where('status', 'borrowed');
                });
            }])->latest()->get();

        return view('admin.books.books', compact('books'));
    }

    public function addBook()
    {
        $categories = Category::latest()->get();
        return view('admin.books.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',

            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('books', 'public');
        } else {
            $path = null;
        }

        $book = Book::create($validate);
        $book->image = $path;
        $book->save();

        $book->categories()->attach($validate['categories']);
        // $book->categories()->sync($request->category_id);

        return redirect()->route('admin.books')->with('success', 'success added books');
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

        $validate = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {

            if ($book->image && Storage::disk('public')->exists($book->image)) {
                Storage::disk('public')->delete($book->image);
            }

            $validate['image'] = $request->file('image')->store('books', 'public');
        }

        $book->update($validate);

        $book->categories()->sync($validate['categories']);

        return redirect()->route('admin.books')->with('success', 'success update books');
    }

    public function delete($id)
    {
        Book::destroy($id);
        return redirect()->route('admin.books');
    }
}
