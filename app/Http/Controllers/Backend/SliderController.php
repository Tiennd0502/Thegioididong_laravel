<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider as MainModel;
use App\Models\Page;

class SliderController extends Controller
{
    private $pathViewController = 'backend.sliders.';
    private $controllerName = 'slider';
    public $current_page = 'slider';
    const FOLDER_IMAGE = 'images/sliders';
    
    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('current_page', $this->current_page);
        view()->share('pages', Page::orderBy('id', 'ASC')->get(['id', 'name']));

    }
    public function index(Request $request)
    {
        $items = MainModel::orderBy('id','desc');
        if($request->name){
            $items = $items->where('name','LIKE', '%'.$request->name.'%');
        }
        if($request->page_id){
            $items = $items->where('page_id', $request->page_id);
        }
        $items = $items->select(['avatar','id','name','page_id','active'])->paginate(10);
        return view($this->pathViewController.'index',[
            'items'         => $items, 
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
        return view($this->pathViewController.'create');
    }

    public function store(StoreSliderRequest $request)
    {
        $this->insertOrUpdate($request);
        
        return back()->with('message', __('Thêm slider thành công!'));
    }

    public function show($id)
    {
        return view($this->pathViewController.'index');
    }

    public function edit($id)
    {
        $item        = MainModel::find($id);
        return view($this->pathViewController.'edit',compact("item"));
    }
    
    public function update(UpdateSliderRequest $request, $id)
    {
        
        $this->insertOrUpdate($request, $id);
        return back()->with('message', __('Sửa slider thành công!'));
    }

    public function destroy($id)
    {
        try{
            deleteFile(SliderController::FOLDER_IMAGE .MainModel::find($id)->avatar);
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
                    $item->avatar = uploadImage($request->avatar,SliderController::FOLDER_IMAGE);
                    deleteFile(SliderController::FOLDER_IMAGE.$request->linkImage);
                }
                $item->modified_by = $request->modified_by;
            }else{
                $item = new MainModel();
                $item->avatar = uploadImage($request->avatar,SliderController::FOLDER_IMAGE);
            }
            $item->page_id    = $request->page_id;
            $item->name       = $request->name;
            $item->link       = $request->link;
            $item->position   = $request->position;
            $item->active     = $request->active;
            $item->created_by = $request->created_by;
            $item->save();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
      }

}
