<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    private $role;
    private $permission;
  
    public function __construct( Role $role,Permission $permission)
    {
        $this -> role = $role;
        $this -> permission = $permission;
    
    }
    public function list(){
        $role = $this -> role -> paginate(10);
        return view('Admins.role.list',compact('role'));
    }
    public function create(){
        $permissions = $this ->permission->where('parent_id',0)->get();
       
        return view('Admins.role.add',compact('permissions'));
    }
    public function store(Request $request){
        $role = $this -> role -> create([
          'name' => $request -> name,
          'display_name' => $request -> display_name
        ]);
        $role ->permissions()->attach($request -> permission_id);
        return redirect('admin/role/list');
    }
    public function edit($id){
        $permissions = $this ->permission->where('parent_id',0)->get();
        $role = $this -> role -> find($id);
        $permissionchecked = $role ->permissions;
        return view('Admins.role.edit',compact('permissions','role','permissionchecked'));
    }
    public function update(Request $request,$id){
        $role = $this -> role ->find($id);
        $role -> update([
            'name' => $request -> name,
            'display_name' => $request -> display_name
          ]);
          $role ->permissions()->sync($request -> permission_id);
          return redirect('admin/role/list');
    }
}
