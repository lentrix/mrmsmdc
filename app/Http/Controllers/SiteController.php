<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            return redirect('/login');
        } else {
            return redirect('/' . auth()->user()->role);
        }
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = auth()->attempt([
            'username' => $request['username'],
            'password' => $request['password']
        ]);

        if (!$user) {
            return back()->withErrors([
                'message' => 'Invalid user credentials'
            ]);
        }

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
