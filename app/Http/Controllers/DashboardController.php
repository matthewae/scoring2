<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard.user.index');
    }
}