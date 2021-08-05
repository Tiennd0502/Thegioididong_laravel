<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;
use App\Models\Post as MainModel;

class PostController extends Controller
{
    private $pathViewController = 'backend.posts.';
    private $controllerName = 'post';
    public $current_page = 'post';
    const FOLDER_IMAGE = 'images/posts';
    
    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('current_page', $this->current_page);
    }
    public function index(Request $request)
    {
        $items = MainModel::orderBy('id','desc');
        if($request->name){
            $items = $items->where('name','LIKE', '%'.$request->name.'%');
        }   
        $items = $items->select(['avatar','id','name','description','active', 'created_at'])->paginate(10);
        return view($this->pathViewController.'index',[
            'items'       => $items,
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

    public function store(StorePostRequest $request)
    {
        $this->insertOrUpdate($request);
        return back()->with('message', __('Thêm bài viết thành công!'));
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
    
    public function update(StorePostRequest $request, $id)
    {  
        $this->insertOrUpdate($request, $id);
        return back()->with('message', __('Sửa bài viết thành công!'));
    }

    public function destroy($id)
    {
        try{
            if(!empty(MainModel::find($id)->avatar)){
                deleteFile(PostController::FOLDER_IMAGE .MainModel::find($id)->avatar);
              }
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
                    $item->avatar = uploadImage($request->avatar,PostController::FOLDER_IMAGE);
                    if($request->linkImage) {
                      deleteFile(PostController::FOLDER_IMAGE.$request->linkImage);
                    }  
                }
                // $item->modified_by = $request->modified_by;
            }else{
                $item = new MainModel();
                if($request->hasFile('avatar')){
                  $item->avatar = uploadImage($request->avatar,PostController::FOLDER_IMAGE);
                }
                // $item->created_by       = $request->created_by;
            }
            $item->name             = $request->name;
            $item->slug             = Str::slug($request->name);
            $item->description      = $request->description;
            $item->content          = $request->content;
            $item->title_seo        = !empty($request->title_seo) ? $request->title_seo :  $request->name;
            $item->description_seo  = !empty($request->description_seo) ? $request->description_seo : $request->name;
            $item->keyword_seo      = !empty($request->keyword_seo) ?$request->keyword_seo : $request->name;
            $item->active           = !empty($request->active) ?$request->active : 0;
            $item->save();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
      }

}
