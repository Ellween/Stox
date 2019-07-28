<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function partners(){
        return view('layout.partnership');
    }
}
