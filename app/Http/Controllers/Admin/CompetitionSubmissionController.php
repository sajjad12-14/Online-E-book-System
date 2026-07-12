<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompetitionSubmission;
use Illuminate\Http\Request;

class CompetitionSubmissionController extends Controller
{
    // ==========================
    // Submission List
    public function index()
    {
        $submissions = CompetitionSubmission::with('competition')
            ->latest()
            ->paginate(10);

        return view('Admin.competition_submissions.index',
            compact('submissions')
        );
    }

    // ==========================
    // View Submission Details
    // ==========================
    public function show($id)
    {
        $submission = CompetitionSubmission::with('competition')
            ->findOrFail($id);

        return view('Admin.competition_submissions.show',
            compact('submission')
        );
    }

    // Change Status
    // ==========================
    public function changeStatus(Request $request, $id)
    {

        $submission = CompetitionSubmission::findOrFail($id);

        $submission->status = $request->status;

        $submission->save();

        return back()->with(
            'success',
            'Submission Status Updated Successfully'
        );

    }

    // ==========================
    // Delete Submission
    // ==========================
    public function delete($id)
    {

        $submission = CompetitionSubmission::findOrFail($id);

        if ($submission->file) {

            $filePath = public_path(
                'uploads/submissions/'.$submission->file
            );

            if (file_exists($filePath)) {
                unlink($filePath);
            }

        }

        $submission->delete();

        return back()->with(
            'success',
            'Submission Deleted Successfully'
        );

    }

    // ==========================
    // Make Winner
    // ==========================
    public function makeWinner(Request $request, $id)
    {
        $submission = CompetitionSubmission::findOrFail($id);

        $submission->is_winner = 1;
        $submission->winner_position = $request->winner_position;

        $submission->save();

        return back()->with(
            'success',
            'Winner Selected Successfully'
        );
    }
}
