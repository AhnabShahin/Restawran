<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function Order_details(){
        $this->hasMany(Order_detail::class);
    }
}
