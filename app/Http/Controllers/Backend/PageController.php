<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StorePageRequest;
use Illuminate\Support\Str;
use App\Models\Page as MainModel;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;

class PageController extends Controller
{
    private $pathViewController = 'backend.pages.';
    private $controllerName = 'page';
    private $current_page = 'page';
    

    public function __construct(){
        view()->share('controllerName', $this->controllerName);
        view()->share('current_page', $this->current_page);

    }

    public function index(Request $request)
    {
        $items = MainModel::orderBy('id','ASC');
        if($request->name){
            $items = $items->where('name','LIKE', '%'.$request->name.'%');
        }   
        $items = $items->select(['id','name','link', 'created_at','updated_at'])->paginate(10);
        return view($this->pathViewController.'index',[
            'items' => $items,
        ]);
    }

    public function create()
    {
        return view($this->pathViewController.'create',[
            
        ]);
    }

    public function store(StorePageRequest $request)
    {
        $this->insertOrUpdate($request);
        return back()->with('message', __('Thêm trang thành công!'));
        
    }

    public function show($id)
    { 
        $item = MainModelsDB::find($id);
        return view($this->pathViewController.'index',[
        ]);
    }
    
    public function edit($id)
    {
        // c1
        // $item = MainModel::find($id); // APP_DEBUG=false
        // => page 500 SERVER ERROR
        //c2
        // $item = MainModel::findOrFail($id); // APP_DEBUG=true
        // 404 NOT FOUND page default of laravel
        //  custom => views folder errors=> file 404.blade.php
        // c3
        // try {
        //     $item = MainModel::where('id',$id)->firstOrFail();
        // } catch (\Exception $exception) { // K có \ thì vào PAGE 404 DEFAULT
        //     return view($this->pathViewController.'notfound');
        // }
        // TH load relationshop
        // try {
        //     $item = MainModel::where('id',$id)->first();
        //     $item->load(['hello']);
        // } catch (\Exception $exception) { // K có \ thì vào PAGE 404 DEFAULT
        //     // dd($exception->getMessage());// lấy lỗi
        //     dd(get_class($exception)); // lấy class lỗi

        //     return view($this->pathViewController.'notfound');
        // }
        try {
            $item = MainModel::where('id',$id)->firstOrFail();
            // $item->load(['hello']);
        }catch(ModelNotFoundException $exception){   
            return view($this->pathViewController.'notfound');
        }catch (RelationNotFoundException $exception) { 
            return view($this->pathViewController.'relations');
        }
        return view($this->pathViewController.'edit',[
            'item'      => $item,
        ]);
    }

    public function update(StorePageRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);    
        return back()->with('message', __('Sửa trang thành công!'));        
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
          $item = new MainModel();
          if($id){
            $item = MainModel::find($id);
          }
          $item->name = ucfirst($request->name);
          $item->link = '/'.Str::slug($request->name);
          $item->save();
        } catch (ModelNotFoundException $exception) {
          return back()->withError($exception->getMessage())->withInput();
        }
      }
}
