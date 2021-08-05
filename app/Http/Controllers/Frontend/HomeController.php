<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Evaluate;

use Carbon\Carbon;


class HomeController extends FrontendController
{

    const FOLDER_IMAGE = 'images/evaluates';

    public function __construct()
    {
        Carbon::setLocale('vi');
        if(session()->get('cart') == ''){
            session()->put('cart',[]);
        }
        view()->share('categories', Category::where('active',1)->get(['id', 'name','slug','icon']));
    }
    public function index(){
        $current_page = '';
        $background = '#f0f0f0';
        //  slider home
        $sliders  = $this->getSliders(1);
        // lấy 15 sản phẩm có giảm giá  mới nhất
        $weekend_shock = $this->getDiscountProducts(false,15);
        //  mobile
        $mobile_hots = $this->getProductHotByCategory(1, 2, true,[]);
        $notId = [$mobile_hots[0]->id, $mobile_hots[1]->id];
        $mobiles = $this->getProductHotByCategory(1, 6, false,$notId);
        // laptop
        $laptop_hot = $this->getProductHotByCategory(2, 1, true);
        $notId = [$laptop_hot->id];
        $laptops = $this->getProductHotByCategory(2, 3, false, $notId);
        //  tablet 
        $tablet_hot = $this->getProductHotByCategory(3, 1, true);
        $notId = [$tablet_hot->id];
        $tablets = $this->getProductHotByCategory(3, 3, false, $notId);
        // Fwatch
        $fwatchs = $this->getProductByCategory(5,15);
        // swatch
        $swatchs = $this->getProductByCategory(6,15);
        return view('frontend.homes.index',compact('current_page',
            'background', 'sliders','weekend_shock', 'mobile_hots', 'mobiles', 'laptop_hot', 'laptops', 'tablet_hot', 'tablets', 'swatchs', 'fwatchs'));
    }

    public function search(Request $request){
        $items = Product::where('name', 'LIKE', '%'.$request->keyword.'%')->paginate(7);
        $result = [];
        foreach($items as $key => $item){
            $result[$key] = [
                'id' => $item->id,
                'name' => $item->name,
                'avatar' => $item->avatar,
                'slug' => $item->slug,
                'price' => $item->price,
                'discount' =>$item->discount,
                'gift' =>$item->gift,
                'category' => $item->category->slug,
            ];
        }
        // dd($result);
        return json_encode($result);
    }

    public function addToCart($id){
        // session()->flush('cart');
        $item = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                'name' =>$item->name,
                'category_slug' => $item->category->slug,
                'slug' => $item->slug,
                'avatar' => $item->avatar,
                'price' => $item->price,
                'discount' => $item->discount,
                'gift' => $item->gift,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
    }

    public function updatedCart($id, $calculate){

        $cart = session()->get('cart');
        if($calculate == 'abate'){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] - 1;
        }else{
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }
        session()->put('cart', $cart);
        return $this->totalCart();
    }

    public function totalCart(){
        $cart = session()->get('cart');
        $total = 0;
        $discount = 0;
        foreach($cart as $item){
            $total += $item['price'] * $item['quantity'];
            $discount += round($item["price"] * $item["discount"] / 100, -4) * $item["quantity"];
        }
        return [
            'total' => $total,
            'discount' => $discount,
            'count' => count($cart)
        ];
    }

    public function deleteCart($id){
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return $this->totalCart();
    }

    public function checkPhone($phone){
        $result = Customer::where('phone',$phone)->first();
        return $result;
    }

    public function payment(Request $request){
        $item = new Order();
        $item->name  = $request->name;
        $item->phone = $request->phone;
        $item->email = $request->email;
        $item->address = $request->address .", ".$request->commune .", ".$request->district .", ".$request->province;
        $item->note = !empty($request->note) ? $request->note : "";
        $item->save();
        $checkPhone = $this->checkPhone($request->phone);
        if(!$checkPhone){
            Customer::create(
                [
                    "name"  => $request->name,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "address" => $request->address,
                ]
            );
        }
        $cart = session()->get('cart');
        foreach($cart as $key => $value){
            $item->products()->attach($key, [
                'quantity' => $value['quantity'],
                'price' => $value['price'],
                'discount' => $value['discount'],
            ]);
        }
        session()->put('cart', []);
        return true;
    }

    public function cart(){
        $current_page = '';
        if(session()->has('cart') && count(session()->get('cart'))){
            return view('frontend.carts.index',compact('current_page'));
        }else{
            return view('frontend.carts.empty',compact('current_page'));
        }
    }

    public function addEvaluate(Request $request){
        $customer = $this->checkPhone($request->phone);
        if(session()->get('customer') == ''){
            session()->put('customer',$customer);
        }
        if($customer){
            $item = new Evaluate();
            $item->customer_id = $customer->id;
            $item->product_id = $request->product_id;
            $item->rating = $request->rating;
            $item->content = $request->content;
            $item->share = !empty($request->share) ? $request->share :0;
            if($request->hasFile('evaluate')){
                $path_lib = [];
                $evaluate = noMore($request->delete_evaluate, $request->evaluate);
                foreach ($evaluate as $key => $value) {
                    $path_lib[]= uploadImage($value,HomeController::FOLDER_IMAGE);
                }
                $item->image =json_encode($path_lib);
            }
            $item->save();
        }
        return true;
    }

    public function calcRatingByProduct($evaluates){
        $rating = [];
        $rating['sum'] = count($evaluates);
        $rating['1'] = 0;
        $rating['2'] = 0;
        $rating['3'] = 0;
        $rating['4'] = 0;
        $rating['5'] = 0;
        $rating['avg'] = 0;
        foreach($evaluates as $evaluate){
            $rating[$evaluate->rating]++;
        }
        if($rating['sum']>0){
            $rating['avg'] = round(($rating['1'] + $rating['2'] *2 + $rating['3'] *3 + $rating['4']*4 + $rating['5']*5)/$rating['sum'], 1, PHP_ROUND_HALF_EVEN);
        }
        // $rating['sum'] = count($evaluates);
        // $rating['avg'] = $evaluates->avg('rating');
        // $rating['count_rating'] = $evaluates->countBy('rating');
        return $rating;
    }

    public function mobile(){
        $current_page = 'dien-thoai';
        $sliders = $this->getSliders(2);
        $brands = $this->getBrands(1);
        $item_hots = $this->getProductHotByCategory(1,2,true);
        $items = $this->getProductByCategory(1,16,[$item_hots[0]->id, $item_hots[1]->id]);
        return view('frontend.mobiles.index',compact('current_page', 'sliders', 'brands' , 'item_hots', 'items'));
    }

    public function mobileDetail($slug){
        $current_page = 'dien-thoai';
        $item = $this->getProduct($slug);
        $evaluates = $item->evaluates;
        $rating = $this->calcRatingByProduct($evaluates);
        $related_products = $this->getProductByBrand($item->brand->id, 4, [$item->id]);
        // dd($item->parameters);
        return view('frontend.mobiles.detail',compact('current_page', 'item','related_products','evaluates','rating'));
    }

    public function laptop(){
        $current_page = 'laptop';
        $sliders = $this->getSliders(3);
        $brands = $this->getBrands(2);
        $item_discounts = $this->getDiscountProducts(2,15);
        $item_hots = $this->getProductHotByCategory(2,2,true);
        $items = $this->getProductByCategory(2,16,[$item_hots[0]->id, $item_hots[1]->id]);
        return view('frontend.laptops.index',compact('current_page', 'sliders', 'brands', 'item_discounts', 'item_hots', 'items'));
    }
    public function laptopDetail($slug){
        $current_page = 'laptop';
        $item = $this->getProduct($slug);
        $evaluates = $item->evaluates;
        $countRating = $evaluates->countBy('rating');
        dd($countRating);
        $sum = count($evaluates);
        $count = $evaluates->countBy('rating')[5];
        $rating = isset($evaluates->countBy('rating')[5]) ? $evaluates->countBy('rating')[5] : 0;

        $percent = count($evaluates) ? (round((isset($evaluates->countBy('rating')[5]) ? $evaluates->countBy('rating')[5] : 0) / count($evaluates)*100,2,PHP_ROUND_HALF_EVEN)) : 0;
        dd($sum, $count, $rating, $percent);

        $related_products = $this->getProductByBrand($item->brand->id, 4, [$item->id]);
        return view('frontend.laptops.detail',compact('current_page', 'item','related_products','evaluates'));
    }
}
