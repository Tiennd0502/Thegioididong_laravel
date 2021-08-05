<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_products')->withPivot(['quantity','price','discount']);
    }
}
