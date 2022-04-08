<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $ID_Admin = Session::get('ID_Admin');
        if($ID_Admin){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $Email_Admin = $request->Email_Admin;
        $Password_Admin = md5($request->Password_Admin);

        $result = DB::table('admin')->where('Email_Admin',$Email_Admin)->where('Password_Admin',$Password_Admin)->first();
        if($result){
            Session::put('Name_Admin',$result->Name_Admin);
            Session::put('ID_Admin',$result->ID_Admin);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
            return Redirect::to('/admin');
        }

    }
    public function logout(){
        $this->AuthLogin();
        Session::put('Name_Admin',null);
        Session::put('ID_Admin',null);
        return Redirect::to('/admin');
    }
}
