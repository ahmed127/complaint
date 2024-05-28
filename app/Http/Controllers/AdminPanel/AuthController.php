<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPanel\LoginAdminRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('adminPanel.auth.login');
    }

    public function authenticate(LoginAdminRequest $request)
    {
        if (!Auth::guard('admin')->attempt($request->validated())) {
            return redirect()->back()->withErrors(['email' => 'Invalid login details.']);
        }

        return redirect()->route('adminPanel.dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('adminPanel.login');
    }
}
