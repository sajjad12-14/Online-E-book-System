<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;


class CheckoutController extends Controller
{


    public function index()
    {

        $sessionId = session()->getId();


        $cartItems = Cart::with('book')
            ->where('session_id', $sessionId)
            ->get();


        return view('User.checkout', compact('cartItems'));
    }




    public function placeOrder(Request $request)
    {


        // Validation

        $request->validate([

            'name' => 'required',

            'email' => 'required|email',

            'phone' => 'required',

            'city' => 'required',

            'address' => 'required',

        ]);



        $sessionId = session()->getId();



        // Cart Items

        $cartItems = Cart::with('book')
            ->where('session_id', $sessionId)
            ->get();



        if ($cartItems->count() == 0) {

            return redirect('/')
                ->with('error', 'Your cart is empty.');
        }





        // Calculate Total

        $total = 0;


        foreach ($cartItems as $item) {

            $total += $item->price * $item->quantity;
        }





        // Create Order


        $order = Order::create([


            'name' => $request->name,


            'email' => $request->email,


            'phone' => $request->phone,


            'city' => $request->city,


            'address' => $request->address,


            'total_amount' => $total,


            'status' => 'pending',


            'payment_method' => $request->payment_method,

            'payment_status' => $request->payment_method == 'Cash On Delivery'
                ? 'Pending'
                : 'Paid',

            'transaction_id' => null


        ]);






        // Save Order Items


        foreach ($cartItems as $item) {


            OrderItem::create([


                'order_id' => $order->id,


                'book_id' => $item->book_id,


                'quantity' => $item->quantity,


                'price' => $item->price


            ]);
        }







        // Empty Cart


        Cart::where('session_id', $sessionId)
            ->delete();







        return redirect('/thank-you')
            ->with('success', 'Order placed successfully!');
    }
}
