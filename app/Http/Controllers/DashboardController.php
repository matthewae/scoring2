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
        if (Auth::user()->status !== 'guest') {
            return redirect()->route('dashboard.user');
        }
        return view('dashboard.guest.index');
    }

    public function userDashboard()
    {
        if (Auth::user()->status !== 'user') {
            return redirect()->route('dashboard.guest');
        }
        $assessmentRequests = AssessmentRequest::with(['project', 'guest'])->get();
        return view('dashboard.user.index', compact('assessmentRequests'));
    }
}