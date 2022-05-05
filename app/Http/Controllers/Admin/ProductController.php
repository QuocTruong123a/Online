<?php

namespace App\Http\Controllers\Admin;

use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag; 
use App\Traits\StorageImageTrait;
use App\Traits\DeleteModelTrait;
use Exception;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category, Product $product, ProductImage $productImage,Tag $tag,ProductTag $productTag)
    {
        $this -> category = $category;
        $this -> product = $product;
        $this -> productImage = $productImage;
        $this -> tag = $tag;
        $this -> productTag = $productTag;
    }
    public function getCategory($parent_id){
        $data = $this -> category -> all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
      }
    public function list(){
         $product = $this ->product->paginate(5);
        return view('Admins.product.list',compact('product'));
    }
    public function create(){
        $htmlOption = $this -> getCategory($parent_id ='');
        return view ('Admins.product.add',compact('htmlOption'));
    }

    //them san pham
    public function store(Request $request){
        
        $this->validate($request, [
            'name' => 'required',  
        ],[
            'name.required'=>'Chưa nhập tên sản phẩm',   
        ]);
          $dataUploadCreate=[
              'name' => $request -> name,
              'price' => $request -> price,
              'content' => $request -> content,
            
              'category_id' => $request -> category_id
          ];
          $dataUpload = $this ->storageTraitUpload($request,'feature_image_path','product');
         
              
          if(!empty($dataUpload)){
            $dataUploadCreate['feature_image_path']=$dataUpload['file_path'];
            $dataUploadCreate['feature_image_name']=$dataUpload['file_name'];
        }
         
          $product = $this ->product -> create($dataUploadCreate);
        if($request -> hasfile('image_path')){
            foreach($request -> image_path as $fileItem){
                $dataProductImage = $this -> storageTraitUploadMutiple($fileItem,'product');
                $product->images()->create([
                    'image_path' =>$dataProductImage['file_path'] 
                ]);
            }
         
        }
           foreach($request -> tags as $tagItem){
               $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
               $tagIds[]=$tagInstance ->id;
           }
           $product -> tags()->attach($tagIds);
           return redirect('admin/product/create');
      }
      public function edit($id){
          $product = $this -> product -> find($id);
          $htmlOption = $this -> getCategory($product -> category_id);
          return view('Admins.product.edit',compact('htmlOption','product'));
      }
      // sua san pham
      public function update(Request $request,$id){
        $dataUploadproduct=[
            'name' => $request -> name,
            'price' => $request -> price,
            'content' => $request -> content,
            'category_id' => $request -> category_id
        ];
        $dataUpload = $this ->storageTraitUpload($request,'feature_image_path','product');
        if(!empty($dataUpload)){
            $dataUploadproduct['feature_image_path']=$dataUpload['file_path'];
            $dataUploadproduct['feature_image_name']=$dataUpload['file_name'];
        }
        
        $this ->product ->find($id)-> update($dataUploadproduct);
        $product = $this -> product-> find($id);
        if($request -> hasfile('image_path')){
            $this ->productImage->where('product_id',$id)->delete();
            foreach($request -> image_path as $fileItem){
                $dataProductImage = $this -> storageTraitUploadMutiple($fileItem,'product');
                $product->images()->create([
                    'image_path' =>$dataProductImage['file_path']
                  
                ]);
            }
        
    
        }
        $tagIds=[];
        if(!empty($request -> tags)){
            foreach($request -> tags as $tagItem){
                $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
                $tagIds[]=$tagInstance ->id;
            }
            
        }
        $product -> tags()->sync($tagIds);
           
         
        return redirect('admin/product/list');
      }
      // xoa san pham
      public function delete($id){
        //   $products = $this -> product -> find($id);
        //   $this -> deleteModelTrait($id,$products);
        //   return redirect('admin/product/list');
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
    

