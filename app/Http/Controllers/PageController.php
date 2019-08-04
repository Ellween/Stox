<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function store()
    {
        $page = Page::create([
            'title' => request('title'),
            'content' => request('content'),
            'slug' => request('slug'),
            'url' => request('url'),
        ]);

        return redirect()->route('admin_pages');
    }
}
