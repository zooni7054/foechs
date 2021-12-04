<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $rules = [
            'email' => 'required|min:3',
            'password' => 'required'
        ];

        $request->validate($rules);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('posts.index');
        } else {
            Session::flash('error', 'Invalid Username or Password');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
