<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Customer;

class DashboardController extends Controller
{
    private $pathViewController = 'backend.dashboards.';
    private $controllerName = 'dashboard';
    public $current_page = 'dashboard';

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('current_page', $this->current_page);

    }

    public function index()
    {
        $total_sales = 100;
        $count_new_orders = Order::where('status', 0)->count();
        $count_total_users = Customer::count();
        $unique_visitors = 99;
        $count_total_orders = Order::count();
        $count_shipped_orders = Order::where('status', 2)->count();
        $count_cancel_orders = Order::where('status', 3)->count();
        $total_new_orders = Order::orderBy('id','desc')->offset(0)->limit(5)->get();
        
        return view($this->pathViewController.'.index',compact('total_sales', 'count_new_orders', 'count_total_users', 'unique_visitors', 'total_new_orders', 'count_total_orders', 'count_shipped_orders', 'count_cancel_orders'));
    }

    // public function getTotalOrder($order_id)
    // {
    //     $items = MainModel::find($order_id)->products;
    //     $total_payment = 0;
    //     $total_discount = 0;
    //     foreach ($items as $key => $item) {
    //         $total_payment        += $item->pivot->price * $item->pivot->quantity;
    //         $total_discount     +=  round($item->pivot->price * $item->pivot->quantity * $item->pivot->discount /100, -4);
    //     }     
    //     return $total_payment - $total_discount;
    // }
}
