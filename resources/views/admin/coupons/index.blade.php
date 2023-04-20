@extends('admin.layouts.master')
@section('title')
All Coupons
@endsection


@section('mycss')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection


@section('myscript')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript">
         $(document).ready( function () {
            $(".coupon_status").change(function(){ // yahaan pr class select ho gi checkbox me jo di hui he.
               var id=$(this).attr('rel'); // yahaan pr id pick ho gi product ki. rel se
               if($(this).prop("checked")==true){
                  $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: 'post',
                     url: "{{route('coupon.change_status')}}",
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
                     url: "{{route('coupon.change_status')}}",
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
      </script>
@endsection


@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-gift"></i>
               </div>
               <div class="header-title">
                  <h1>Coupons</h1>
                  <small>Coupon List</small>
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
                                 <h4>All Coupons</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{route('coupon.create')}}"> <i class="fa fa-plus"></i> Add Coupon
                                 </a>  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           @if(!$coupons->isEmpty())
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sr</th>
                                       <th>Coupon Code</th>
                                        <th>Amount</th>
                                       <th>Amount Type</th>
                                       <th>Expiry Date (YYYY-MM-DD)</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @foreach($coupons as $coupon)
                                    <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$coupon->coupen_code}}</td>
                                         <td>
                                          {{$coupon->amount}}  @if($coupon->amount_type=='Percentage') % @else PKR @endif</td>
                                       <td>{{$coupon->amount_type}}</td>
                                        <td>{{$coupon->expiry_date}}</td>
                                       <td><input type="checkbox" class="coupon_status" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" rel="{{$coupon->id}}" data-offstyle="danger" @if($coupon->status=='1') checked @endif></td>
                                       <td>
                                          <a href="{{route('coupon.edit',$coupon->id)}}"><button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button></a>
                                    <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('form-delete{{$coupon->id}}').submit();"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button></a>
                                 <form id="form-delete{{$coupon->id}}" action="{{ route('coupon.destroy',$coupon->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                           @else
                           <p class="text-center alert alert-info">No Record Found</p>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
@endsection