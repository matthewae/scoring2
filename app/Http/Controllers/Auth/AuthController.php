<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)
                    ->where('password', $request->password)
                    ->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            
            // Redirect berdasarkan status user
            if ($user->status === 'guest') {
                return redirect()->route('dashboard.guest.index'); // Arahkan ke dashboard guest
            } elseif ($user->status === 'user') {
                return redirect()->route('dashboard.user.index'); // Arahkan ke dashboard user
            } else {
                return redirect()->route('dashboard.guest.index'); // Default ke dashboard guest
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')
            ->withHeaders([
                'Cache-Control' => 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ]);
    }
}