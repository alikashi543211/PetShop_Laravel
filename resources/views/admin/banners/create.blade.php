@extends('admin.layouts.master')
@section('title')
Create Banner
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Add Banner</h1>
                  <small>Add Banners</small>
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
                              <a class="btn btn-add " href="{{route('banner.index')}}"> 
                              <i class="fa fa-list"></i>  View Banners </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
                           	@csrf
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Banner Name" name="name" id="name" required>
                              </div>
                              <div class="form-group">
                                 <label>Text-Style</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Text Style" name="text_style" id="name" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Sort Order</label>
                                 <input type="text" class="form-control @error('url') is-invalid @enderror" placeholder="Enter Sort Order" name="sort_order" id="url" required>
                              </div>
                              <div class="form-group">
                                 <label>Content</label>
                                 <textarea name="content" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Content" required></textarea>
                              </div>
                              <div class="form-group">
                                 <label>Link</label>
                                 <input type="text" class="form-control @error('url') is-invalid @enderror" placeholder="Enter Link" name="link" id="url" required>
                              </div>
                              <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image">

                     </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Banner">
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