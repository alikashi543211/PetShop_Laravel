@extends('admin.layouts.master')
@section('title')
Add Attributes
@endsection

@section('mycss')
<style type="text/css">
   .my-allign{
      text-align:center;
   }
</style>
@endsection

@section('myscript')
<script type="text/javascript">
   $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="display:flex;margin-top:10px;" class="form-group"><input style="width:120px;margin-left:10px;" class="form-control" type="text" name="sku[]" placeholder="SKU" value="" />  <input style="width:120px;margin-left:10px;" class="form-control" type="text" name="size[]" placeholder="Size" value="" /> <input style="width:120px;margin-left:10px;" class="form-control" type="text" name="price[]" placeholder="Price" value="" /> <input style="width:120px;margin-left:10px;" class="form-control" type="text" name="stock[]" placeholder="Stock" value="" /><a href="javascript:void(0);" class="remove_button btn btn-default" style="margin-left:10px;"><img src="{{asset('images/remove.png')}}" title="Remove" height="18" width="20"></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
         }
      });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
     e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
     });
 });
</script>
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
         <h1>Add Attributes</h1>
         <small>Add Attributes</small>
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
                     <form class="col-sm-6" method="POST" action="{{route('product.add_attributes',$product->id)}}" enctype="multipart/form-data">
                       @csrf

                       <div class="form-group">
                        <label>Product Name</label> {{$product->name}}
                     </div>
                     <div class="form-group">
                        <label>Product Code</label> {{$product->code}}
                     </div>
                     <div class="form-group">
                        <label>Product Color</label> {{$product->color}}
                     </div>
                     <div class="form-group">
                        <div class="field_wrapper">
                         <div style="display:flex;">
                          <input type="text" name="sku[]" placeholder="SKU" id="sku" style="width: 120px;margin-left:10px;" class="form-control" value=""/>
                          <input type="text" name="size[]" placeholder="Size" id="sku" style="width: 120px;margin-left:10px;" class="form-control" value=""/>
                          <input type="text" name="price[]" placeholder="Price" id="sku" style="width: 120px;margin-left:10px;" class="form-control" value=""/>
                          <input type="text" name="stock[]" placeholder="Stock" id="sku" style="width: 120px;margin-left:10px;" class="form-control" value=""/>
                          <a style="margin-left:10px;" href="javascript:void(0);" class="add_button btn btn-default" title="Add"><img src="{{asset('images/add.png')}}" title="Add" height="18" width="20"></a>
                       </div>
                    </div>

                 </div>
                 <div class="reset-button">

                  <input type="submit" class="btn btn-success" value="Add Attributes">
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
                        <h4>View Attributes</h4>
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
                  @if(!$attributes->isEmpty())
                  <form method="POST" action="{{route('product.update_attributes',$product->id)}}">
                     @csrf
                  <div class="table-responsive">
                     <table id="table_id" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr class="info">
                              <th>ID</th>
                              <th>SKU</th>
                              <th>Size</th>
                              <th>Price</th>
                              <th>Stock</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                         @foreach($attributes as $attribute)
                         <tr>
                           <td>{{$loop->iteration}}</td>
                           <td class="text-center"><input class="my-allign" type="" name="sku[]" value="{{$attribute->sku}}"></td>
                           <td><input class="my-allign" type="text" name="size[]" value="{{$attribute->size}}"></td>
                           <td><input class="my-allign" type="text" name="price[]" value="{{$attribute->price}}"></td>
                           <td><input class="my-allign" type="text" name="stock[]" value="{{$attribute->stock}}"></td>
                           <td>
                              <div style="display:flex;">
                                 <input class="btn btn-success btn-sm" type="submit" title="Update Product" value="Update">
              <a title="Delete Attribute" href="{{route('product.delete_attribute',$attribute->id)}}"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button></a>
                              </div>
                             
                          </td>
                       </tr>
                       @endforeach
                    </tbody>
                 </table>
              </div>
              </form>
              @else
              <p class="text-center alert alert-info">No Attributes Found</p>
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