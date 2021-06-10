<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function admins(){
        return $this->belongsTo(Admin::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'card_item','item_id','user_id');
    }

}
