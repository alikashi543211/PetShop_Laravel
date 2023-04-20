@extends('admin.layouts.master')
@section('title')
Create Product
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
         <h1>Add Product</h1>
         <small>Add Products</small>
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
                     <form class="col-sm-6" method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                        <label>Under Category</label>
                        <select name="category_id" class="form-control">
                           <option value="" selected disabled>Select Category</option>
                           @if(!$categories->isEmpty())
                           @foreach($categories as $parent_category)
                           <option style="font-weight: bold;" disabled value="{{$parent_category->id}}">{{$parent_category->name}}</option>
                           @foreach($parent_category->child_categories as $child_category)
                           <option value="{{$child_category->id}}">{{$child_category->name}}</option>
                            @if (Session::has("category_id"))
                                        <span class="my_error_design">
                                                            <strong>{{ Session::get("category_id") }}</strong>
                                                        </span>
                                                    @endif
                           @endforeach
                           @endforeach
                           @endif
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Product Name" name="name" id="name">
                         @if ($errors->has('name'))
                                                      <span class="my_error_design">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                  @endif
                     </div>
                     <div style="display:none;" class="form-group">
                        <label>Product Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Enter Product Code" value="no-code" name="code" id="code">
                     </div>

                     <div style="display:none;" class="form-group">
                        <label>Product Color</label>
                        <input type="text" class="form-control @error('color') is-invalid @enderror" placeholder="Enter Product Color" value="no-color" name="color" id="color">
                     </div>
                     <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description"></textarea>
                         @if ($errors->has('description'))
                                                      <span class="my_error_design">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                  @endif
                     </div>
                     <div style="display:none;" class="form-group">
                        <label>Material & Care</label>
                        <textarea name="care" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description">no-material&care</textarea>
                     </div>
                     <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Enter Price">
                         @if ($errors->has('price'))
                                                      <span class="my_error_design">
                                                            <strong>{{ $errors->first('price') }}</strong>
                                                        </span>
                                                  @endif
                     </div>
                        <div class="form-group">
                        <label>Stock Quantity</label>
                        <input type="text" class="form-control @error('stock_in') is-invalid @enderror" name="stock_in" id="stock_in" placeholder="Enter Quantity">
                         @if ($errors->has('stock_in'))
                                                      <span class="my_error_design">
                                                            <strong>{{ $errors->first('stock_in') }}</strong>
                                                        </span>
                                                  @endif
                     </div>
                     <div class="form-group">
                        <label>Picture upload</label>
                        <input type="file" name="image" accept="image/*">
                         @if ($errors->has('image'))
                                                      <span class="my_error_design">
                                                            <strong>{{ $errors->first('image') }}</strong>
                                                        </span>
                                                  @endif
                     </div>
                     <div class="reset-button">

                        <input type="submit" class="btn btn-success" value="Add Product">
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