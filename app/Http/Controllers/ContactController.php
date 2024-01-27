<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
       
        return view('welcome');
        
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Send email using Laravel Mail
        Mail::to('abir537011@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('message', 'Message sent successfully!');
    }
}
