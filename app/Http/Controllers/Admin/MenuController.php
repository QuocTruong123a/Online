<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\menu;
use Illuminate\Http\Request;
use App\Components\MenuRecusive;
class MenuController extends Controller
{
   
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive,Menu $menu)
    {
        $this -> menuRecusive = $menuRecusive;
        $this -> menu = $menu;
    }
    public function list(){
        $menus = $this -> menu ->paginate(6);
        return view('Admins.menu.list',compact('menus'));
    }
    public function create(){
        $optionSelect = $this -> menuRecusive -> menuRecusiveAdd();
        return view('Admins.menu.add',compact('optionSelect'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',  
        ],[
            'name.required'=>'Chưa nhập tên menu',   
        ]);
        $this -> menu ->create([
              'name' => $request -> name,
              'parent_id' => $request -> parent_id
        ]);
        return redirect('admin/menu/create');
    }
    public function edit(Request $request,$id){
        $menuFollowIdEdit = $this -> menu -> find($id);
        $optionSelect = $this -> menuRecusive -> menuRecusiveAdd($menuFollowIdEdit->parent_id);
        return view('Admins.menu.edit',compact('optionSelect','menuFollowIdEdit'));
    }
    public function update($id, Request $request){
        $this -> menu -> find($id) ->update([
            'name' => $request -> name,
            'parent_id' => $request -> parent_id
        ]);
        return redirect('admin/menu/list') ;
    }
    public function delete($id){
        $this -> menu->find($id)->delete();
        return redirect('admin/menu/list') ;
      }

}
