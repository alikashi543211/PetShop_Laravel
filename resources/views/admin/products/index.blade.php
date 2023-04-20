@extends('admin.layouts.master')
@section('title')
All Products
@endsection

@section('mycss')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('myscript')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript">
         $(document).ready( function () {
            $(".product_status").change(function(){ // yahaan pr class select ho gi checkbox me jo di hui he.
               var id=$(this).attr('rel'); // yahaan pr id pick ho gi product ki. rel se
               if($(this).prop("checked")==true){
                  $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: 'post',
                     url: "{{route('product.change_status')}}",
                     data: {status:'1',id:id},
                     success:function(resp){
                        $(".msgSuccess").show();
                        setTimeout(function() { $(".msgSuccess").fadeOut('slow'); }, 2000);
                     },error:function(){
                        alert('Error');
                     }
                  });
               }else
               {
                   $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: 'post',
                     url: "{{route('product.change_status')}}",
                     data: {status:'0',id:id},
                     success:function(resp){
                        $(".msgError").show();
                        setTimeout(function() { $(".msgError").fadeOut('slow'); }, 2000);
                     },error:function(){
                        alert('Error');
                     }
                  });
               } 
            });
         });


         // ---------------------------Featured Products K Status K Lye-----------------------------
                  $(document).ready( function () {
            $(".featured_products").change(function(){ // yahaan pr class select ho gi checkbox me jo di hui he.
               var id=$(this).attr('rel'); // yahaan pr id pick ho gi product ki. rel se
               if($(this).prop("checked")==true){
                  $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: 'post',
                     url: "{{route('product.change_featured_products')}}",
                     data: {featured_products:'1',id:id},
                     success:function(resp){
                        $(".msgSuccess").show();
                        setTimeout(function() { $(".msgSuccess").fadeOut('slow'); }, 2000);
                     },error:function(){
                        alert('Error');
                     }
                  });
               }else
               {
                   $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: 'post',
                     url: "{{route('product.change_featured_products')}}",
                     data: {featured_products:'0',id:id},
                     success:function(resp){
                        $(".msgError").show();
                        setTimeout(function() { $(".msgError").fadeOut('slow'); }, 2000);
                     },error:function(){
                        alert('Error');
                     }
                  });
               } 
            });
         });

                  
      </script>
@endsection

@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Products</h1>
                  <small>Product List</small>
               </div>
            </section>
<div style="display:none;" class="alert alert-sm alert-success msgSuccess">Status Enabled</div>
<div  style="display:none;" class="alert alert-sm alert-danger msgError">Status Disabled</div>
       @includeif('partials.message')
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>All Products</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        {{-- Kashif-> yahaan pr me isAllowed k gate ko call kr raha hoon. or saath me arguments b pass kr raha hoon.--}}
                        @can("isAllowed",$products)
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{route('product.create')}}"> <i class="fa fa-plus"></i> Add Product
                                 </a>  
                              </div>
                              
                             
                           </div>
                           @endcan
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           @if(!$products->isEmpty())
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Category</th>
                                      
                                       <th>Image</th>
                                       <th>Price</th>
                                       <th>Stock Qty</th>
                                       <th>Sold Qty</th>
                                       
                                       <th>Featured</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @foreach($products as $product)
                                    <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$product->name}}</td>
                                       <td>{{$product->category->name ?? 'N/A'}}</td>
                                   
                                       <td><img src="{{asset('uploads/products/'.$product->image)}}" alt="No Image" class="img-fluid" width="100" height="100"></td>
                                       <td>{{$product->price}}</td>
                                        <td>{{$product->stock_in}}</td>
                                       <td>{{$product->stock_out}}</td>
                                        
                                       <td title="change featured status">
                                          <input type="checkbox" class="featured_products" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" rel="{{$product->id}}" data-offstyle="danger" @if($product->featured_products=='1') checked @endif>
                                       </td>
                                       <td title="change status"><input type="checkbox" class="product_status" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" rel="{{$product->id}}" data-offstyle="danger" @if($product->status=='1') checked @endif></td>
                                       <td>
                                          <div style="display:flex;">
                                             <a href="#"><button type="button" title="View Detail" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{$product->id}}"><i class="fa fa-info-circle"></i></button></a>
                                             <a href="{{route('product.add_images',$product->id)}}"><button type="button" title="Add Images" class="btn btn-info btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-image"></i></button></a>
                                             <a href="{{route('product.add_attributes',$product->id)}}"><button type="button" title="Add Attributes" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-list"></i></button></a>
                                          <a title="Edit Product" href="{{route('product.edit',$product->id)}}"><button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button></a>
                                          <a title="Delete Product" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form{{$product->id}}').submit();"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button></a>
                                          </div>
                                                     <form id="delete-form{{$product->id}}" action="{{ route('product.destroy',$product->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                       </td>
                                    </tr>
                                    <!-- Modal -->
  <div class="modal fade" id="myModal{{$product->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{$product->name}} Full Details</h4>
        </div>
        <div class="modal-body">
          <p>Product No: {{$product->id}} </p>
          <p>Category: {{$product->category->name ?? 'N/A'}} </p>
          <p>Product Code: {{$product->code}} </p>
          <p>Product Color: {{$product->color}} </p>
          <p>Product Price: {{$product->price}} </p>
          <p>Description: {{$product->description}} </p>
          <p>Material & Care: {{$product->care}} </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                           @else
                           <p class="text-center alert alert-info">No Products Found</p>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
@endsection
