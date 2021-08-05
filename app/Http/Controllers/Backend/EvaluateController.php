<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Evaluate as MainModel;
use DB;

class EvaluateController extends Controller
{
    private $pathViewController = 'backend.evaluates.';
    private $controllerName = 'evaluate';
    public $current_page = 'evaluate';
    
    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
        view()->share('current_page', $this->current_page);
    }
    public function index(Request $request)
    {
        $items = DB::table('evaluates')
            ->selectRaw('evaluates.product_id as product_id,products.avatar as product_avatar, products.name as product_name, avg(evaluates.rating) as avg_rating, count(evaluates.product_id) as number_reviews')
            ->join('products', 'evaluates.product_id', '=', 'products.id')
            ->groupBy('evaluates.product_id','products.name','products.avatar')
            ->orderBy('avg_rating', 'DESC')
            ->get();
        // dd($items);
        return view($this->pathViewController.'index',[
            'items'       => $items,
        ]);
    }

    public function show($id)
    {
        $items = MainModel::where('product_id',$id)->paginate(10);
        return view($this->pathViewController.'detail', compact('items'));
    }

    public function destroy($id)
    {
        try{
            MainModel::destroy($id);
        }catch(Exception $exception){

        }
    }

    public function destroys($product_id)
    {
        try{
            MainModel::where('product_id',$product_id)->delete();
            return true;
        }catch(Exception $exception){

        }
    }
}
