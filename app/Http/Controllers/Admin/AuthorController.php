<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $authors = Author::when($search, function ($query) use ($search) {

            $query->where('name', 'LIKE', "%{$search}%");

        })
            ->latest()
            ->paginate(5);

        $totalAuthors = Author::count();

        $activeAuthors = Author::where('status', 1)->count();

        $inactiveAuthors = Author::where('status', 0)->count();

        return view('Admin.authors.index', compact(
            'authors',
            'search',
            'totalAuthors',
            'activeAuthors',
            'inactiveAuthors'
        ));
    }

    public function create()
    {
        return view('Admin.authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'bio' => 'nullable',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads/authors'), $imageName);

        Author::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'bio' => $request->bio,

            'image' => $imageName,

            'status' => $request->status,

        ]);

        return redirect()->route('admin.authors')
            ->with('success', 'Author Added Successfully.');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view('Admin.authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'bio' => 'nullable',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {

            if ($author->image && file_exists(public_path('uploads/authors/'.$author->image))) {

                unlink(public_path('uploads/authors/'.$author->image));

            }

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads/authors'), $imageName);

            $author->image = $imageName;
        }

        $author->name = $request->name;
        $author->slug = Str::slug($request->name);
        $author->bio = $request->bio;
        $author->status = $request->status;

        $author->save();

        return redirect()->route('admin.authors')
            ->with('success', 'Author Updated Successfully.');
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);

        if ($author->image && file_exists(public_path('uploads/authors/'.$author->image))) {

            unlink(public_path('uploads/authors/'.$author->image));

        }

        $author->delete();

        return redirect()->route('admin.authors')
            ->with('success', 'Author Deleted Successfully.');
    }

    public function changeStatus($id)
    {
        $author = Author::findOrFail($id);

        $author->status = ! $author->status;

        $author->save();

        return redirect()->route('admin.authors')
            ->with('success', 'Author Status Updated Successfully.');
    }
}
