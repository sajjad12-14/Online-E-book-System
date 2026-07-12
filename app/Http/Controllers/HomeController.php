<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function books()
    {
        $books = Book::with(['category', 'author'])
            ->where('status', 1)
            ->latest()
            ->paginate(12);

        return view('User.books', compact('books'));
    }
}
