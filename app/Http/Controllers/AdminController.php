<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Glossary;

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
        // \Log::info('alexa aris yle');
        $user = auth()->guard('admin')->user();
        $users = User::all();
        return view('admin.layout.admin-user',compact('users','user'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::forget('admin_logged_in');
        return redirect()->route('admin-login');
    }

    public function pages()
    {
        $user = auth()->guard('admin')->user();
        return view('admin.layout.pages',compact('user'));
    }
    
    public function add_page()
    {
        $user = auth()->guard('admin')->user();
        return view('admin.pages.add_page',compact('user'));
    }

    public function glossary()
    {
        $user = auth()->guard('admin')->user();
        $glossary = Glossary::orderBy('created_at','desc')->get();
        return view('admin.glossary.edit_glossary',compact('user','glossary'));
    }

    public function add_glossary(Request $request)
    {
        // $this->validate($request, [
            
        // ]);
        
            $glossary = Glossary::create([
                'title' => request('title'),
                'text' => request('text')
            ]);

            $user = auth()->guard('admin')->user();

            return view('admin.glossary.glossary_items', compact('glossary','user'))->render();
        
    }

    public function show_glossary(Request $request,$id)
    {
        $single_glossary = Glossary::find($id);

        return view('admin.glossary.glossary_items', compact('single_glossary'))->render();

    }
}
