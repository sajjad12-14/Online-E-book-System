<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $books = Book::with(['category', 'author'])
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(5);

        // Statistics
        $totalBooks = Book::count();
        $activeBooks = Book::where('status', 1)->count();
        $outOfStock = Book::where('stock', 0)->count();

        return view('Admin.book.index', compact(
            'books',
            'search',
            'totalBooks',
            'activeBooks',
            'outOfStock'
        ));
    }

    public function create()
    {

        $categories = Category::where('status', 1)->get();
        $authors = Author::where('status', 1)->get();

        return view('Admin.book.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'author_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'pdf' => 'required|file|mimes:pdf|max:10240',
            'status' => 'required',
        ]);

        // Image Upload

        $imageName = time().'_book.'.$request->image->extension();

        $request->image->move(
            public_path('uploads/books'),
            $imageName
        );

        // PDF Upload

        $pdfName = time().'_book.'.$request->pdf->extension();

        $request->pdf->move(
            public_path('uploads/pdfs'),
            $pdfName
        );

        // Save Book

        Book::create([

            'category_id' => $request->category_id,

            'author_id' => $request->author_id,

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'description' => $request->description,

            'image' => $imageName,

            'pdf' => $pdfName,

            'price' => $request->price,

            'discount_price' => $request->discount_price,

            'stock' => $request->stock,

            'is_popular' => $request->has('is_popular'),

            'is_best_selling' => $request->has('is_best_selling'),

            'is_featured' => $request->has('is_featured'),

            'status' => $request->status,

        ]);

        return redirect()
            ->route('admin.books')
            ->with('success', 'Book Added Successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        $categories = Category::where('status', 1)->get();

        $authors = Author::where('status', 1)->get();

        return view('Admin.book.edit', compact(
            'book',
            'categories',
            'authors'
        ));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'author_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:10240',
            'status' => 'required',
        ]);

        // Image Update
        if ($request->hasFile('image')) {

            if (file_exists(public_path('uploads/books/'.$book->image))) {
                unlink(public_path('uploads/books/'.$book->image));
            }

            $imageName = time().'_book.'.$request->image->extension();

            $request->image->move(public_path('uploads/books'), $imageName);

            $book->image = $imageName;
        }

        // PDF Update
        if ($request->hasFile('pdf')) {

            if (file_exists(public_path('uploads/pdfs/'.$book->pdf))) {
                unlink(public_path('uploads/pdfs/'.$book->pdf));
            }

            $pdfName = time().'_book.'.$request->pdf->extension();

            $request->pdf->move(public_path('uploads/pdfs'), $pdfName);

            $book->pdf = $pdfName;
        }

        $book->update([
            'category_id' => $request->category_id,
            'author_id' => $request->author_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock,
            'is_popular' => $request->has('is_popular'),
            'is_best_selling' => $request->has('is_best_selling'),
            'is_featured' => $request->has('is_featured'),
            'status' => $request->status,
            'image' => $book->image,
            'pdf' => $book->pdf,
        ]);

        return redirect()
            ->route('admin.books')
            ->with('success', 'Book Updated Successfully.');
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        // Delete Image
        if (
            $book->image &&
            file_exists(public_path('uploads/books/'.$book->image))
        ) {
            unlink(public_path('uploads/books/'.$book->image));
        }

        // Delete PDF
        if (
            $book->pdf &&
            file_exists(public_path('uploads/pdfs/'.$book->pdf))
        ) {
            unlink(public_path('uploads/pdfs/'.$book->pdf));
        }

        // Delete Record
        $book->delete();

        return redirect()
            ->route('admin.books')
            ->with('success', 'Book Deleted Successfully.');
    }

    public function changeStatus($id)
    {
        $book = Book::findOrFail($id);

        if ($book->status == 1) {

            $book->status = 0;
        } else {

            $book->status = 1;
        }

        $book->save();

        return redirect()
            ->route('admin.books')
            ->with('success', 'Book Status Updated Successfully.');
    }
}
