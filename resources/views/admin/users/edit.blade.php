@extends('admin.layouts.master')
@section('title')
Edit user
@endsection



@section('mycss')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection


@section('myscript')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection



@section('content')
 <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Edit user</h1>
                  <small>Edit users</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     @includeif('partials.message')
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{route('user.index')}}"> 
                              <i class="fa fa-list"></i>  View users </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-8" method="POST" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                              @csrf
                              @method("PUT")
                              <div class="form-group">
                                 <label>Full Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Full Name" name="name" value="{{$user->name}}" id="name" required>
                              </div>
                              <div class="form-group">
                                 <label>Email</label>
                                <input type="text" value="{{$user->email}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Email" name="email" id="name" required>
                              </div>
                           <div class="row">
                               <div style="margin-left:12px;" class="form-group">
                              <label >Assign Roles</label>
                           </div>
                               @foreach($roles as $role)
                              <div class="col-lg-3" style="margin-left:5px;">
                                 
                    <input type="checkbox" name="role[]" @if($user->roles->pluck('id')->contains($role->id)) checked @endif value="{{$role->id}}">  {{$role->name}}
                  
                  </div>
                  @endforeach      
                           </div>
                           
                            
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Update user">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection

@section('myscript')

@endsection