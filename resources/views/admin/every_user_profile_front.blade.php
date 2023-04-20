@extends('admin.layouts.master')
@section('title')
Update Profile
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-user-o"></i>
               </div>
               <div class="header-title">
                  <h1>Profile</h1>
                  <small>View and Update your Profile</small>
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
                              <a class="btn btn-add " href="#"> 
                              <i class="fa fa-list"></i>  Profile </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="POST" action="{{route('lms_update_logged_in_user_profile_post')}}" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="logged_in_user_id" value="{{Auth::user()->id}}">
                       
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" value="{{Auth::user()->email}}" class="form-control @error('name') is-invalid @enderror"  placeholder="Enter Username" name="email" id="name" required>
                              </div>
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" value="{{Auth::user()->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" name="name" id="name" required>
                              </div>
                                    
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Update Profile">
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