@extends('admin.layouts.master')
@section('title')
Edit Category
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-eye"></i>
               </div>
               <div class="header-title">
                  <h1>Add Category</h1>
                  <small>Add Categories</small>
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
                              <a class="btn btn-add " href="{{route('category.index')}}"> 
                              <i class="fa fa-list"></i>  View Categories </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name" name="name" id="name" value="{{$category->name}}" required>
                              </div>
                              <div class="form-group">
                                 <label>Parent Category</label>
                                 <select name="parent_id" class="form-control">
                                    <option value="0">Select Category</option>
                                    @if(!$categories->isEmpty())
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}" @if($cat->id==$category->parent_id) selected @endif >{{$cat->name}}</option>
                                    @endforeach
                                    @endif
                                 </select>
                              </div>
                            
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" required>{{$category->description}}</textarea>
                              </div>
                              <div class="form-group">
                                 <label>Thumbnail</label>
                                 <input type="file" name="thumbnail">
                                 <input type="hidden" name="current_image" value="{{$category->thumbnail}}"><br>
                                 <img src="{{asset('uploads/categories/'.$category->thumbnail)}}" height="100" width="100" class="img-fluid" alt="No Image">
                                 @if($category->thumbnail != 'dummy.png')
                                 &nbsp;&nbsp;&nbsp;<a class="btn btn-danger btn-sm" href="{{route('category.delete_category_thumbnail',$category->id)}}">Delete</a>
                                 @endif
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Update Category">
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