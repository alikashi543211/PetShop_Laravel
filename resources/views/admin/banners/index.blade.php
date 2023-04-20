@extends('admin.layouts.master')
@section('title')
All Products
@endsection


@section('mycss')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection


@section('myscript')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript">
         $(document).ready( function () {
            $(".banner_status").change(function(){ // yahaan pr class select ho gi checkbox me jo di hui he.
               var id=$(this).attr('rel'); // yahaan pr id pick ho gi product ki. rel se
               if($(this).prop("checked")==true){
                  $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: 'post',
                     url: "{{route('banner.change_status')}}",
                     data: {status:'1',id:id},
                     success:function(resp){
                        $(".msgSuccess").show();
                        setTimeout(function() { $(".msgSuccess").fadeOut('slow'); }, 2000);
                     },error:function(){
                        alert('Error');
                     }
                  });
               }else
               {
                   $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: 'post',
                     url: "{{route('banner.change_status')}}",
                     data: {status:'0',id:id},
                     success:function(resp){
                        $(".msgError").show();
                        setTimeout(function() { $(".msgError").fadeOut('slow'); }, 2000);
                     },error:function(){
                        alert('Error');
                     }
                  });
               } 
            });
         });
      </script>
@endsection


@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Banners</h1>
                  <small>Banner List</small>
               </div>
            </section>
<div style="display:none;" class="alert alert-sm alert-success msgSuccess">Status Enabled</div>
<div  style="display:none;" class="alert alert-sm alert-danger msgError">Status Disabled</div>
            @includeif('partials.message')
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>All Banners</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{route('banner.create')}}"> <i class="fa fa-plus"></i> Add Banner
                                 </a>  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           @if(!$banners->isEmpty())
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Text Style</th>
                                       <th>Sort Order</th>
                                       <th>Image</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @foreach($banners as $banner)
                                    <tr>
                                       <td>{{$banner->id}}</td>
                                       <td>{{$banner->name}}</td>
                                       <td>{{$banner->text_style}}</td>
                                       <td>{{$banner->sort_order}}</td>
                                       <td><img src="{{asset('uploads/banners/'.$banner->image)}}" height="100" width="100"></td>
                                       <td><input type="checkbox" class="banner_status" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" rel="{{$banner->id}}" data-offstyle="danger" @if($banner->status=='1') checked @endif></td>
                                       <td>
                                          <a href="{{route('banner.edit',$banner->id)}}"><button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button></a>
                                    <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form{{$banner->id}}').submit();"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button></a>
                                 <form id="delete-form{{$banner->id}}" action="{{ route('banner.destroy',$banner->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                           @else
                           <p class="text-center alert alert-info">No Record Found</p>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
@endsection