<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Parameter;
use App\Models\Product as MainModel;
use App\Http\Requests\StoreProductRequest; 
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    private $pathViewController = 'backend.products.';
    private $controllerName = 'product';
    public $current_page = 'product';
    const FOLDER_IMAGE = 'images/products';
    const FOLDER_ICON = 'images/icons';

    public function __construct()
    {
      view()->share('controllerName', $this->controllerName);
      view()->share('current_page', $this->current_page);
      view()->share('categories', Category::orderBy('id', 'ASC')->get(['id','name']));
      view()->share('brands', Brand::orderBy('id', 'ASC')->get(['id','name']));
      view()->share('parameters', Parameter::groupBy('name')->get('name'));
    }

    public function index(Request $request)
    {
        $items = MainModel::orderBy('id','desc');
        if($request->name){
            $items = $items->where('name','LIKE', '%'.$request->name.'%');
        }
        if($request->category_id){
            $items = $items->where('category_id', $request->category_id);
            view()->share('brands', Brand::orderBy('id', 'ASC')->where('category_id', $request->category_id)->get(['id','name']));
        }
        if($request->brand_id){
            $items = $items->where('brand_id', $request->brand_id);
        }
        if($request->hot){
            $items = $items->where('hot', $request->hot);
        }
        $items = $items->select(['avatar','id','name','category_id','brand_id','active'])->paginate(15);

        return view($this->pathViewController.'index',[
            'items'         => $items, 
        ]);
    }
    public function filter(Request $request){
        // $items = Product::orderBy('id','desc');
        // if(!empty($request->attr1)){
        //     $items = $items->where('attr1',$request->attr1);
        // }
        // if(!empty($request->attr3)){
        //     $items = $items->where('attr1',$request->attr);
        // }
        // return  $items->paginate(15);
    }

    // OK
    // public function getBrand(Request $request){
    //     $result = Brand::where('category_id', $request->category_id)->get(['id','name']);
    //     return json_encode($result);
    // }

    public function getBrand($category_id){
        $result = Brand::where('category_id', $category_id)->get(['id','name']);
        return json_encode($result);
    }
    
    public function getParameter($name){
        $result = Parameter::where('name', $name)->orderBy('value','ASC')->get(['id','value']);
        return json_encode($result);
    }

    public function status($status, $id){
        if($status){
            $item = MainModel::find($id);
            switch ($status) {
                case 'active':
                    $item->active = !$item->active;
                    break;
                default:
                    # code...
                    break;
            }
            $item->save();
        }
        return redirect()->back();
    }

    public function create()
    {
        $brands = Brand::where('category_id', 1)->orderBy('id', 'ASC')->get(['id', 'name']);
        return view($this->pathViewController.'create',compact('brands'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->insertOrUpdate($request);

        return back()->with('message', __('Thêm sản phẩm thành công!'));
    }

    public function getAllParametersByProduct($id){
        $product = MainModel::find($id);
        $parameters = $product->parameters;
        return $parameters;
    }

    public function getAllProductsByParameter($id){
        $parameter = Parameter::find($id);
        $products = $parameter->products;
        return $products;
    }

    public function show($id)
    {
        return "xinchao";
        $item = MainModel::find($id);
        return view($this->pathViewController.'show',compact('item'));
    }

    public function edit($id)
    {
        $item = MainModel::find($id);
        
        view()->share('brands', Brand::where('category_id', $item->category_id)->get(['id','name']));
        //  lấy tất cả thông số của sản phẩm 
        $parametersByPrd = $item->parameters;
        //  lấy toàn bộ giá trị những thông số thuộc product
        //  thêm  thông số 'fellow' là những thằng cùng tên thông sô
        foreach($parametersByPrd as $key => $value){
            $parametersByPrd[$key]['fellow'] = Parameter::where('id','!=', $value->id)->where('name', $value->name)->get(['id','name','value']);
        }
        return view($this->pathViewController.'edit',compact('item','parametersByPrd'));
    }

    public function copy($id){
        $item = MainModel::find($id);
        view()->share('brands', Brand::where('category_id', $item->category_id)->get(['id','name']));
        $parametersByPrd = $item->parameters;
        //  lấy toàn bộ giá trị những thông số thuộc product
        //  thêm  thông số 'fellow' là những thằng cùng tên thông sô
        foreach($parametersByPrd as $key => $value){
            $parametersByPrd[$key]['fellow'] = Parameter::where('id','!=', $value->id)->where('name', $value->name)->get(['id','name','value']);
        }
        return view($this->pathViewController.'copy',compact('item','parametersByPrd'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return back()->with('message', __('Sửa sản phẩm thành công!'));
    }

    public function insertOrUpdate($request, $id = ''){
        try {
            if($id){
                $item              = MainModel::find($id);
                $item->modified_by = $request->modified_by;

                if($request->hasFile('avatar')){
                    $item->avatar = uploadImage($request->avatar,ProductController::FOLDER_IMAGE);
                    deleteFile(ProductController::FOLDER_IMAGE.$request->linkImage);
                }
                // img icon
                if(isset($request->linkIcon)){
                    if(!empty($request->linkIcon)){
                        if($request->hasFile('icon')){
                            $item->icon = uploadImage($request->icon,ProductController::FOLDER_ICON);
                        }else{
                            $item->icon = '';
                        }
                        deleteFile(ProductController::FOLDER_ICON.$request->linkIcon);
                    }
                }else{
                    if($request->hasFile('icon')){
                        $item->icon = uploadImage($request->icon,ProductController::FOLDER_ICON);
                    }
                }
                // image hot
                if(isset($request->linkHot)){
                    if(!empty($request->linkHot)){
                        if($request->hasFile('image_hot')){
                            $item->image_hot = uploadImage($request->icon,ProductController::FOLDER_IMAGE);
                        }else{
                            $item->image_hot = '';
                        }
                        deleteFile(ProductController::FOLDER_IMAGE.$request->linkHot);
                    }
                }else{
                    if($request->hasFile('image_hot')){
                        $item->image_hot = uploadImage($request->image_hot,ProductController::FOLDER_IMAGE);
                    }
                }

                //  lấy ảnh library củ va thao tác cũ
                $image_detail_new = json_decode($item->image_detail); 
                // ảnh củ còn lại
                if(isset($request->linkLibrary) && !empty($request->linkLibrary)){
                    // delete file 
                    foreach ($request->linkLibrary as $key => $value){
                        if($value != ''){
                            deleteFile(ProductController::FOLDER_IMAGE.$value);
                        }
                    }
                    // return arr with index =0
                    $image_detail_new = array_values(array_diff($image_detail_new, $request->linkLibrary));    
                }

                //  up load new image library
                if($request->hasFile('library')){
                    $image_detail_upload = noMore($request->delete_library, $request->library);
                    foreach ($image_detail_upload as $key => $value) {
                        $image_detail_new[] = uploadImage($value,ProductController::FOLDER_IMAGE);
                    }
                }
                
                $item->image_detail = $image_detail_new != null ? json_encode($image_detail_new) : NUll;
                //  lấy ảnh carousel củ 
                $image_carousel_new = json_decode($item->image_carousel); 
                // ảnh củ còn lại
                if(isset($request->linkCarousel) && !empty($request->linkCarousel)){
                    // delete file 
                    foreach ($request->linkCarousel as $key => $value){
                        if($value != ''){
                            deleteFile(ProductController::FOLDER_IMAGE.$value);
                        }
                    }
                    // return arr with index =0
                    $image_carousel_new = array_values(array_diff($image_carousel_new, $request->linkCarousel));    
                }
                //  up load new image carousel
                if($request->hasFile('carousel')){
                    $image_carousel_upload = noMore($request->delete_carousel, $request->carousel);
                    foreach ($image_carousel_upload as $key => $value) {
                        $image_carousel_new[] = uploadImage($value,ProductController::FOLDER_IMAGE);
                    }
                }
                $item->image_carousel = $image_carousel_new != null ? json_encode($image_carousel_new) : NUll;
            }else{
                $item = new MainModel();
                $item->created_by       = $request->created_by;
                
                if($request->hasFile('avatar')){
                    $item->avatar = uploadImage($request->avatar,ProductController::FOLDER_IMAGE);
                }
                if($request->hasFile('image_hot')){
                    $item->image_hot = uploadImage($request->image_hot,ProductController::FOLDER_IMAGE);
                }
                if($request->hasFile('icon')){
                    $item->icon = uploadImage($request->file('icon'),ProductController::FOLDER_ICON);
                }
                if($request->hasFile('library')){
                    $path_lib = [];
                    $library = noMore($request->delete_library, $request->library);
                    foreach ($library as $key => $value) {
                        $path_lib[]= uploadImage($value,ProductController::FOLDER_IMAGE);
                    }
                    $item->image_detail =json_encode($path_lib);
                }
                if($request->hasFile('carousel')){
                    $path_carousel = [];
                    $carousel = noMore($request->delete_carousel, $request->carousel);
                    foreach ($carousel as $key => $value) {
                        $path_carousel[]= uploadImage($value,ProductController::FOLDER_IMAGE);
                    }
                    $item->image_carousel = json_encode($path_carousel);
                }
            }
            $item->category_id      = $request->category_id;
            $item->brand_id         = $request->brand_id;
            $item->name             = $request->name;
            $item->slug             = Str::slug($request->name);
            $item->price            = $request->price;
            $item->discount         = $request->discount;
            $item->gift             = $request->gift;
            $item->hot              = $request->hot == 1 ? 1 : 0;
            $item->active           = $request->active == 1 ? 1 : 0;
            $item->description      = $request->description;
            $item->content          = $request->content;
            $item->title_seo        = $request->title_seo ? $request->title_seo : $request->name;
            $item->description_seo  = $request->description_seo? $request->description_seo : $request->name;
            $item->keyword_seo      = $request->keyword_seo ? $request->keyword_seo : $request->name ;
            $item->save();
            // thêm Parameter mới hoàn toàn
            $newParameterId = [];
            if(isset($request->new_name_parameter) && !empty($request->new_name_parameter)){
                // lấy mãng name và value mới
                $newNameParameter = $request->new_name_parameter;
                $newValueParameter = $request->new_value_parameter;
                // insert new Parameter rồi lấy id insert Parameter_product
                for($i= 0; $i < count($newNameParameter); $i++){
                    $parameter = new Parameter();
                    $parameter->name = $newNameParameter[$i];
                    $parameter->value = $newValueParameter[$i];
                    $parameter->save();
                    $newParameterId[] = $parameter->id;
                }
            }
            $parameterId = Arr::collapse([!empty($request->value_parameter) ?$request->value_parameter : [], $newParameterId]);
            // thêm vào parameter_products
            $item->parameters()->sync($parameterId);
            
        } catch (ModelNotFoundException $exception) {
          return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function destroy($id){
        try{
            $item = MainModel::find($id);
            deleteFile(ProductController::FOLDER_IMAGE .MainModel::find($id)->avatar);
            if(!empty($item->icon)){
                deleteFile(ProductController::FOLDER_IMAGE .MainModel::find($id)->icon);
            }
            if(!empty($item->image_hot)){
                deleteFile(ProductController::FOLDER_IMAGE .MainModel::find($id)->icon);
            }
            if(!empty($item->image_detail)){
                foreach (json_decode($item->image_detail) as $key => $value) {
                    deleteFile(ProductController::FOLDER_IMAGE .$value);
                }
                
            }
            if(!empty($item->image_carousel)){
                foreach (json_decode($item->image_carousel) as $key => $value) {
                    deleteFile(ProductController::FOLDER_IMAGE .$value);
                }
                
            }
            MainModel::destroy($id);
            return true;
        }catch(Exception $exception){

        }
    }
}
