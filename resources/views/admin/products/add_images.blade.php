@extends('admin.layouts.master')
@section('title')
Add Images
@endsection

@section('mycss')
<style type="text/css">
   .my-allign{
      text-align:center;
   }
</style>
@endsection

@section('myscript')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <div class="header-icon">
   <i class="fa fa-product-hunt"></i>
 </div>
 <div class="header-title">
   <h1>Add Images</h1>
   <small>Add Images</small>
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
     <form class="col-sm-6" method="POST" action="{{route('product.add_images',$product->id)}}" enctype="multipart/form-data">
       @csrf

       <div class="form-group">
        <label>Product Name</label> {{$product->name}}
      </div>
     {{-- <div class="form-group">
        <label>Product Code</label> {{$product->code}}
      </div>
      <div class="form-group">
        <label>Product Color</label> {{$product->color}}
      </div> --}}
      <div class="form-group">
        <label>Select Images:</label>
        <input type="file" name="image[]" class="form-control" multiple="multiple">
      </div>
      <div class="reset-button">

        <input type="submit" class="btn btn-success" value="Add Images">
      </div>
    </form>
  </div>
</div>
<!-- display record -->
<div class="row">
 <div class="col-sm-12">
  <div class="panel panel-bd lobidrag">
   <div class="panel-heading">
    <div class="btn-group" id="buttonexport">
     <a href="#">
      <h4>View Images</h4>
    </a>
  </div>
</div>
<div class="panel-body">
  <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
  <div class="btn-group">
   <div class="buttonexport" id="buttonlist"> 
    <a class="btn btn-add" href="{{route('product.create')}}"> <i class="fa fa-plus"></i> Add Product
    </a>  
  </div>


</div>
<!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
@if(!$images->isEmpty())
 <div class="table-responsive">
   <table id="table_id" class="table table-bordered table-striped table-hover">
    <thead>
     <tr class="info">
      <th>ID</th>
      <th>Product</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($images as $image)
   <tr>
     <td>{{$loop->iteration}}</td>
     <td>{{$image->product->name}}</td>
     <td class="text-center"><img src="{{asset('uploads/products/'.$image->image)}}" alt="No Image" class="img-fluid" width="100" height="100"></td>
     <td>
      <div style="display:flex;">
       <a title="Delete Attribute" href="{{route('product.delete_product_image',$image->id)}}"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button></a>
     </div>
  </td>
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<p class="text-center alert alert-info">No Images Found</p>
@endif
</div>
</div>
</div>
</div>
</section>
<!-- display record END -->
</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection