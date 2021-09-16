<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ParameterController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\EvaluateController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\UserController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CategoryController as FCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// use App\Models\User;
 
// Route::get('/', function () {
//     return view('welcome');
// });



// Backend
$prefix_admin = config('config.url.prefix_admin');
//  admin 123123123
//  tiennd0502 123123123
// Route::get('createUser',function(){
//     $user = new User();
//     $user->name = "tiennd0502";
//     $user->email= 'tiennd0502@gmail.com';
//     $user->password = bcrypt('123123');
//     $user->save();
// });

Route::get('/admin', [AdminController::class, 'getLogin'])->name('admin.getLogin');
Route::get('', [AdminController::class, 'getLogin'])->name('admin.getLogin');
Route::get('/login', [AdminController::class, 'getLogin'])->name('admin.getLogin');
Route::post('', [AdminController::class, 'postLogin'])->name('admin.postLogin');
Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::group(['prefix' => $prefix_admin, 'namespace' => 'Backend', 'middleware'=>'auth'],function(){ //  , 'middleware'=>'auth'

    // =============================== dashboard ===============================
    $prefix         = 'dashboard';
    $controllerName = 'dashboard';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [DashboardController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:show-'.$controllerName);
    });

    // =============================== Page ===============================
    $prefix         = 'page';
    $controllerName = 'page';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [PageController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/create', [PageController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [PageController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [PageController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::delete('/{id}', [PageController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [PageController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [PageController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);
    });
    //=============================== slider ===============================
    $prefix         = 'slider';
    $controllerName = 'slider';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [SliderController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/{status}/{id}',[SliderController::class, 'status'])   ->name($controllerName.'.status')->whereNumber('id')->middleware('can:list-'.$controllerName);
        Route::get('/create', [SliderController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [SliderController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [SliderController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::delete('/{id}', [SliderController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [SliderController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [SliderController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);
    });
    //=============================== Category ===============================
    $prefix         = 'category';
    $controllerName = 'category';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [CategoryController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/{status}/{id}',[CategoryController::class, 'status'])   ->name($controllerName.'.status')->whereNumber('id')->middleware('can:list-'.$controllerName);
        Route::get('/create', [CategoryController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [CategoryController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [CategoryController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::delete('/{id}', [CategoryController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [CategoryController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        
    });
    //=============================== brand ===============================
    $prefix         = 'brand';
    $controllerName = 'brand';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [BrandController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/{status}/{id}', [BrandController::class, 'status'])->name($controllerName.'.status')->whereNumber('id')->middleware('can:list-'.$controllerName);
        Route::get('/create', [BrandController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [BrandController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [BrandController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::delete('/{id}', [BrandController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [BrandController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [BrandController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);
    });
    //=============================== Parameter ===============================
    $prefix         = 'parameter';
    $controllerName = 'parameter';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [ParameterController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/create', [ParameterController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [ParameterController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [ParameterController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::get('/{id}/copy', [ParameterController::class, 'copy'])        ->name($controllerName.'.copy')->whereNumber('id')->middleware('can:copy-'.$controllerName);
        Route::delete('/{id}', [ParameterController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [ParameterController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [ParameterController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);    
    });
    //=============================== product ===============================
    $prefix         = 'product';
    $controllerName = 'product';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [ProductController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/{status}/{id}', [ProductController::class, 'status'])  ->name($controllerName.'.status')->whereNumber('id')->middleware('can:list-'.$controllerName);
        Route::get('/create', [ProductController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [ProductController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [ProductController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::get('/{id}/copy', [ProductController::class, 'copy'])        ->name($controllerName.'.copy')->whereNumber('id')->middleware('can:copy-'.$controllerName);
        Route::delete('/{id}', [ProductController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [ProductController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [ProductController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        // Route::get('getBrand',$controller.'getBrand')->name('getBrand');
        Route::post('/getBrand/{category_id}', [ProductController::class, 'getBrand'])->name('getBrand');
        Route::post('/getParameter/{name}', [ProductController::class, 'getParameter'])->name('getParameter');
    });
    //=============================== post ===============================
    $prefix         = 'post';
    $controllerName = 'post';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [PostController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/{status}/{id}', [PostController::class, 'status'])->name($controllerName.'.status')->whereNumber('id')->middleware('can:list-'.$controllerName);
        Route::get('/create', [PostController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [PostController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [PostController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::get('/{id}/copy', [PostController::class, 'copy'])         ->name($controllerName.'.copy')->whereNumber('id')->middleware('can:copy-'.$controllerName);
        Route::delete('/{id}', [PostController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [PostController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [PostController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);    
    });

    //=============================== customer ===============================
    $prefix         = 'customer';
    $controllerName = 'customer';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [CustomerController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/{status}/{id}', [CustomerController::class, 'status'])->name($controllerName.'.status')->whereNumber('id')->middleware('can:list-'.$controllerName);
        Route::delete('/{id}', [CustomerController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
    });

    //=============================== order ===============================
    $prefix         = 'order';
    $controllerName = 'order';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [OrderController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        // Route::get('/{status}/{id}',[OrderController::class, 'status'])   ->name($controllerName.'.status')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::put('/{id}', [OrderController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::get('/{id}/edit', [OrderController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::delete('/{id}', [OrderController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [OrderController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
    });

    //=============================== evaluate ===============================
    $prefix         = 'evaluate';
    $controllerName = 'evaluate';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [EvaluateController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::delete('/{product_id}', [EvaluateController::class, 'destroys'])       ->name($controllerName.'.destroys')->where('product_id','[0-9]+')->middleware('can:delete-'.$controllerName);
        Route::delete('/{id}', [EvaluateController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);

        Route::get('/{id}', [EvaluateController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
    });
    //=============================== permission ===============================
    $prefix         = 'permission';
    $controllerName = 'permission';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [PermissionController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/{status}/{id}',[PermissionController::class, 'status'])->name($controllerName.'.status')->whereNumber('id')->middleware('can:list-'.$controllerName);
        Route::get('/create', [PermissionController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [PermissionController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [PermissionController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::delete('/{id}', [PermissionController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [PermissionController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [PermissionController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);
    });
    //=============================== role ===============================
    $prefix         = 'role';
    $controllerName = 'role';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [RoleController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/{status}/{id}',[RoleController::class, 'status'])->name($controllerName.'.status')->whereNumber('id')->middleware('can:list-'.$controllerName);
        Route::get('/create', [RoleController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [RoleController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [RoleController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::delete('/{id}', [RoleController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [RoleController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [RoleController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);
    });
    //=============================== user ===============================
    $prefix         = 'user';
    $controllerName = 'user';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        Route::get('/', [UserController::class, 'index'])                ->name($controllerName.'.index')->middleware('can:list-'.$controllerName);
        Route::get('/{status}/{id}',[UserController::class, 'status'])->name($controllerName.'.status')->whereNumber('id')->middleware('can:list-'.$controllerName);
        Route::get('/create', [UserController::class, 'create'])         ->name($controllerName.'.create')->middleware('can:add-'.$controllerName);
        Route::post('/', [UserController::class, 'store'])               ->name($controllerName.'.store')->middleware('can:add-'.$controllerName);
        Route::put('/{id}', [UserController::class, 'update'])           ->name($controllerName.'.update')->whereNumber('id')->middleware('can:edit-'.$controllerName);
        Route::delete('/{id}', [UserController::class, 'destroy'])       ->name($controllerName.'.destroy')->whereNumber('id')->middleware('can:delete-'.$controllerName);
        Route::get('/{id}', [UserController::class, 'show'])             ->name($controllerName.'.show')->whereNumber('id')->middleware('can:show-'.$controllerName);
        Route::get('/{id}/edit', [UserController::class, 'edit'])        ->name($controllerName.'.edit')->whereNumber('id')->middleware('can:edit-'.$controllerName);
    });
});

// Frontend
Route::group(['namespace' => 'Frontend'], function () {
    // Route::get('/', [HomeController::class, 'index'])->name('home.index');
    // Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    // Route::get('/trang-chu', [HomeController::class, 'index'])->name('home.index');

    Route::get('/search', [HomeController::class, 'search'])->name('search');
    // cách 1

    // Route::get('/home', [FCategoryController::class, 'index'])->name('home.index');
    // Route::get('/trang-chu', [FCategoryController::class, 'index'])->name('home.index');
    Route::get('/', [FCategoryController::class, 'index'])->name('home.index');


    Route::get('/cart',[FCategoryController::class, 'cart'])->name('cart.index');
    Route::post('/add-to-cat/{id}', [FCategoryController::class, 'addToCart'])->whereNumber('id')->name('add-to-cart');
    Route::post('/update-cart/{id}/{calculate}',[FCategoryController::class, 'updatedCart'])->whereNumber('id')->name('updated-cart');
    Route::post('/delete-cart/{id}',[FCategoryController::class, 'deleteCart'])->whereNumber('id')->name('delete-cart');
    Route::post('/payment',[FCategoryController::class, 'payment'])->name('payment');
    Route::post('/evaluate',[FCategoryController::class, 'addEvaluate'])->name('evaluate.create'); 

    Route::get('/tin-tuc',[FCategoryController::class, 'post'])->name('post.index');

    Route::get('/may-in',[FCategoryController::class, 'printer'])->name('printer.index');
    Route::get('/muc-in',[FCategoryController::class, 'printingInk'])->name('printingInk.index');
    Route::get('/man-hinh-may-tinh',[FCategoryController::class, 'computerScreen'])->name('computerScreen.index');
    Route::get('/may-tinh-de-ban',[FCategoryController::class, 'desktop'])->name('desktop.index');    

    Route::get('/{category_slug}', [FCategoryController::class,'index'])->name('home.category.index');
    Route::get('/{category_slug}/{product_slug}', [FCategoryController::class,'detail'])->name('home.product.detail'); 
    // cách 2
    // Route::get('/dien-thoai',[HomeController::class,'mobile'])->name('dien-thoai.index');
    // Route::get('/dien-thoai/{slug}',[HomeController::class,'mobileDetail'])->name('dien-thoai.detail');

    // Route::get('/laptop',[HomeController::class, 'laptop'])->name('laptop.index');
    // Route::get('/laptop/{slug}',[HomeController::class, 'laptopDetail'])->name('laptop.detail');

    // Route::get('/tablet',[HomeController::class,'tablet'])->name('tablet.index');
    // Route::get('/tablet/{slug}',[HomeController::class,'tabletDetail'])->name('tablet.detail');

    // Route::get('/phu-kien',[HomeController::class, 'accessories'])->name('phu-kien.index');
    // Route::get('/phu-kien/{slug}',[HomeController::class, 'accessoriesDetail'])->name('phu-kien.detail');

    // Route::get('/dong-ho-thoi-trang',[HomeController::class,'watch'])->name('dong-ho-thoi-trang.index');
    // Route::get('/dong-ho-thoi-trang/{slug}',[HomeController::class,'watchDetail'])->name('dong-ho-thoi-trang.detail');

    // Route::get('/dong-ho-thong-minh',[HomeController::class, 'watch'])->name('dong-ho-thong-minh.index');
    // Route::get('/dong-ho-thong-minh/{slug}',[HomeController::class, 'watchDetail'])->name('dong-ho-thong-minh.detail');

    // Route::get('/pc-may-in',[HomeController::class,'mobile'])->name('pc-may-in.index');
    // Route::get('/may-cu-gia-re',[HomeController::class, 'laptop'])->name('may-cu-gia-re.index');
    // Route::get('/sim-the-cao',[HomeController::class,'mobile'])->name('sim-the-cao.index');
    // Route::get('/tra-gop-dien-nuoc',[HomeController::class, 'laptop'])->name('tra-gop-dien-nuoc.index');

    // Route::get('/cart',[HomeController::class, 'cart'])->name('cart.index');
    // Route::post('/add-to-cat/{id}', [HomeController::class, 'addToCart'])->name('add-to-cart');

    // Route::post('/update-cart/{id}/{calculate}',[HomeController::class, 'updatedCart'])->name('updated-cart');
    // Route::post('/delete-cart/{id}',[HomeController::class, 'deleteCart'])->name('delete-cart');
    // Route::post('/payment',[HomeController::class, 'payment'])->name('payment');

    // Route::post('/evaluate',[HomeController::class, 'addEvaluate'])->name('evaluate.create');
    
    
    
    
    
});