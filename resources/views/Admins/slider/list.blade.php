@extends('Admins.Main')

@section('Content')
@section('css')
<link rel="stylesheet" href="AdminLTE/css/add.css"/>
@endsection
@section('js')
<script  src="AdminLTE/js/add.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
<div class="content-wrapper">
<div class="content"> 
                <div class="row"> 
                <div class="col-md-12"> 
                            <a href="admin/slider/create" class="btn btn-success float-right m-2">Add</a> 
                    </div>
                    <div class="col-md-12">
                        <table  class="table">
                            <thead>        
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình Ảnh</th> 
                            </tr>
                            </thead>
                            <tbody>  
                                @foreach($slider as $sliders)   
                                <tr>
                                    <th scope="row">{{$sliders -> id}}</th>
                                    <td>{{$sliders -> name}}</td>
                                    <td>{{$sliders -> description}}</td>
                                    <td><img class="produtct_image_150 " src="{{$sliders -> image_path}}" alt=""/></td>   
                                   
                                    <td> 
                                    <a href="{{route('slider.edit',['id' => $sliders -> id])}}"
                                               class="btn btn-default">Edit</a> 
                                            <a href=""
                                            data-url="{{route('slider.delete',['id' => $sliders -> id])}}"
                                               class="btn btn-danger action_delete">Delete</a> 
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        {{$slider -> links('layout.paginationlinks')}}
                    </div>
                
                </div>
            </div>
        </div>
</div>      
@endsection