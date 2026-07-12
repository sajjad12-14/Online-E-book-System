<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompetitionController extends Controller
{
    // ==========================
    // Competition List
    // ==========================
    public function index(Request $request)
    {
        $search = $request->search;

        $competitions = Competition::when($search, function ($query) use ($search) {

            $query->where('title', 'LIKE', '%'.$search.'%');

        })->latest()->paginate(10);

        $totalCompetitions = Competition::count();

        $activeCompetitions = Competition::where('status', 1)->count();

        $inactiveCompetitions = Competition::where('status', 0)->count();

        return view('Admin.competition.index', compact(
            'competitions',
            'search',
            'totalCompetitions',
            'activeCompetitions',
            'inactiveCompetitions'
        ));
    }

    // ==========================
    // Create Form
    // ==========================
    public function create()
    {
        return view('Admin.competition.create');
    }

    // ==========================
    // Store Competition
    // ==========================
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|max:255',
            'description' => 'required',
            'rules' => 'nullable',
            'prize' => 'nullable|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('uploads/competitions'),
            $imageName
        );

        Competition::create([

            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'rules' => $request->rules,
            'prize' => $request->prize,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $imageName,
            'status' => 1,

        ]);

        return redirect()
            ->route('admin.competitions')
            ->with('success', 'Competition Added Successfully');
    }

    // ==========================
    // Edit Competition
    // ==========================
    public function edit($id)
    {
        $competition = Competition::findOrFail($id);

        return view('Admin.competition.edit', compact('competition'));
    }

    // ==========================
    // Update Competition
    // ==========================
    public function update(Request $request, $id)
    {

        $request->validate([

            'title' => 'required|max:255',
            'description' => 'required',
            'rules' => 'nullable',
            'prize' => 'nullable|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',

        ]);

        $competition = Competition::findOrFail($id);

        if ($request->hasFile('image')) {

            $oldImage = public_path(
                'uploads/competitions/'.$competition->image
            );

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/competitions'),
                $imageName
            );

            $competition->image = $imageName;

        }

        $competition->title = $request->title;

        $competition->slug = Str::slug($request->title);

        $competition->description = $request->description;

        $competition->rules = $request->rules;

        $competition->prize = $request->prize;

        $competition->start_date = $request->start_date;

        $competition->end_date = $request->end_date;

        $competition->save();

        return redirect()
            ->route('admin.competitions')
            ->with('success', 'Competition Updated Successfully');

    }

    // ==========================
    // Delete Competition
    // ==========================
    public function delete($id)
    {

        $competition = Competition::findOrFail($id);

        $imagePath = public_path(
            'uploads/competitions/'.$competition->image
        );

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $competition->delete();

        return redirect()
            ->route('admin.competitions')
            ->with('success', 'Competition Deleted Successfully');

    }

    // ==========================
    // Change Status
    // ==========================
    public function changeStatus($id)
    {

        $competition = Competition::findOrFail($id);

        $competition->status =
        $competition->status == 1 ? 0 : 1;

        $competition->save();

        return back()
            ->with('success', 'Competition Status Updated Successfully');

    }
}
