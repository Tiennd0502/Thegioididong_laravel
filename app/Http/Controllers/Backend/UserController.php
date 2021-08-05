<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User as MainModel;
use App\Models\Role;
use App\Http\Requests\StoreUserRequest;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $pathViewController = 'backend.users.';
    private $controllerName = 'user';
    public $current_page = 'user';
    const FOLDER_IMAGE = 'images/users';

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
        $items = $items->paginate(10);
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
        $roles = Role::all();
        return view($this->pathViewController.'create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->insertOrUpdate($request);
        return back()->with('message', __('Thêm thành viên thành công!'));
    }

    public function show($id)
    {
        return view($this->pathViewController.'index');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $item        = MainModel::find($id);
        $roleOfUser = $item->roles;
        // dd($roleOfUser);
        return view($this->pathViewController.'edit',compact('item','roles','roleOfUser'));
    }
    
    public function update(StoreUserRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return back()->with('message', __('Sửa thông tin thành viên thành công!'));
    }

    public function destroy($id)
    {
        try{
            $item = MainModel::find($id);
            // if($item->avatar != NULL){
            //     deleteFile(UserController::FOLDER_IMAGE .$item->avatar);
            // }
            $item->delete();
            return true;
        }catch(Exception $exception){

        }
    }
    public function insertOrUpdate($request, $id = ''){
        try {
            DB::beginTransaction();
            if($id){
                $item = MainModel::find($id);
                if($request->hasFile('avatar')){
                    $item->avatar = uploadImage($request->avatar,UserController::FOLDER_IMAGE);
                    deleteFile(UserController::FOLDER_IMAGE.$request->linkImage);
                }
            }else{
                $item = new MainModel();
                if($request->hasFile('avatar')){
                    $item->avatar = uploadImage($request->avatar,UserController::FOLDER_IMAGE);
                }
            }
            $item->name       = $request->name;
            $item->email       = $request->email;
            $item->password   = bcrypt($request->password);
            $item->active     = $request->active;
            $item->save();
            $item->roles()->sync($request->role_id);
            DB::commit();
        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            return back()->with('error', __('Sửa thông tin thành viên không thành công!'));
        }
      }
}
