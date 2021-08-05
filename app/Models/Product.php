<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Arr;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Parameter;
use App\Models\Order;
use App\Models\Evaluate;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $guarded = [''];

    protected $status = [ 
        1 => [
            'name' =>'Hiển thị',
            'class' => 'badge bg-success'
        ],
        0 => [
            'name' =>'Tạm ẩn',
            'class' => 'badge bg-danger'
        ]
    ];
    
    public function getStatus(){
        return Arr::get($this->status, $this->active, '[N\A]');
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function parameters()
    {
        return $this->belongsToMany(Parameter::class,'parameter_products');
    }
    
    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_products')->withPivot(['quantity','price','discount']);
    }

    public function evaluates(){
        return $this->hasMany(Evaluate::class);
    }
    
    
}
