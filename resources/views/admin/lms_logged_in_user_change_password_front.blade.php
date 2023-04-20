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
                  <i class="fa fa-lock"></i>
               </div>
               <div class="header-title">
                  <h1>Change Password</h1>
                  <small>change your password here..</small>
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
                              <i class="fa fa-list"></i>  Change Password </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="POST" action="{{route('lms_logged_in_user_change_password_post')}}" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="logged_in_user_id" value="{{Auth::user()->id}}">
                               <div class="form-group">
                                 <label>Old Password </label>
                                 <input type="password" class="form-control @error('name') is-invalid @enderror" placeholder="*********" name="old_password" id="name" required>
                              </div>
                              <div class="form-group">
                                 <label>New Password</label>
                                 <input type="password" class="form-control @error('name') is-invalid @enderror" placeholder="*********" name="new_password" id="name" required>
                              </div>
                                    <div class="form-group">
                                 <label>Confirm Password</label>
                                 <input type="password"  class="form-control @error('name') is-invalid @enderror"  placeholder="*********" name="email" id="confirm_password" required>
                              </div>
                                    
                                
                                    
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Update">
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