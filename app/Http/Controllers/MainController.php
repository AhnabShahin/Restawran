<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Item;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $allItem = Item::orderBy('id', 'DESC')->get();
        return view('main.home')->with('allItem', $allItem);
    }
    public function services()
    {

        return view('main.services');
    }
    public function about()
    {
        return view('main.about');
    }
    public function blog()
    {
        return view('main.blog');
    }
    public function gallery()
    {
        return view('main.gallery');
    }
    public function contact()
    {
        return view('main.contact');
    }
    public function SaveContactMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email',
            'message' => 'required|max:200',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $save= $contact->save();
        
        if ($save) {
            return back()->with('success', 'Hello! ' . $request->name . ' - We received your message. We will contact in your mail. ');
        } else {
            return back()->with('fails', $request->name . ' your details is failed to receive.');
        }
    }
}
