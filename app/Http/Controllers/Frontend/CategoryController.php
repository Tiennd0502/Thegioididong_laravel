<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Http\Request;
use App\Models\Category as MainModel;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;


class CategoryController extends FrontendController
{
    public $current_page = '';

    public function __construct(){
        // parent::__construct();
        view()->share('categories', MainModel::get(['id','name','icon','slug']));
    }

    public function index($category_slug = null){
        if($category_slug == null || $category_slug == 'home' || $category_slug == 'trang-chu'){
            return $this->home();
        }else{
            $category = MainModel::where('slug',$category_slug)->first();
            if($category){
                switch ($category->slug) {  
                    case 'dien-thoai':
                        return $this->mobile(); 
                        break;
                    case 'laptop':
                        return $this->laptop(); 
                        break;
                    case 'tablet':
                        return $this->tablet(); 
                        break;
                    case 'phu-kien':
                        return $this->accessory(); 
                        break;
                    case 'dong-ho-thoi-trang':
                        return $this->fWatch(); 
                        break;
                    case 'dong-ho-thong-minh':
                        return $this->sWatch(); 
                        break;
                    case 'pc-may-in':
                        return $this->pcPrinter(); 
                        break;
                    case 'may-in':
                        return $this->printer(); 
                        break;
                    case 'muc-in':
                        return $this->printingInk(); 
                        break;
                    case 'man-hinh-may-tinh':
                        return $this->computerScreen(); 
                        break;
                    case 'may-tinh-de-ban':
                        return $this->desktop(); 
                        break;
                    case 'may-cu-gia-re':
                        return $this->cheapSecondHandMachine(); 
                        break;
                    default:
                        break;
                }
            }else{
                abort(404);
            }
        }
    }

    public function home(){
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

    public function mobile(){
        $current_page = 'dien-thoai';
        $sliders = $this->getSliders(2);
        $brands = $this->getBrands(1);
        $item_hots = $this->getProductHotByCategory(1,2,true);
        $items = $this->getProductByCategory(1,16,[$item_hots[0]->id, $item_hots[1]->id]);
        return view('frontend.mobiles.index',compact('current_page', 'sliders', 'brands' , 'item_hots', 'items'));
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
    public function tablet(){
        $current_page = 'tablet';
        $sliders = $this->getSliders(4);
        $brands = $this->getBrands(3);
        $item_hots = $this->getProductHotByCategory(3,2,true);
        $items = $this->getProductByCategory(3,16,[$item_hots[0]->id, $item_hots[1]->id]);
        return view('frontend.tablets.index',compact('current_page', 'sliders', 'brands', 'item_hots', 'items'));
    }

    public function accessory(){
        $current_page = 'phu-kien';
        $sliders = $this->getSliders(9);
        $brands = $this->getBrands(4);
        $items = $this->getProductByCategory(4,16);
        return view('frontend.accessories.index',compact('current_page', 'sliders', 'brands' , 'items'));
    }

    public function fWatch(){
        $current_page = 'dong-ho-thoi-trang';
        $sliders = $this->getSliders(6);
        $brands = $this->getBrands(5);
        $f_watch_hots = $this->getProductHotByCategory(5,15);
        $s_watch_hots = $this->getProductHotByCategory(6,15);
        $watch_chain_hots = $this->getProductHotByCategory(5,15);
        $items = $this->getProductByCategory(5,15);
        return view('frontend.f_watchs.index',compact('current_page', 'sliders', 'brands' , 'f_watch_hots', 's_watch_hots', 'watch_chain_hots', 'items'));
    }

    public function sWatch(){
        $current_page = 'dong-ho-thong-minh';
        $sliders = $this->getSliders(6);
        $brands = $this->getBrands(6);
        $items = $this->getProductByCategory(6,20);
        return view('frontend.s_watchs.index',compact('current_page', 'sliders', 'brands' , 'items'));
    }

    public function pcPrinter(){
        $current_page = 'pc-may-in';
        $sub_current_page = ' ';
        $sliders = $this->getSliders(10);
        $brands = $this->getBrands(7);
        $items = $this->getProductByCategory(7,20);
        return view('frontend.pc_printers.index',compact('current_page', 'sub_current_page','sliders', 'brands' , 'items'));
    }

    public function printer(){
        $current_page = 'pc-may-in';
        $sub_current_page = 'may-in';
        $sliders = $this->getSliders(10);
        $brands = $this->getBrands(7);
        $items = $this->getProductByCategory(7,20);
        return view('frontend.pc_printers.index',compact('current_page', 'sub_current_page', 'sliders', 'brands' , 'items'));
    }

    public function printingInk(){
        $current_page = 'pc-may-in';
        $sub_current_page = 'muc-in';
        $sliders = $this->getSliders(10);
        $brands = $this->getBrands(7);
        $items = $this->getProductByCategory(7,20);
        return view('frontend.pc_printers.index',compact('current_page', 'sub_current_page', 'sliders', 'brands' , 'items'));
    
    }
    public function computerScreen(){
        $current_page = 'pc-may-in';
        $sub_current_page = 'man-hinh-may-tinh';
        $sliders = $this->getSliders(10);
        $brands = $this->getBrands(7);
        $items = $this->getProductByCategory(7,20);
        return view('frontend.pc_printers.index',compact('current_page', 'sub_current_page', 'sliders', 'brands' , 'items'));
    }

    public function desktop(){
        $current_page = 'pc-may-in';
        $sub_current_page = 'may-tinh-de-ban';
        $sliders = $this->getSliders(10);
        $brands = $this->getBrands(7);
        $items = $this->getProductByCategory(7,20);
        return view('frontend.pc_printers.index',compact('current_page', 'sub_current_page', 'sliders', 'brands' , 'items'));
    }

    public function cheapSecondHandMachine(){
        $current_page = 'may-cu-gia-re';
        $sliders = $this->getSliders(10);
        $mobile_old = $this->getProductByCategory(1,10);
        $laptop_old = $this->getProductByCategory(2,10);
        $tablet_old = $this->getProductByCategory(3,10);
        $s_watch_old = $this->getProductByCategory(6,10);
        return view('frontend.second_hands.index',compact('current_page', 'sliders','mobile_old','laptop_old','tablet_old','s_watch_old'));
    }

    public function post(){
        $current_page = 'tin-tuc';
        return view('frontend.posts.index', compact('current_page'));
    }

    public function cart(){
        $current_page = '';
        if(session()->has('cart') && count(session()->get('cart'))){
            return view('frontend.carts.index',compact('current_page'));
        }else{
            return view('frontend.carts.empty',compact('current_page'));
        }
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

    public function detail($category, $product_name){
        $item = Product::where('slug', $product_name)->first();
        $current_page = $category;
        $category = MainModel::where('slug',$category)->first();

        $related_products = Product::whereNotIn('id', [$item->id])->where('active' ,1)->where('brand_id',$item->brand_id)->limit(4)->get(['id', 'name', 'slug', 'price', 'discount', 'avatar', 'icon', 'image_hot']);

        // dd($related_products);

        switch ($current_page) {
            
            case 'dien-thoai':
                
                return view('Frontend.mobiles.detail',[
                    'current_page' => $current_page,
                    'category' => $category,
                    'item'=> $item,
                    'related_products' => $related_products,
                ]);
                break;

            case 'laptop':
                return view('Frontend.laptop.index',[
                    'current_page' => $current_page,
                    'sliders' => $sliders,
                    'items'=> $items,
                    'brands' => $brands
                ]);
                break;
            default:
                # code...
                break;
        }
    }

    public function showMore($category_id, $page){
        $result = Brand::where('category_id', $category_id)->get(['id','name']);
        
        return json_encode($result);
    }
}
