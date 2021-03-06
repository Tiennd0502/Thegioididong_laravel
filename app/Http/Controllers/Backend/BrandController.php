<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand as MainModel;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    private $pathViewController = 'backend.brands.';
    private $controllerName = 'brand';
    public $current_page = 'brand';
    const FOLDER_IMAGE = 'images/brands';

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('current_page', $this->current_page);
        view()->share('categories', Category::orderBy('id','asc')->get(['id','name']));

    }
    public function index(Request $request)
    {
        $items = MainModel::orderBy('id','desc');
        if($request->name){
            $items = $items->where('name','LIKE', '%'.$request->name.'%');
        }
        if($request->category_id){
            $items = $items->where('category_id', $request->category_id);
        }
        $items = $items->select(['avatar','id','name','category_id','active'])->paginate(10);
        return view($this->pathViewController.'index',[
            'items'=> $items,
        ]);
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
        return view($this->pathViewController.'create',[]);
    }

    public function store(StoreBrandRequest $request)
    {
        $this->insertOrUpdate($request);
		return redirect()->route('brand.create')->with('message', 'Thêm thương hiệu thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = MainModel::find($id);
        return view($this->pathViewController.'edit',[
            'item' => $item,
        ]);
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return back()->with('message', __('Sửa thương hiệu thành công!'));

    }

    public function destroy($id)
    {
        try{
            $path = MainModel::find($id)->image;
            deleteFile(BrandController::FOLDER_IMAGE .$path);
            MainModel::destroy($id);
            return true;
        }catch(Exception $exception){

        }
    }

    public function insertOrUpdate($request, $id = ''){
        try {
            if($id){
                $item = MainModel::find($id);
                if($request->hasFile('avatar')){
                    $item->avatar = uploadImage($request->avatar,BrandController::FOLDER_IMAGE );
                    deleteFile(BrandController::FOLDER_IMAGE .$request->linkImage);
                }
            }else{
                $item = new MainModel();
                $item->avatar = uploadImage($request->avatar, BrandController::FOLDER_IMAGE );
            }
            $item->name = $request->name;
            $item->category_id = $request->category_id;
            $item->position = $request->position;
            $item->save();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
