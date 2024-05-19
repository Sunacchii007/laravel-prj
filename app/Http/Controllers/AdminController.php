<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showLoginForm () {
        return view('login');
    }

    public function login (Request $request) {
        $request->validate([
            'login' => 'required',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('login', $request->login)->where('password', $request->password)->first();
        if ($admin) {
            Session::put('logged_in', true);
            return redirect()->route('articles.index')->with(['admin'=> $admin]);
        }
        else {
            $message = 'Sorry, you are not allowed to login with this admin account . Please try again later !';
            // return redirect()->route('auth.form')->with(['forbidden'=> 'Sorry, you are not allowed to login with this admin account . Please try again later !']);
            return view('login', compact('message'));
        }
    }

    public function logout () {
        Session::flush();
        return redirect()->route('auth.form');
    }
}
