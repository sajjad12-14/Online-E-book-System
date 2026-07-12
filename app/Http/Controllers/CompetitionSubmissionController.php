<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\CompetitionSubmission;
use Illuminate\Http\Request;

class CompetitionSubmissionController extends Controller
{
    // ==========================
    // Submission Form
    // ==========================
    public function create($slug)
    {
        $competition = Competition::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('User.submit-story', compact('competition'));
    }

    // ==========================
    // Store Submission
    // ==========================
    public function store(Request $request)
    {
        $request->validate([

            'competition_id' => 'required',

            'name' => 'required|max:255',

            'email' => 'required|email',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'title' => 'required|max:255',

            'description' => 'required',

            'file' => 'nullable|mimes:pdf,doc,docx|max:5120',

        ]);

        // Upload Image
        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'_'.$request->image->getClientOriginalName();

            $request->image->move(
                public_path('uploads/submissions'),
                $imageName
            );
        }

        // Upload Story File
        $fileName = null;

        if ($request->hasFile('file')) {

            $fileName = time().'.'.$request->file->extension();

            $request->file->move(
                public_path('uploads/submissions'),
                $fileName
            );
        }

        // Save Submission
        $submission = CompetitionSubmission::create([

            'competition_id' => $request->competition_id,

            'name' => $request->name,

            'email' => $request->email,

            'image' => $imageName,

            'title' => $request->title,

            'description' => $request->description,

            'file' => $fileName,

            'status' => 0,

        ]);

        // Testing

        return back()->with(
            'success',
            'Your Story Submitted Successfully'
        );
    }
}
