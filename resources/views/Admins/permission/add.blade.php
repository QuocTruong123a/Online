@extends('Admins.Main')
@section('Content')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm permission</h3>
              </div>
              @include('alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('admin/permission/store')}}" method="post">
                  @csrf
                <div class="card-body">
                 
                  <div class="form-group">
                   
                    <select name="module_parent" class="form-control" >
                    <option value=""> chon ten module</option>
                      @foreach(config('permission.table_module') as $moduleItem)
                            <option value="{{$moduleItem}}"> {{$moduleItem}}</option>
                      @endforeach
                </select>

                </div>
                  <div class="form-group">
                      <div class="row">
                         
                          @foreach(config('permission.module_childrent') as $modulchildrent)
                          <div class="col-md-3">
                          <label for="">
                            <input type="checkbox" name="module_childrent[]" value="{{$modulchildrent}}">
                            {{$modulchildrent}}
                          </label>
                          </div>  
                        @endforeach
                          

                            
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