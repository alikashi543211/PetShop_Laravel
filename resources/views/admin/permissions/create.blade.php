@extends('admin.layouts.master')
@section('title')
Create permission
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
                  <h1>Add permission</h1>
                  <small>Add permissions</small>
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
                              <a class="btn btn-add " href="{{route('permission.index')}}"> 
                              <i class="fa fa-list"></i>  View permissions </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="POST" action="{{route('permission.store')}}" enctype="multipart/form-data">
                           	@csrf
                              <div class="form-group">
                                 <label>Permission Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="i.e Create Post, Update Post etc..." name="name" id="name" required>
                              </div>

                              <div class="form-group">
                                 <?php $lables=array('Coupon','Banner','Category','Permission','Role','User','Product','Other');
                               ?>
                                 <label for="for">Permission For</label>
    <select name="for" id="for" class="form-control">
      <option selected disable>Select Permission for</option>
      <?php foreach($lables as $lable):  ?>
      <option value="{{strtolower($lable)}}">{{$lable}}</option>
   <?php endforeach; ?>
    </select>
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add permission">
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