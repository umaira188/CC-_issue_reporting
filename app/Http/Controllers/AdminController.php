<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function allComplaints()
    {
        $complaints = Complaint::all();
        return view('admin.all-complaints', compact('complaints'));
    }

    public function allFeedbacks()
    {
        $feedbacks = Feedback::with('user')->get();
        return view('admin.all-feedbacks', compact('feedbacks'));
    }
    public function showComplaint($id)
{
    $complaint = \App\Models\Complaint::findOrFail($id);
    return view('admin.complaint-details', compact('complaint'));
}

public function showFeedback($id)
{
    $feedback = \App\Models\Feedback::with('user')->findOrFail($id);
    return view('admin.feedback-details', compact('feedback'));
}

}
