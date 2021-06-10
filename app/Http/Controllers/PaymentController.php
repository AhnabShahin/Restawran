<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Card_item;
use App\Models\Item;
use App\Models\Order_list;
use App\Models\Order_details;

use Stripe;
use Session;
use Stripe\Order;

class PaymentController extends Controller
{

    public function index()
    {
        $card_item= Card_item::where('user_id', '=',session('LoggedUser'))->get();
        $number_of_item_added_in_card=$card_item->count();

        if($number_of_item_added_in_card==0){
            return view('user.add_to_card')->with('card_items',$card_item);
        }else{
            return view('checkout.welcome');
        }
        
    }

    public function makePayment(Request $request)
    {
        $request->validate([
            'BillName' => 'required|max:30',
            'BillEmail' => 'required|email',
            'BillPhone' => 'required',
            'BillAddress' => 'required',
            'CardName' => 'required',
            'CardNumber' => 'required',
            'CardCVC' => 'required',
            'CardMonth' => 'required',
            'CardYear' => 'required',
        ]);


        $card_items = Card_item::where('user_id', '=', session('LoggedUser'))->get();


        $order = new Order_list;
        $order->user_id = session('LoggedUser');
        $order->billing_email = $request->BillEmail;
        $order->billing_name = $request->BillName;
        $order->billing_address = $request->BillAddress;
        $order->billing_phone = $request->BillPhone;
        $amount = 0;
        $data=[];
        foreach ($card_items as $card_item) {
            $amount = $amount + $card_item->total_price;
        }
        $order->billing_subtotal = $amount;
        $order->billing_total = $amount;
        $order->payment_getway = "Stripe";
        $order->feedback = "";
        $order->save();
       
        foreach ($card_items as $card_item) {
            $order_detail = new Order_details;
            $order_detail->order_id =$order->id;
            $order_detail->item_id = $card_item->item_id;
            $order_detail->item_price = $card_item->price;
            $order_detail->item_quantity = $card_item->quantity;
            $order_detail->total_price = $card_item->total_price;

            $item = Item::where('id', '=', $card_item->item_id)->first();

            $order_detail->item_name = $item->name;
            $order_detail->item_image_path = $item->image_path;
            $order_detail->save();

            array_push($data, (object)$order_detail);
            $card_item->delete();
        }
        
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Make payment and chill." ,
                "metadata" => $data
        ]);

        Session::flash('success', 'Payment successfully made.');

        return back();
    }
}
