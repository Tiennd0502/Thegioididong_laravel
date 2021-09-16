<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Arr;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = [];

    const STATUS_ORDER = 0;
    const STATUS_SHIPPED = 1;
    const STATUS_DELIVERED = 1;
    const STATUS_CANCEL = 2;

    protected $status_temp = [ 
        0 => [
            'name' =>'Đặt hàng',
            'class' => 'badge bg-secondary'
        ],
        1 => [
            'name' =>'Đang giao',
            'class' => 'badge bg-warning'
        ],
        2 => [
            'name' =>'Đã giao hàng',
            'class' => 'badge bg-success'
        ],
        3 => [
            'name' =>'Đã hủy đơn',
            'class' => 'badge bg-danger'
        ]
    ];

    public function getStatus(){
        return Arr::get($this->status_temp,$this->status,'[N\A]');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_products')->withPivot(['quantity','price','discount']);
    }
}
