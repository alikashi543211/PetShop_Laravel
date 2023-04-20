@extends('admin.layouts.master')
@section('title')
All users
@endsection


@section('mycss')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection


@section('myscript')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript">
         $(document).ready( function () {
            $(".user_status").change(function(){ // yahaan pr class select ho gi checkbox me jo di hui he.
               var id=$(this).attr('rel'); // yahaan pr id pick ho gi product ki. rel se
               if($(this).prop("checked")==true){
                  $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: 'post',
                     url: "{{route('product.change_status')}}",
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
                     url: "{{route('product.change_status')}}",
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
                  <i class="fa fa-gift"></i>
               </div>
               <div class="header-title">
                  <h1>users</h1>
                  <small>user List</small>
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
                                 <h4>All users</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{route('user.create')}}"> <i class="fa fa-plus"></i> Add user
                                 </a>  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           @if(!$users->isEmpty())
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sr</th>
                                       <th>Name</th>
                                        <th>Email</th>
                                       <th>Roles</th>
                                      
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @foreach($users as $user)
                                    <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$user->name}}</td>
                                         <td>
                                          {{$user->email}}</td>
                                       <td>@foreach($user->roles->pluck('name') as $role )
                                                {{$role}}@if($loop->iteration!=$loop->last) , @endif
                                          @endforeach
                                       </td>
                                       
                                       <td>
                                          <a href="{{route('user.edit',$user->id)}}"><button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button></a>
                                    <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('form-delete{{$user->id}}').submit();"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button></a>
                                 <form id="form-delete{{$user->id}}" action="{{ route('user.destroy',$user->id) }}" method="POST" style="display: none;">
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