<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   
    public function index(){
    
        return view ('Admins.login.login');
    }
    public function postlogin(Request $request){
        $remember = $request -> has ('remember_me')?true:false;
        if(auth() -> attempt([
            'email'=>$request->email,
            'password' => $request ->password
        ],$remember)){
            return redirect()->to('admin/Home');
        }
}
}
