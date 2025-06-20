<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //field apa saja yang boleh di isi
    public $fillable = ['caregory_id','name','slug','description','image','price','stok'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function product(){
        return $this->belingsToMany(Product::class)->withPivot('qty','price')->withTimestamps();
    }
}
