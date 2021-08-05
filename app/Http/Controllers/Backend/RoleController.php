<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreRoleRequest;
use App\Models\Role as MainModel;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    private $pathViewController = 'backend.roles.';
    private $controllerName = 'role';
    public $current_page = 'role';

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

    
    public function create()
    {
        $permissions = Permission::where('parent_id', 0)->get();
        return view($this->pathViewController.'create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $this->insertOrUpdate($request);
        return back()->with('message', __('Thêm vai trò thành công!'));
    }

    public function show($id)
    {
        $item = MainModel::find($id);
        $permissionsOfRole = $item->permissions;
        return view($this->pathViewController.'index');
    }

    public function edit($id)
    {
        $item        = MainModel::find($id);
        $permissions = Permission::where('parent_id', 0)->get();
        $permissionsOfRole = $item->permissions;
        return view($this->pathViewController.'edit',compact("item", 'permissions', 'permissionsOfRole'));
    }
    
    public function update(StoreRoleRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return back()->with('message', __('Sửa vai trò thành công!'));
    }

    public function destroy($id)
    {
        MainModel::destroy($id);
        return true;
    }
    public function insertOrUpdate($request, $id = ''){
        try {
            DB::beginTransaction();
            if($id){
                $item = MainModel::find($id);
            }else{
                $item = new MainModel();
            }
            $item->name           = $request->name;
            $item->display_name   = $request->display_name;
            $item->save();
            $item->permissions()->sync($request->permission_id);
            DB::commit();
        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            return back()->with('error', __('Sửa thông tin thành viên không thành công!'));
        }
    }
}
