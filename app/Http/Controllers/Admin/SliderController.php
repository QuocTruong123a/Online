<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

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
       
        return view('Admins.slider.list');
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
    public function delete($id){
        try{
         $this -> product -> find($id)->delete();
         return response()->json([
             'code' => 200,
             'message' => 'success'
         ],200);
        }catch(Exception $exception){
          Log::error('Message:'.$exception->getMessage().'--- Line:' .$exception->getLine());
          return response()->json([
              'code' => 500,
              'message' => 'fail'
          ],500);
        }
     }
}
