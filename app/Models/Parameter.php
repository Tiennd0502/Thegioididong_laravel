<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Parameter extends Model
{
    use HasFactory;

    protected $table = 'parameters';
    // protected $filable = [];
    protected $guarded = [''];
    
    public function products()
    {
        return $this->belongsToMany(Product::class,'parameter_products');
    }

}