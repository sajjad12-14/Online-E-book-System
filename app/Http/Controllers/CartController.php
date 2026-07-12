<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;

class CartController extends Controller
{
    public function add($id)
    {
        $book = Book::findOrFail($id);

        $sessionId = session()->getId();

        $cart = Cart::where('session_id', $sessionId)
            ->where('book_id', $book->id)
            ->first();

        if ($cart) {

            $cart->quantity += 1;

            $cart->save();
        } else {

            Cart::create([

                'session_id' => $sessionId,

                'book_id' => $book->id,

                'quantity' => 1,

                'price' => $book->discount_price ?? $book->price,

            ]);
        }

        return redirect()->back()->with(
            'success',
            'Book added to cart successfully.'
        );
    }
    public function index()
    {
        $sessionId = session()->getId();

        $cartItems = Cart::with('book')
            ->where('session_id', $sessionId)
            ->get();

        return view('User.cart', compact('cartItems'));
    }
    public function increase($id)
    {
        $cart = Cart::findOrFail($id);

        $cart->quantity++;

        $cart->save();

        return back();
    }

    public function decrease($id)
    {
        $cart = Cart::findOrFail($id);

        if ($cart->quantity > 1) {

            $cart->quantity--;

            $cart->save();
        }

        return back();
    }

    public function remove($id)
    {
        Cart::findOrFail($id)->delete();

        return back()->with('success', 'Book removed from cart.');
    }
    public function checkout()
    {
        $sessionId = session()->getId();

        $cartItems = Cart::with('book')
            ->where('session_id', $sessionId)
            ->get();

        return view('User.checkout', compact('cartItems'));
    }
}
