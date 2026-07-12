<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Category List
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function ($query) use ($search) {

            $query->where('name', 'LIKE', "%{$search}%");
        })
            ->latest()
            ->paginate(5);

        $totalCategories = Category::count();

        $activeCategories = Category::where('status', 1)->count();

        $inactiveCategories = Category::where('status', 0)->count();

        return view('Admin.categories.index', compact(
            'categories',
            'search',
            'totalCategories',
            'activeCategories',
            'inactiveCategories'
        ));
    }
    // Create Form
    public function create()
    {
        return view('Admin.categories.create');
    }

    // Store Category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.categories')
            ->with('success', 'Category Added Successfully.');
    }
    // Edit Category
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('Admin.categories.edit', compact('category'));
    }

    // Update Category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id,
            'description' => 'nullable',
            'status' => 'required',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.categories')
            ->with('success', 'Category Updated Successfully.');
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.categories')
            ->with('success', 'Category Deleted Successfully.');
    }


    public function changeStatus($id)
    {
        $category = Category::findOrFail($id);

        if ($category->status == 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }

        $category->save();

        return redirect()->route('admin.categories')
            ->with('success', 'Category Status Updated Successfully.');
    }
}
