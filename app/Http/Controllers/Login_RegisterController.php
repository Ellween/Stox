<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class Login_RegisterController extends Controller
{

    public function login_user(Request $request)
    {
        

        $client = new \GuzzleHttp\Client();
        $url = "https://crm.stoxtrades.com/your/callback";
        

        
        $response = $client->post('https://crm.stoxtrades.com/your/callback', [
            'json' => [
                'params' => [
                    'phone' => $request->phone,
                    'first_name' => $request->name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'af' => 'Stoxtrades',
                    'country' => $request->country,
                    'password' => $request->sign_password,
                ]
             ]
        ]);
        
        
        $result = json_decode($response->getBody()->getContents(), true);
        $resultCode = json_decode($result['result'], true)['code'];
        
        $alex = $request->all();
        if ($resultCode == 500) {
            return view('layout.index');
           } else {
            Session::put('user_register', true);
            Session::put('data', $request->all());
            return redirect()->route('user_dashboard');
           }

    }


    public function login_dashboard_user(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $client = new \GuzzleHttp\Client();
        

        
            $response = $client->post('https://crm.stoxtrades.com/stoxtrades/login', [
                'json' => [
                    'params' => [
                        'Email' => $request->email,
                        'Password' => $request->password,
                    ]
                 ]
            ]);
    
            
            
           $result = json_decode($response->getBody()->getContents(), true);
           $resultCode = json_decode($result['result'], true)['code'];
           
        
           
    
           if ($resultCode == 500) {
            return back()->withErrors(['Email or Password is incorrect', 'The Message']);
           } else {
            $data1 = json_decode($result['result'], true)['data'];
            
            $validator= "ERROR";
     
            $data = [
                'name' =>  $data1['Last Name'],
                'last_name' => $data1['First Name'],
                'country' => $data1['Country'],
                'phone' => $data1['Phone'],
            ];
            Session::put('user_register', true);
            Session::put('data', $data);
            return redirect()->route('user_dashboard');
           }
    }
}
