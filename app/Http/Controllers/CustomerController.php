<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function register()
    {
        return view('auth.customer.register');
    }

    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $validate_data['password'] = Hash::make($validate_data['password']);

        Customer::create($validate_data);

        $credentials = $request->only('email', 'password');
        Auth::guard('customer')->attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('customer.profile')->withSuccess('You have successfully registered & logged in!');
    }

    public function profile()
    {
        return view('auth.customer.profile');
    }

    public function login()
    {
        return view('auth.customer.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('customer.profile')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->withSuccess('You have logged out successfully!');
    }
}
