<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\HeroSlider;
use App\Models\Order;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $totalBooks = Book::count();

        $totalCategories = Category::count();

        $totalAuthors = Author::count();

        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'pending')->count();

        $completedOrders = Order::where('status', 'completed')->count();

        $totalRevenue = Order::where('status', 'completed')->sum('total_amount');

        $recentOrders = Order::latest()->take(5)->get();

        return view('Admin.Dashboard', compact(

            'totalBooks',

            'totalCategories',

            'totalAuthors',

            'totalOrders',

            'pendingOrders',

            'completedOrders',

            'totalRevenue',

            'recentOrders'

        ));
    }

    // =========================
    // HERO SLIDER LIST (FIXED)
    // =========================
    public function heroSlider(Request $request)
    {
        $search = $request->search;

        // HERO SLIDERS (SEARCH + PAGINATION FIX)
        $sliders = HeroSlider::when($search, function ($query) use ($search) {
            $query->where('title', 'LIKE', '%'.$search.'%');
        })
            ->latest()
            ->paginate(5); // ✔ FIX (important)

        // STATS
        $totalSliders = HeroSlider::count();
        $activeSliders = HeroSlider::where('status', 1)->count();
        $inactiveSliders = HeroSlider::where('status', 0)->count();

        return view('Admin.hero_slider.index', compact(
            'sliders',
            'search',
            'totalSliders',
            'activeSliders',
            'inactiveSliders'
        ));
    }

    // =========================
    // CREATE FORM
    // =========================
    public function createHeroSlider()
    {
        if (HeroSlider::count() >= 4) {

            return redirect('/admin/hero-slider')
                ->with('error', 'Maximum 4 Hero Sliders are allowed.');
        }

        return view('Admin.hero_slider.create');
    }

    // =========================
    // STORE SLIDER
    // =========================
    public function storeHeroSlider(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'button_text' => 'required|max:100',
            'button_link' => 'nullable|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/hero_slider'), $imageName);

        HeroSlider::create([
            'title' => $request->title,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return redirect('/admin/hero-slider')
            ->with('success', 'Slider Added Successfully');
    }

    // =========================
    // EDIT FORM
    // =========================
    public function editHeroSlider($id)
    {
        $slider = HeroSlider::findOrFail($id);

        return view('Admin.hero_slider.edit', compact('slider'));
    }

    // =========================
    // UPDATE SLIDER
    // =========================
    public function updateHeroSlider(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'button_text' => 'required|max:100',
            'button_link' => 'nullable|max:255',
            'status' => 'required',
        ]);

        $slider = HeroSlider::findOrFail($id);

        if ($request->hasFile('image')) {

            $oldImage = public_path('uploads/hero_slider/'.$slider->image);

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->imagehome->move(public_path('uploads/hero_slider'), $imageName);

            $slider->image = $imageName;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;

        $slider->save();

        return redirect('/admin/hero-slider')
            ->with('success', 'Slider Updated Successfully');
    }

    // =========================
    // DELETE SLIDER
    // =========================
    public function deleteHeroSlider($id)
    {
        $slider = HeroSlider::findOrFail($id);

        $imagePath = public_path('uploads/hero_slider/'.$slider->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $slider->delete();

        return redirect('/admin/hero-slider')
            ->with('success', 'Slider Deleted Successfully');
    }

    public function orders()
    {

        $orders = Order::latest()->paginate(10);

        return view('Admin.orders.index', compact('orders'));
    }

    public function orderDetails($id)
    {

        $order = Order::with('items.book')
            ->findOrFail($id);

        return view('Admin.orders.details', compact('order'));
    }

    public function updateOrderStatus(Request $request, $id)
    {

        $order = Order::findOrFail($id);

        $order->status = $request->status;

        $order->save();

        return back()->with('success', 'Order status updated successfully.');
    }
}
