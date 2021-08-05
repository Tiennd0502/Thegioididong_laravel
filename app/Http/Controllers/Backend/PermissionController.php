<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StorePermissionRequest;
use App\Models\Permission as MainModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    private $pathViewController = 'backend.permissions.';
    private $controllerName = 'permission';
    public $current_page = 'permission';

    private $modulesParent;
    private $modulesChild;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('current_page', $this->current_page);
        $this->modulesParent = config('permissions.module_parent');
        $this->modulesChild = config('permissions.module_child');
    }
    public function index(Request $request)
    {
        $items = MainModel::orderBy('id','desc')->where('parent_id',0);
        if($request->name){
            $items = $items->where('name','LIKE', '%'.$request->name.'%');
        }
        $items = $items->paginate(10);
        return view($this->pathViewController.'index',[
            'items'         => $items, 
        ]);
    }

    public function create()
    {
        $modulesParent = $this->modulesParent;
        $modulesChild = $this->modulesChild;
        return view($this->pathViewController.'create',compact('modulesParent','modulesChild'));
    }

    public function store(StorePermissionRequest $request)
    {
        try{
            DB::beginTransaction();
            $item = new MainModel();
            $item->name         = Str::start(Str::lower($this->modulesParent[$request->module_parent]) , 'Quản lý ');
            $item->display_name = Str::start(Str::lower($this->modulesParent[$request->module_parent]) , 'Quản lý ');
            $item->key_code     = $request->module_parent;
            $item->parent_id    = 0;
            $item->save();
            foreach ($request->module_child as $value) {
                $child = new MainModel();
                $child->name         = Str::start($this->modulesParent[$request->module_parent], $this->modulesChild[$value].' ');
                $child->display_name = Str::start($this->modulesParent[$request->module_parent], $this->modulesChild[$value].' ');
                $child->key_code     = $value. '-'. $request->module_parent;
                $child->parent_id    = $item->id;
                $child->save();
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('error', __('Thêm quyền không thành công!'));
        }
        return back()->with('message', __('Thêm quyền thành công!'));
    }

    public function show($id)
    {
        return view($this->pathViewController.'index');
    }

    public function edit($id)
    {
        $item        = MainModel::find($id);
        $permissionsParent = MainModel::where('parent_id',0)->get();
        $permissionsChild = $item->permissionsChildren;
        $modulesParent = $this->modulesParent;
        $modulesChild = $this->modulesChild;
        return view($this->pathViewController.'edit',compact("item",'permissionsParent','permissionsChild', 'modulesParent', 'modulesChild'));
    }
    
    public function update(StorePermissionRequest $request, $id)
    {
        try{
            DB::beginTransaction();
            $item = MainModel::find($id);
            $item->name         = 'Quản lý '. Str::lower($this->modulesParent[$request->module_parent]);
            $item->display_name = Str::start(Str::lower($this->modulesParent[$request->module_parent]) , 'Quản lý ');
            $item->key_code     = $request->module_parent;
            $item->parent_id    = 0;
            $item->save();
            $permissionsChild = $item->permissionsChildren;
            $permissionsOld = [];
            $permissionsNew = [];
            foreach($permissionsChild as $permissionItemChild){
                $permissionsOld[] = $permissionItemChild->key_code;
            }
            foreach($request->module_child as $itemChild){
                $permissionsNew[$itemChild] = $itemChild.'-'.$item->key_code;
            }
            // delete
            $permissionsRemove = collect($permissionsOld)->diff($permissionsNew)->all();
            if($permissionsRemove){
                foreach($permissionsRemove as $remove){
                    MainModel::where('key_code',$remove )->delete();
                }
            }
            // add
            $permissionsAdd = collect($permissionsNew)->diff($permissionsOld)->all();
            if($permissionsAdd){
                foreach ($permissionsAdd as $key => $key_code) {
                    $child = new MainModel();
                    $child->name         = $this->modulesChild[$key].' '.$this->modulesParent[$item->key_code];
                    $child->display_name = Str::start($this->modulesParent[$item->key_code], $this->modulesChild[$key].' ');
                    $child->key_code     = $key_code;
                    $child->parent_id    = $item->id;
                    $child->save();
                }
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('error', __('Sửa quyền không thành công!'));
        }
        return back()->with('message', __('Sửa quyền thành công!'));
    }

    public function destroy($id)
    {

        MainModel::destroy($id);
        MainModel::where('parent_id',$id)->delete();
        return true;
    }
    
}
