<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    private $pathViewController = 'backend.';
    private $current_page = 'dashboard';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        if(Auth::check()){
            return redirect()->route('page.index');
        }else{
            return view('backend.login');
        }
    }

    public function postLogin(Request $request)
    {
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        $remember = false;
        if($request->remember == 'on'){
            $remember = true;
        }

        if(Auth::attempt($data, $remember)){
            return redirect()->route('page.index');
        }else{
            return back()->withInput()->with('message', __('Tài khoản hoặc mật khẩu chưa đúng. Xin thử lại!'));
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.getLogin');
    }
    
}
