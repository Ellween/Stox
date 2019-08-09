<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail as Email;


class MailController extends Controller
{
    public function send(Request $request)
    {
        Mail::to('support@stoxtrades.com')
        ->send(new Email([
        'name' => $request->name,
        'email' => $request->email,
        'text' => $request->text
        ])
    );

    return redirect()->back();   

    }
}
