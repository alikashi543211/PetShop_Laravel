@extends('admin.layouts.master')
@section('title')
Dashboard
@endsection
@section('content')
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="header-icon">
                 <i class="fa fa-first-order"></i>
               </div>
               
               <div class="header-title">
                  <h1>Detail Of Order# {{$order->id}} </h1>
                  <small>Detail Of Order# {{$order->id}} </small>
               </div>
            </section>
            @includeif('partials.message')
            <!-- Main content -->
                     <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                         <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{route('admin.order.index')}}}"> 
                             All Users</a>  
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                          
                           <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover mydatatable">
                                 <thead>
                                    <tr class="info">
                                       <th>Order #</th>
                                        <td>{{$order->id}}</td>
                                     </tr>
                                     <tr>
                                      <tr>
                                       <th>Name</th>
                                        <td>{{$order->name}}</td>
                                     </tr>
                                     
                                     <tr>
                                       <th>Email</th>
                                        <td>{{$order->user_email}}</td>
                                     </tr>
                                     <tr>
                                       <th>Address</th>
                                           <td>{{$order->address}}</td>                                     
                                     </tr>
                                     <tr>
                                       <th>City</th>
                                        <td>{{$order->city}}</td>
                                     </tr>
                                      <tr>
                                       <th>State</th>
                                         <td>{{$order->state}}</td>
                                     </tr>
                                      <tr>
                                       <th>Zip</th>
                                         <td>{{$order->zip}}</td>
                                     </tr>
                                      <tr>
                                       <th>Country</th>
                                         <td>{{$order->country}}</td>
                                     </tr>
                                     <tr>
                                     <th>Mobile</th>
                                        <td>{{$order->mobile}}</td>
                                     </tr>
                                       <tr>
                                     <th>Shipping Charges</th>
                                         <td>{{$order->shipping_charges ?? '0'}}</td>
                                     </tr>
                                     <tr>
                                     <th>Coupon Code</th>
                                               <td>@if(!empty($order->coupon_code)) {{$order->coupon_code}} @else {{'N/A'}}  @endif</td>
                                               </tr>
                                     
                                                <tr>
                                     <th>Coupon Amount</th>
                                               <td>{{$order->coupon_amount ?? 'N/A'}}</td>
                                               </tr>
                                                <tr>
                                     <th>Payment Method</th>
                                               <td>{{$order->payment_method}}</td>
                                               </tr>
                                                <tr>
                                     <th>Grand Total</th>
                                               <td>{{$order->grand_total}}</td>
                                               </tr>
                                             <tr>
                                     <th>Order Status</th>
                                               <td>{{strtoupper($order->order_status)}}</td>
                                               </tr> 
                                                <tr>
                                     <th>Order Date</th>
                                               <td>{{$order->created_at}}</td>
                                               </tr>  
                                                <tr>
                                     <th>Change Order Status</th>
                                               <td style="display:flex;">
                                               <a href="{{route('bzu_thepetshop_change_order_status',['status'=>'pending','order_id'=>$order->id])}}" class="btn btn-primary">Pending</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                               <a href="{{route('bzu_thepetshop_change_order_status',['status'=>'processing','order_id'=>$order->id])}}" class="btn btn-warning">Processing</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                               <a href="{{route('bzu_thepetshop_change_order_status',['status'=>'completed','order_id'=>$order->id])}}" class="btn btn-success">Complete</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                               <a href="{{route('bzu_thepetshop_change_order_status',['status'=>'cancelled','order_id'=>$order->id])}}" class="btn btn-info">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;

                                               </td>
                                               </tr>                       </form>
                                 </thead>
                              
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->

@endsection