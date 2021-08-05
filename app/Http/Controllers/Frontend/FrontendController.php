<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Product;

class FrontendController extends Controller
{
    public function __construct(){
        view()->share('categories', MainModel::get(['id','name','icon','slug']));
    }

    public function getSliders($page_id){
        
        $result = Slider::where([
            'page_id' => $page_id,
            'active' => 1
        ])->orderBy('position','asc')->get(['id','name','avatar','link']);
        
        return $result;
    }

    public function getBrands($category_id){
        $result = Brand::where([
            'category_id' => $category_id,
            'active' => 1
        ])->orderBy('position','asc')->get(['id','name','avatar']);
        return $result;
    }

    public function getProduct($slug){
        $result = Product::where('slug', $slug)->first();
        return $result;
    }

    public function getDiscountProducts($category_id = 0, $per_page = 15){
        $result = Product::where('discount', '!=', 0)->where('active',1);
        if($category_id){
            $result = $result->where('category_id', $category_id);
        }
        $result = $result->orderBy('created_at', 'ASC')->paginate($per_page);
        return $result;
    }

    public function getProductHotByCategory($category_id, $per_page = 6, $image_hot = false, $notIn = []){
        $check_product = [
            'active' => 1,
            'hot'=>1,
            'category_id' => $category_id
        ];
        $result = Product::where($check_product)->whereNotIn('id', $notIn)->orderBy('created_at', 'ASC');
        if($image_hot){
            $result = $result->where('image_hot', '!=' , '');
        }
        $result = $result->paginate($per_page);
        if($per_page == 1){
            $result = $result->first();
        }
        return $result;
    }

    

    public function getProductByCategory($category_id, $per_page = 15, $notIn = []){
        $check_product = [
            'active' => 1,
            'category_id' => $category_id
        ];
        $result = Product::where($check_product)->whereNotIn('id', $notIn)->orderBy('created_at', 'ASC')->paginate($per_page);
        return $result;
    }

    public function getProductByBrand($brand_id, $per_page = 4, $notIn = []){
        $check_product = [
            'active' => 1,
            'brand_id' => $brand_id
        ];
        $result = Product::where($check_product)->whereNotIn('id', $notIn)->orderBy('created_at', 'ASC')->paginate($per_page);
        return $result;
    }




}
