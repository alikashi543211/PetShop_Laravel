@extends('shopvert.layouts.master')

@section('mytitle')
 / Change Passwor
@endsection

@section('navbarHeader')
@includeif('shopvert.layouts.navbarHeader',['menus'=>'yes'])
@endsection


@section('header')
@include('shopvert.layouts.header',['top_menu'=>'yes'])
@endsection

@section('mycss')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

@endsection

@section('myscript')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable({
    	'paging':false;
    });
} );
</script>
@endsection

@section('content')
 
 <!-- Start My Account  -->
    <div class="my-account-box-main">
        <div class="container">
           <div class="text-center">
                                    <h1><strong>My Orders</strong></h1>
                                </div>
            <div class="my-account-page">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                 <div class="table-responsive">
    <table id="myTable" class="table table-bordered">
      <thead>
        <tr>
          <th>Order #</th>
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
          <th>Zip</th>
          <th>Country</th>
          <th>Mobile</th>
          <th>Shipping Charges</th>
          <th>Coupon Code</th>
          <th>Coupon Amount</th>
          <th>Payment Method</th>
          <th>Grand Total</th>
          <th>Order Status</th>
            <th>Date</th>
        </tr>
      </thead>
      <tbody>
      	@foreach($orders as $order)
        <tr>
          <td>{{$order->id}}</td>
          <td>{{$order->name}}</td>
          <td>{{$order->user_email}}</td>
          <td>{{$order->address}}</td>
          <td>{{$order->city}}</td>
          <td>{{$order->state}}</td>
          <td>{{$order->zip}}</td>
          <td>{{$order->country}}</td>
          <td>{{$order->mobile}}</td>
          <td>{{$order->shipping_charges ?? 'N/A'}}</td>
          <td>@if(!empty($order->coupon_code)) {{$order->coupon_code}} @else {{'N/A'}}  @endif</td>
          <td>{{$order->coupon_amount ?? 'N/A'}}</td>
          <td>{{$order->payment_method}}</td>
          <td>{{$order->grand_total}}</td>
          <td>{{$order->order_status}}</td>
           <td>{{$order->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="float-right">{!! $orders->render() !!}</div>
    <div class="clearfix"></div>
  </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account -->


@endsection