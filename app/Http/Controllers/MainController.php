<?php

namespace App\Http\Controllers;

use App\Models\About_us;
use App\Models\Contact;
use App\Models\Daily_service;
use App\Models\Return_service;
use App\Models\Money_back_service;
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
        $daily_service_info= Daily_service::find(1);
        $return_service_info= Return_service::find(1);
        $money_back_service_info= Money_back_service::find(1);
        return view('main.services',['daily_service_info'=>$daily_service_info, 'return_service_info'=>$return_service_info,'money_back_service_info'=>$money_back_service_info]);
    }
    public function about()
    {
        $about_us_info= About_us::find(1);

        return view('main.about',['about_us_info'=>$about_us_info]);
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
