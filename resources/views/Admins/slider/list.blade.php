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
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình Ảnh</th> 
                            </tr>
                            </thead>
                            <tbody>     
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td><img class="produtct_image_150 " src="" alt=""/></td>   
                                    <td></td>
                                    <td> 
                                         <a href=""
                                               class="btn btn-default">Edit</a>  
                                        <a href=""
                                            data-url=""
                                               class="btn btn-danger action_delete">Delete</a> 
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                       
                    </div>
                
                </div>
            </div>
        </div>
</div>      
@endsection