<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login() 
    {
        return view('admin.admin-login');
    }

    public function login_admin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            Session::put('admin_logged_in', true);
            return redirect()->route('admin_home_page');
        }

        return redirect()->route('admin-login');
    }

    public function home()
    {
        return view('admin.admin');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::forget('admin_logged_in');
        return redirect()->route('admin-login');
    }
    
}
