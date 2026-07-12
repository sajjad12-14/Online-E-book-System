<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $orders = Order::when($search, function ($query) use ($search) {

            $query->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%");

        })
            ->latest()
            ->paginate(10);

        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'Pending')->count();

        $processingOrders = Order::where('status', 'Processing')->count();

        $completedOrders = Order::where('status', 'Delivered')->count();

        return view('Admin.orders.index', compact(
            'orders',
            'search',
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders'
        ));
    }

    public function show($id)
    {
        $order = Order::with([
            'items.book',
            'items.book.author',
        ])->findOrFail($id);

        return view('Admin.orders.view', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $order = Order::findOrFail($id);

        $order->status = $request->status;

        $order->save();

        return redirect()
            ->back()
            ->with('success', 'Order Status Updated Successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Pehle order items delete karo
        $order->items()->delete();

        // Phir order delete karo
        $order->delete();

        return redirect()
            ->route('admin.orders')
            ->with('success', 'Order deleted successfully.');
    }
}
