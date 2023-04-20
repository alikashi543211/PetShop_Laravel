@extends('admin.layouts.master')
@section('title')
Edit Banner
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
                  <h1>Edit Banner</h1>
                  <small>Edit Banners</small>
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
                           <form class="col-sm-6" method="POST" action="{{route('banner.update',$banner->id)}}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Banner Name" name="name" id="name" value="{{$banner->name}}" required>
                              </div>
                              <div class="form-group">
                                 <label>Text-Style</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Text Style" name="text_style" id="name" value="{{$banner->text_style}}" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Sort Order</label>
                                 <input type="text" class="form-control @error('url') is-invalid @enderror" placeholder="Enter Sort Order" name="sort_order" value="{{$banner->sort_order}}" id="url" required>
                              </div>
                              <div class="form-group">
                                 <label>Content</label>
                                 <textarea name="content" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Content" value="{{$banner->content}}" required>{{$banner->content}}</textarea>
                              </div>
                              <div class="form-group">
                                 <label>Link</label>
                                 <input type="text" class="form-control @error('url') is-invalid @enderror" value="{{$banner->link}}" placeholder="Enter Link" name="link" id="url" required>
                              </div>
                              <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image">
                        <input type="hidden" name="current_image" value="{{$banner->image}}"><br>
                                 <img src="{{asset('uploads/banners/'.$banner->image)}}" height="100" width="100" class="img-fluid" alt="No Image">
                                 @if($banner->image!='dummy.png')
                                     &nbsp;&nbsp;&nbsp;<a class="btn btn-danger btn-sm" href="{{route('banner.delete_banner_image',$banner->id)}}">Delete</a>
                                  @endif
                     </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Update Banner">
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