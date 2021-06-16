<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\User_accounts_verification;
use App\Http\Controllers\send;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\mail;
use App\Mail\SendMail;
use App\Models\User_password_reset;
use App\Models\Order_details;
use App\Models\Order_list;
use App\Models\Item;

class UserController extends Controller
{
    function login()
    {
        return view('user.login');
    }
    function registration()
    {
        return view('user.registration');
    }
    function save(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:10',
            'confirmPassword' => 'required|min:5|max:10',
            // 'TermsAndConditions' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);
        if ($request->password == $request->confirmPassword) {
            $user = new User();
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $newImageName=time().'-'.$request->email.'.'.$request->file('image')->extension();
            $user->image_path=$newImageName;
            $request->image->move(public_path('images/user'),$newImageName);
  
            $save = $user->save();

            $user_accounts_verification = new User_accounts_verification();
            $verification_slug = time() . '-' . date("Y.m.d") . '-varification-of-' . $request->name;
            $user_accounts_verification->verification_slug = $verification_slug;
            $user_accounts_verification->user_id = $user->id;
            $user_accounts_verification->save();

            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'verification_slug' => $verification_slug,
            );
            $Template = 'user.email-verification';
           Mail::to($request->email)->send(new SendMail($data,$Template));

            if ($save) {
               
                return redirect('/')->with('success', 'Hello! ' . $request->name . ' - A verification link is send on your email. Please verify your id first');
            } else {
                
                return back()->with('fails', $request->name . ' your details is failed to insert');
            }
        }
        if ($request->password != $request->confirmPassword) {
            return view('user.registration', ['wrongpassword' => 'Password didt match']);
        }
    }
    function check(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:5|max:10',

        ]);
        $userInfo = User::where([['email', '=', $request->email], ['email_verification', '=', 1]])->first();
        if (!$userInfo) {
            return back()->with("EmailNotRecognize", "We don't recognize your email");
        } else {
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                $userData= ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()->toArray()];
                session()->put('LoggedUserInfo',$userData['LoggedUserInfo']);
               
                return back()->with('success', 'Your successfully logged in');;
            } else {
                return back()->with('IncorrctPassword', 'Your password Is Incorrect');
            }
        }
    }
    function logout()
    {
        if (session()->has('LoggedUser') && session()->has('LoggedUserInfo')) {
            session()->pull('LoggedUser');
            session()->pull('LoggedUserInfo');
            return redirect('/');
        }
    }


    function account_verification($slug)
    {
        $User_accounts_verification_Info = User_accounts_verification::where('verification_slug', '=', $slug)->first();
        if ($User_accounts_verification_Info) {
            session()->put('LoggedUser', $User_accounts_verification_Info->user_id);
            $userInfo = User::where('id', '=', $User_accounts_verification_Info->user_id)->first();
            $userInfo->email_verification = 1;
            $userInfo->save();
            $User_accounts_verification_Info->delete();
            session()->put('LoggedUser', $userInfo->id);
            $userData= ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()->toArray()];
            session()->put('LoggedUserInfo',$userData['LoggedUserInfo']);
            return redirect('user/profile');
        }
        if (!$User_accounts_verification_Info) {
            return redirect('/');
        }
    }

    function reset_request_get(Request $request)
    {

        return view('user.forgot-password');
    }

    function reset_request_post(Request $request)
    {

        $request->validate([
            
            'email' => 'required|email',

        ]);
        $userInfo = User::where([['email', '=', $request->email], ['email_verification', '=', 1]])->first();
        if (!$userInfo) {
            return back()->with("EmailNotRecognize", "We don't recognize your email");
        }
        if ($userInfo) {
            $user_password_reset = new User_password_reset();
            $user_password_reset->user_id = $userInfo->id;
            $password_reset_slug = time() . '-' . date("Y.m.d") . '-password-reset-link-of-' . $request->email;
            $user_password_reset->password_reset_slug = $password_reset_slug;
            $user_password_reset->save();
            $data = array(
                'name'=>$userInfo->name,
                'email' => $request->email,
                'password_reset_slug' => $password_reset_slug,
            );
            $Template = 'user.password-reset-link';
            Mail::to($request->email)->send(new SendMail($data,$Template));
            return back()->with('link-send', 'link is send on your email account. ');
        }
        // return view('user.forgot-password');
    }

    function reset_form($slug)
    {
        $User_password_reset_Info = User_password_reset::where('password_reset_slug', '=', $slug)->first();
        if ($User_password_reset_Info) {


            return view('user.password-reset', ['slug' => $slug]);
        }
        if (!$User_password_reset_Info) {
            return redirect('user/login')->with('invalidlink', 'Dont enter any kind of invalid link');
        }
    }

    function reset(Request $request, $slug)
    {
        $request->validate([

            'password' => 'required|min:5|max:10',
            'confirmPassword' => 'required|min:5|max:10',

        ]);
        if ($request->password == $request->confirmPassword) {
            $User_password_reset_Info = User_password_reset::where('password_reset_slug', '=', $slug)->first();
            session()->put('ResetUserPassword', $User_password_reset_Info->user_id);
            $User_password_reset_Info->delete();

            $userInfo = User::where('id', '=', session('ResetUserPassword'))->first();
            $userInfo->password =  Hash::make($request->password);
            $userInfo->save();
            session()->put('LoggedUser', session('ResetUserPassword'));
            session()->pull('ResetUserPassword');
            $userData= ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()->toArray()];
            session()->put('LoggedUserInfo',$userData['LoggedUserInfo']);
            return redirect('user/profile');
        }
        if ($request->password != $request->confirmPassword) {
            return view('user.password-reset', ['slug' => $slug, 'wrongpassword' => 'Password didt match']);
        }
    }
    function allOrders()
    {
        $Orders= Order_list::where([['user_id', '=',session('LoggedUser') ],['completed', '=', 0]])->get();
        return view('user.all-orders')->with('Orders',$Orders);
    }
    function orderDetails(Request $request, $slug)
    {
        $OrderDetails= Order_details::where('order_id', '=',$slug)->get();
        return view('user.order-details')->with('OrderDetails',$OrderDetails);
    }
    function profile(){

        $allItem = Item::orderBy('id', 'DESC')->get();
        // dd($userData);
        return view('user.profile')->with('allItem',$allItem);
    }



}
