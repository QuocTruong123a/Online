<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Traits\StorageImageTrait;

class SliderController extends Controller
{

    private $slider;
    use StorageImageTrait;
    public function __construct( slider $slider)
    {
        $this -> slider = $slider;
     
    }
    // private $test;
    // public function _construct( Test $test){
    //   $this -> test = $test;
    // }
    public function list(){
        $slider = $this ->slider->paginate(5);
        return view('Admins.slider.list',compact('slider'));
    }
    public function create(){
        return view('Admins.slider.add');
    }
    public function store(Request $request){
        $data = [
            'name' => $request -> name,
            'description' => $request -> description, 
        ];
        $datauploadImage = $this -> storageTraitUpload($request,'image_path','slider');
        if(!empty( $datauploadImage)){
           
            $data['image_name']=$datauploadImage['file_name'];
            $data['image_path']=$datauploadImage['file_path'];
         }   
       $this -> slider -> create($data);
      return redirect('admin/slider/create');
    }
   public function edit($id){
    $slider = $this -> slider -> find($id);
    return view('Admins.slider.edit',compact('slider'));
   }
   public function update($id,Request $request){
    $data = [
        'name' => $request -> name,
        'description' => $request -> description, 
    ];
    $datauploadImage = $this -> storageTraitUpload($request,'image_path','slider');
    if(!empty( $datauploadImage)){
       
        $data['image_name']=$datauploadImage['file_name'];
        $data['image_path']=$datauploadImage['file_path'];
     }   
   $this -> slider -> find($id) -> update($data);
  return redirect('admin/slider/list');
   }
   public function delete($id){

     $this -> slider-> find($id)->delete();
     return response()->json([
         'code' => 200,
         'message' => 'success'
     ],200);
    
 }
}
