<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Glossary;
use App\page;

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
        $pages = Page::all();
        $user = auth()->guard('admin')->user();
        return view('admin.layout.pages',compact('user','pages'));
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
        return $single_glossary;
    }

    public function update_glossary(Request $request,$id)
    {
        $update_glossary = Glossary::find($id);
        
        $update_glossary->title = $request->title;
        $update_glossary->text = $request->text;
        $update_glossary->save();
        
        return $update_glossary;
    }

    public function get_single(Request $request,$slug)
    {
        $single_page = Page::where('slug', $slug)->first();
        $user = auth()->guard('admin')->user();
        return view('admin.pages.get_page',compact('single_page','user'));
    }

    public function edit_page(Request $request,$id)
    {
        $update_page = Page::find($id);

        $update_page->title = $request->title;
        $update_page->slug = $request->slug;
        $update_page->url = $request->url;
        $update_page->content = $request->content;
        $update_page->save();

        return redirect()->back();
    }

    public function delete_page($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect()->back();
    }

    public function delete_glossary($id)
    {
        $glossary = Glossary::find($id);
        $glossary->delete();

        return redirect()->back();
    }
}
