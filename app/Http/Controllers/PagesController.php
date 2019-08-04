<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Glossary;

class PagesController extends Controller
{
    public function partners(){
        return view('layout.partnership');
    }

    public function education()
    {
        return view('layout.education');        
    }

    public function get_glossary()
    {
        $glossaries = Glossary::orderBy('title')->get();

        return view('layout.glossary',compact('glossaries'));
    }
}
