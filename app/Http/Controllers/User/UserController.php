<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $books = Book::latest()->get();
        return view('user.dashboard', compact('books'));
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
