@extends('admin.layouts.master')
@section('title')
Edit Product
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Product</h1>
                  <small>Edit Product</small>
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
                              <a class="btn btn-add " href="{{route('product.index')}}"> 
                              <i class="fa fa-list"></i>  View Products </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                           	@csrf
                              @method('PUT')
                             
                        <div class="form-group">
                                 <label>Under Category</label>
                                  <select name="category_id" class="form-control">
                           <option value="0" selected disabled>Select Category</option>
                           @if(!$categories->isEmpty())
                           @foreach($categories as $parent_category)
                            <option @if($product->category_id==$parent_category->id) selected @endif value="{{$parent_category->id}}">{{$parent_category->name}}</option>
                           @foreach($parent_category->child_categories as $child_category)
                           <option @if($product->category_id==$child_category->id) selected @endif value="{{$child_category->id}}">{{$child_category->name}}</option>
                           @endforeach
                           @endforeach
                           @endif
                        </select>
                              </div>
                              <div class="form-group">
                                 <label>Product Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Product Name" name="name" id="name" value="{{$product->name}}" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Code</label>
                                 <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Enter Product Code" name="code" id="code" value="{{$product->code}}" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Color</label>
                                 <input type="text" class="form-control @error('color') is-invalid @enderror" placeholder="Enter Product Color" name="color" id="color" value="{{$product->color}}" required>
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Mobile" required>{{$product->description}}</textarea>
                              </div>
                             <div class="form-group">
                        <label>Material & Care</label>
                        <textarea name="care" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description">{{$product->care}}</textarea>
                     </div>
                              <div class="form-group">
                                 <label>Product Price</label>
                                 <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Enter Price" value="{{$product->price}}"  required>
                              </div>
                              <div class="form-group">
                                 <label>Picture upload</label>
                                 <input type="file" name="image">
                                 <input type="hidden" name="current_image" value="{{$product->image}}">
                                 @if($product->image!="")

                                 <br><img src="{{asset('uploads/products/'.$product->image)}}" height="100" width="100" class="img-fluid" alt="No Image">
                                  <a class="btn btn-danger btn-sm" href="{{route('product.delete_product_fimage',$product->id)}}">Delete</a>
                                 @else

                                 <br><a target="_blank" href="{{asset('uploads/products/dummy.png')}}"><img src="{{asset('uploads/products/dummy.png')}}" height="100" width="100" class="img-fluid" alt="No Image"></a>
                                
                                 @endif
                                
                              </div>
                              <div class="clearfix"></div>
                              <div class="reset-button">
                                 
                                 <input type="submit" class="btn btn-success" value="Update Product">
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