<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Parameter as MainModel;
use App\Http\Requests\StoreParameterRequest;


class ParameterController extends Controller
{
    private $pathViewController = 'backend.parameters.';
    private $controllerName = 'parameter';
    public $current_page = 'parameter';

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
        $items = $items->select(['id','name','value'])->paginate(15);
        
        // dd($items);
        return view($this->pathViewController.'index',[
            'items'         => $items, 
        ]);
    }

    public function create()
    {
        return view($this->pathViewController.'create',[]);
    }

    public function store(StoreParameterRequest $request)
    {
        $data = [
            'name' => $request->name,
            'value' => $request->value
        ];
        $result = MainModel::where($data)->first();

        
        if($result == null){
            // $this->insertOrUpdate($request);

            $item = new MainModel();
            $item->name = $request->name;
            $item->value = $request->value;
            $item->save();
            if($request->ajax()){
                return json_encode(MainModel::find($item->id));
            } 
            return redirect()->route($this->controllerName.'.create')->with('message', 'Thêm thông số thành công!');    
        }else{
            if($request->ajax()){
                return json_encode(false);
            } 
            return redirect()->back()->with('error', __('Thông số '.$request->name.' với giá trị '.$request->value. ' đã tồn tại !'));   
        }
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

    public function copy($id)
    {
        $item = MainModel::find($id);
        return view($this->pathViewController.'copy',[
            'item' => $item,
        ]);
    }

    public function update(StoreParameterRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'value' => $request->value
        ];
        $result = MainModel::where('id','!=',$id)->where($data)->first();

        if($result == null){
            // $this->insertOrUpdate($request, $id);
            $item = MainModel::find($id);
            $item->name = $request->name;
            $item->value = $request->value;
            $item->save();

            return back()->with('message', __('Sửa thông số thành công!'));    
        }else{
            
            return redirect()->back()->with('error', __('Thông số '.$request->name.' với giá trị '.$request->value. ' đã tồn tại !'));    
        }
    }

    public function destroy($id)
    {
        try{
            MainModel::destroy($id);
            return true;
        }catch(Exception $exception){

        }
    }

    public function insertOrUpdate($request, $id = ''){
        try {
            if($id){
                $item = MainModel::find($id);
                
            }else{
                $item = new MainModel();
            }
            $item->name = $request->name;
            $item->value = $request->value;
            $item->save();
            
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }


}
