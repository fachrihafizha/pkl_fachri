<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['user_id','total_price','order_code','status'];

    public function user(){
        return $this->belingsTo(User::class);
    }
    public function product(){
        return $this->belingsToMany(Product::class)->withPivot('qty','price')->withTimestamps();
    }
}
