@extends('Admins.Main')
@section('Content')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              @include('alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('admin/setting/store')}}" method="post">
              @csrf
              <!-- @if(request()->type==='Text') -->
               <!-- @elseif(request()->type==='Textarea') -->
                  <!-- @endif -->
                <div class="card-body">
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Config key</label>
                    <input type="" class="form-control" name="config_key" id="exampleInputEmail1" placeholder="Config key">
                  </div>
                 
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">config value</label>
                    <textarea type="" class="form-control" name="config_value" id="exampleInputEmail1" placeholder="config value"></textarea>
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