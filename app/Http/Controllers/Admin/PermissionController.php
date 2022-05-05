<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function create(){
        return view('Admins.permission.add');
    }
    public function store(Request $request){
        //tao module cha
        $permission = Permission::create([
            'name' => $request -> module_parent,
            'display_name' => $request -> module_parent,
            'parent_id'=> 0,
            'key_code' => ""
        ]);
        //tao module con
        foreach($request -> module_childrent as $value){
            Permission::create([
                'name' => $value,
                'display_name' => $value,
                'parent_id'=> $permission -> id,
                // function_name or name_function
                'key_code' => $request -> module_parent . '_' .$value
            ]);
            return redirect('admin/Home');
        }
    }
}
