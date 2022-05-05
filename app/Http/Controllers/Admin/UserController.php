<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
        $this -> user = $user;
        $this -> role = $role;
    }
    public function list(){
        $user = $this -> user ->paginate(8);
        return view('Admins.user.list',compact('user'));
    }
    public function create(){
        $role = $this ->role -> all();
        return view('Admins.user.add',compact('role'));
    }
    public function store(Request $request){
        $user = $this -> user -> create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password)
        ]);
        $roleIds = $request ->role_id;
        $user ->roles()->attach($request ->role_id);
        return redirect('admin/user/list');
    }
    public function edit($id){
        $user = $this -> user -> find($id);
        $roles = $this -> role -> all();
        $rolesofuser = $user -> roles;
        return view('Admins.user.edit',compact('user','roles','rolesofuser'));
    }
    public function update(Request $request,$id){
         $this -> user -> find($id) -> update([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password)
        ]);
        $user = $this -> user -> find($id);
    
        $user ->roles()->sync($request ->role_id);
        return redirect('admin/user/list');
    }
    public function delete($id){
        $this -> user ->find($id) -> delete();
        
        return redirect('admin/user/list') ;
    }
}
