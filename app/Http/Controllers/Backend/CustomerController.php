<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer as MainModel;

class CustomerController extends Controller
{
    private $pathViewController = 'backend.customers.';
    private $controllerName = 'customer';
    public $current_page = 'customer';
    
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
        $items = $items->select(['id','name','phone','email'])->paginate(10);
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
    
    public function show($id)
    {
        return view($this->pathViewController.'index');
    }

    public function destroy($id)
    {
        try{
            MainModel::destroy($id);
            return true;
        }catch(Exception $exception){

        }
    }
}
