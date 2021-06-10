<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Card_item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    function items(){
        $allItem = Item::orderBy('id', 'DESC')->get();
      

        return view('main.all-items')->with('allItem',$allItem);
    }
    function singleItemDetail($slug){
;
        $itemInfo = Item::where('id', '=', $slug)->first();
        $card_item= Card_item::where([['user_id', '=',session('LoggedUser') ],['item_id', '=', $slug]])->get();
        if($card_item->count() == 1){
            $card_item=$card_item->first();
            $quantity=$card_item->quantity;
        }else{
            $quantity=1;
        }
      
        return view('main.single-item',['quantity'=>$quantity])->with('itemInfo',$itemInfo);
    }

    function itemPostSave(Request $request){
        $request->validate([

            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:5048',
            'details' => 'required',
            'price' => 'required',

        ]);
        $item =new Item;
        $item->name = $request->name;
        $newImageName=time().'-'.$request->name.'.'.$request->file('image')->extension();
        $item->image_path=$newImageName;
        $item->price= $request->price;
        $item->details= $request->details;
        $item->admin_id=session('LoggedAdmin');
        $item->save();
        
        $request->image->move(public_path('images/item'),$newImageName);

        return redirect('admin/dashboard')->with('itemInsert','Item Is Successfully inserted');
    }
    function itemEditSave(Request $request,$id){
  
        $request->validate([

            'name' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png|max:5048',
            'details' => 'required',
            'price' => 'required',

        ]);
        $item = Item::where('id', '=', $id)->first();
        $item->name = $request->name;
        $item->price= $request->price;
        $item->details= $request->details;
        $item->admin_id=session('LoggedAdmin');

        if($request->file('image')!=null){
           
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png|max:5048',
                ]);
            $newImageName=time().'-'.$request->name.'.'.$request->file('image')->extension();
            $item->image_path=$newImageName;
            $request->image->move(public_path('images/item'),$newImageName);
        }
       
       

        $item->save();

      
        return redirect('admin/dashboard')->with('itemInsert','Item Is Successfully updated');
    }
    function itemDelete($id){
        $item = Item::where('id', '=', $id)->first();
        $item->delete();
        return redirect('admin/dashboard')->with('itemInsert','Item Is Successfully deleted');
    }
    function add_to_card($id,$quantity){
        // dd($id,$quantity);
        $item = Item::find($id);
        
        $card_item= Card_item::where([['user_id', '=',session('LoggedUser') ],['item_id', '=', $id]])->get();

      
        if($card_item->count() == 1){
            $card_item=$card_item->first();
        
            $card_item->quantity=$quantity;
            $card_item->total_price=$quantity*$item->price;
            $card_item->save();
        

            // dd($card_item);
        }elseif($card_item->count() == 0){
            $card_item= new Card_item;
            $card_item->user_id=session('LoggedUser');
            $card_item->item_id=$item->id;
            $card_item->price=$item->price;
            $card_item->quantity=$quantity;
            $card_item->total_price=$item->price;
            $card_item->save();
            // dd($card_item);
        }
        $card_item= Card_item::where('user_id', '=',session('LoggedUser'))->get();
        return response()->json(['addtocard'=>'Item successfully add to card','card_item'=>$card_item]);

    }
    function cardView(){
        $card_item= Card_item::where('user_id', '=',session('LoggedUser'))->get();
        // dd($card_item);
        return view('user.add_to_card')->with('card_items',$card_item);
    }
}
