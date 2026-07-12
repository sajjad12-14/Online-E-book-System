<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class OfferBookController extends Controller
{
    public function index()
    {
        $offerBooks = Book::with(['category', 'author'])
            ->where('status', 1)
            ->latest()
            ->paginate(12);

        $categories = Category::where('status', 1)->get();

        return view('User.offer-books', compact(
            'offerBooks',
            'categories'
        ));
    }
}
