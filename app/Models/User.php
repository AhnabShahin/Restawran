<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;
    public function items(){
        return $this->belongsToMany(Item::class,'card_item','user_id','item_id');
    }
    public function order_lists(){
        return $this->hasMany(Order_list::class);
    }

}
