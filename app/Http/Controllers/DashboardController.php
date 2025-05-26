<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AssessmentRequest;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guestDashboard()
    {
        if (Auth::user()->status === 'user') {
            return redirect()->route('dashboard.user.index');
        }
        return view('dashboard.guest.index');
    }

    public function userDashboard()
    {
        if (Auth::user()->status !== 'user') {
            return redirect()->route('dashboard.user.index');
        }
        $assessmentRequests = AssessmentRequest::with(['project', 'guest'])->get();
        
        // Get document statistics
        $totalDocuments = \App\Models\ProjectDocument::count();
        $scoredDocuments = \App\Models\ProjectDocument::whereNotNull('score')->count();
        $pendingDocuments = \App\Models\ProjectDocument::whereNull('score')->count();
        $approvedDocuments = \App\Models\ProjectDocument::where('score', '>=', 60)->count();
        
        return view('dashboard.user.index', compact('assessmentRequests', 'totalDocuments', 'scoredDocuments', 'pendingDocuments', 'approvedDocuments'));
    }

    public function guide()
    {
        if (Auth::user()->status !== 'guest') {
            return redirect()->route('dashboard.guest.index');
        }
        return view('dashboard.guest.guide.index');
    }

    public function projectDocumentsHistory()
    {
        if (Auth::user()->status !== 'guest') {
            return redirect()->route('dashboard.user.index');
        }
        return view('dashboard.guest.project-documents.history');
    }
}