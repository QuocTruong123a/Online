<?php

namespace App\Http\Controllers\Admin;

use App\Components\Recusive;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this -> htmlSlelect='';
        $this -> category = $category;
    }
    public function getCategory($parent_id){
        $data = $this -> category -> all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
      }
    public function create(){
        $category = $this -> category -> all();
        $htmlOption = $this -> getCategory( $parent_id ="") ; 
        return view('Admins.Category.add',compact('htmlOption'));
    }
    public function store(Request $request){
        $this->validate($request, [
          'name' => 'required',  
      ],[
          'name.required'=>'Chưa nhập danh mục',   
      ]);
          $this -> category -> create([
              'name' => $request -> name,
              'parent_id' => $request -> parent_id,
              
          ]);
          return redirect('admin/categories/create') ;
      }
      public function list(){
        $categories = $this -> category  -> paginate(5);
          return view('Admins.Category.list',compact('categories'));
      }
      public function edit($id){
          $category = $this -> category -> find($id);
          $htmlOption = $this -> getCategory( $parent_id ="") ; 
          return view ('Admins.Category.edit',compact('category','htmlOption'));
      }
      public function update($id,Request $request){
        $this -> category ->find($id)->update([
          'name' => $request -> name,
          'parent_id' => $request -> parent_id
        ]);
        return redirect('admin/categories/list') ;
        }
      public function delete($id){
          $this -> category ->find($id) -> delete();
          return redirect('admin/categories/list') ;
      }
}
