<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order as MainModel;

class OrderController extends Controller
{
    private $pathViewController = 'backend.orders.';
    private $controllerName = 'order';
    public $current_page = 'order';
    
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
            'items'       => $items,
        ]);
    }

    public function edit($id)
    {
        $item = MainModel::find($id);
        dd($item);
    }

    public function update(Request $request, $id)
    {
        $item = MainModel::find($id);
        $item->status = $request->status;
        $item->save();
        // dd($id . '---'. $request->status);
        return true;
    }

    public function show($id)
    {
        $item = MainModel::find($id);
        return view($this->pathViewController.'detail', compact('item'));
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
