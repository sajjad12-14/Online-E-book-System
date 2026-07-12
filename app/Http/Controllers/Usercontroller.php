<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Competition;
use App\Models\CompetitionSubmission;
use App\Models\HeroSlider;

class Usercontroller extends Controller
{
    // ==========================
    // Home Page
    // ==========================
    public function Home()
    {
        // Hero Slider
        $sliders = HeroSlider::where('status', 1)
            ->latest()
            ->get();

        // Popular Books
        $popularBooks = Book::with(['category', 'author'])
            ->where('status', 1)
            ->where('is_popular', 1)
            ->latest()
            ->take(12)
            ->get()
            ->chunk(4);

        // Featured Authors
        $authors = Author::withCount('books')
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        // Competition Winners
        $winners = CompetitionSubmission::where('is_winner', 1)
            ->orderBy('winner_position', 'asc')
            ->take(3)
            ->get();

        return view('User.Home', compact(
            'sliders',
            'popularBooks',
            'authors',
            'winners'
        ));
    }

    // ==========================
    // Popular Books Page
    // ==========================
    public function popularBooks()
    {
        $popularBooks = Book::with(['category', 'author'])
            ->where('status', 1)
            ->where('is_popular', 1)
            ->latest()
            ->paginate(12);

        $categories = Category::where('status', 1)->get();

        return view('User.popular-books', compact(
            'popularBooks',
            'categories'
        ));
    }

    // ==========================
    // Best Selling Books Page
    // ==========================
    public function bestSellingBooks()
    {
        $bestSellingBooks = Book::with(['category', 'author'])
            ->where('status', 1)
            ->where('is_best_selling', 1)
            ->latest()
            ->paginate(12);

        $categories = Category::where('status', 1)->get();

        return view('User.best-selling-books', compact(
            'bestSellingBooks',
            'categories'
        ));
    }

    // ==========================
    // Book Details
    // ==========================
    public function bookDetails($slug)
    {
        $book = Book::with(['category', 'author'])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $relatedBooks = Book::with(['category', 'author'])
            ->where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        return view('User.book-details', compact(
            'book',
            'relatedBooks'
        ));
    }

    // ==========================
    // Competition Page
    // ==========================
    public function competitions()
    {
        $competitions = Competition::where('status', 1)
            ->latest()
            ->get();

        return view('User.competitions', compact('competitions'));
    }

    // ==========================
    // Competition Details
    // ==========================
    public function competitionDetails($slug)
    {
        $competition = Competition::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('User.competition-details', compact(
            'competition'
        ));
    }

    public function winnerProfile($id)
    {
        $winner = CompetitionSubmission::with('competition')
            ->findOrFail($id);

        return view('User.winner-profile', compact('winner'));
    }
}
