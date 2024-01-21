<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Inside LoginController
    public function form(Request $request)
    {
        return view('login/form');
    }

    public function formEmail(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->route('home');
            }

            return back()
                ->withErrors([
                    'alert' => 'Email atau password yang Anda berikan tidak cocok',
                ])
                ->onlyInput('email');
        }

        return view('login/form');
    }
    public function formPhone(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'phone' => ['required'],
                'password' => ['required'],
            ]);

            // Attempt authentication using only the phone number
            if (Auth::attempt(['phone' => $request->phone,  'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->route('home');
            }

            return back()
                ->withErrors([
                    'alert' => 'Nomor yang Anda berikan tidak cocok atau akun belum terdaftar.',
                ])
                ->only('phone');
        }

        return view('login/form');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return back();
    }
}
