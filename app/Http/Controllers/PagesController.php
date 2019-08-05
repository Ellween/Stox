<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Glossary;
use App\Page;

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
}
