@extends('Admins.Main')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('Content')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm sản phẩm</h3>
              </div>
              @include('alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" id="exampleInputEmail1" >
                  </div>
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh dai dien</label>
                    <input type="file" class="form-control-file" name="feature_image_path" >
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh chi tiet</label>
                    <input type="file" multiple="multiple"  class="form-control-file" name="image_path[]" >
                  </div>
                  <div class="form-group">
                    <label for="menu">Danh mục cha</label>
                    <select name="category_id" class="form-control select2_init">
                    <option value="">Danh Mục Cha </option>
                      {!!$htmlOption!!}
                      <div class="form-group">
                </select>
                </div>
                <div class="form-group">
                <label for="menu">Nhap the cho san pham</label>
                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea row="3" class="form-control "id="mytextarea" name="content"></textarea>
                  </div>
                </div>
                </div> 
                <!-- /.card-body --> 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
              </form>
            </div>
</div>
@endsection
@section('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script >
    $(function(){
      $(".tags_select_choose").select2({
         tags:true,
         tokenSeparators:[',']
  
   });
        $(".select2_init").select2({
            placeholder: "chọn danh mục",
    allowClear: true
   })
    })
</script>
<strong><script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script></strong>
    <script>
      tinymce.init({
        selector: "#mytextarea"
      });
    </script>
@endsection