<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Mail::to('jesus.ra98@hotmail.com')->send( new Contact(
        Mail::to('jesus.raop@gmail.com')->send( new Contact(
            $request->name,
            $request->email,
            $request->message
        ) );

        return response('Success', 200)
            ->header('Content-Type', 'text/javascript');

    }

    // public function contact(){
    //     return redirect()->route('contacts');
    // }
}
