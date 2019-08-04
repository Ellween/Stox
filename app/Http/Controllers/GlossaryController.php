<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Glossary;

class GlossaryController extends Controller
{
    public function search(Request $request)
    {
        $word = $request->word;
        $items = Glossary::orderBy('title')->where('title', 'LIKE', '%'.$word.'%')->get()->toArray();
        
        return $items;
    }
}
