<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Glossary;
use App\Page;
use Auth;

class PagesController extends Controller
{
    public function partners(){
        return view('layout.partnership');
    }

    public function education()
    {
        $page = Page::find(1);
        return view('layout.education' ,compact('page'));        
    }

    public function get_glossary()
    {
        $glossaries = Glossary::orderBy('title')->get();
        $first_letter = '';
        return view('layout.glossary',compact('glossaries', 'first_letter'));
    }

    public function single($slug)
    {
        $single_page = Page::where('slug', $slug)->first();
        $user = auth()->guard('admin')->user();
        return view('layout.single', compact('single_page','user'));
    }

    public function user_dash()
    {
        $user = Auth::user();
        return view('user.layout.index',compact('user'));
    }

    public function my_broker()
    {
        return view('user.layout.my-broker');
    }

    public function real_time_chart()
    {
        return view('user.layout.realtime-chart');
    }

    public function economic_calendar()
    {
        return view('user.layout.economic-calendar');
    }
}
