<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $books = Book::latest()->get();
        $borrowings = Borrowing::with('details.book')->where('user_id', Auth::user()->id)->where('status', 'borrowed')->latest()->get();
        return view('user.dashboard', compact('books', 'borrowings'));
    }

    public function books(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter;

        $books = Book::query();

        if ($search) {
            $books->where('title', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%");
        }

        if ($filter) {
            $data = explode(':', $filter);
            $type = $data[0];
            $value = $data[1];

            if ($type == 'author') {
                $books->where('author', 'LIKE', "%$value%");
            }

            if ($type == 'category') {
                $books->whereHas('categories', function ($q) use ($value) {
                    $q->where('name', 'LIKE', "%$value%");
                });
            }
        }

        $books = $books->latest()->get();

        $categories = Category::all();
        $authors = Book::pluck('author')->unique();

        return view('user.books.books', compact('books', 'categories', 'authors'));
    }

    public function bookDetail($id)
    {
        $book = Book::with('categories')->findOrFail($id);
        return view('user.books.detail', compact('book'));
    }

    public function cart()
    {
        $cart = Cart::with('items.book')->firstOrCreate(['user_id' => Auth::id()]);

        return view('user.carts.carts', compact('cart'));
    }

    public function addToCart($book_id)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::user()->id,
        ]);

        CartItem::firstOrCreate([
            'cart_id' => $cart->id,
            'book_id' => $book_id
        ]);

        return redirect()->back()->with('success', 'success added to cart');
    }

    public function removeCartItem($book_id)
    {
        CartItem::findOrFail($book_id)->delete();
        return redirect()->back();
    }
}
