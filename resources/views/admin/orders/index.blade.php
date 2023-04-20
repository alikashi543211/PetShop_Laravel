@extends('admin.layouts.master')
@section('title')
All orders
@endsection

@section('mycss')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('myscript')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

@endsection

@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-first-order"></i>
               </div>
               <div class="header-title">
                  <h1>{{$_GET['show']}} orders</h1>
                  <small>order List</small>
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
                                 <h4>{{$_GET['show']}} orders</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        {{-- Kashif-> yahaan pr me isAllowed k gate ko call kr raha hoon. or saath me arguments b pass kr raha hoon.--}}
                        @can("isAllowed",$orders)
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{route('order.create')}}"> <i class="fa fa-plus"></i> Add order
                                 </a>  
                              </div>
                              
                             
                           </div>
                           @endcan
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           @if(!$orders->isEmpty())
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>City</th>
                                       <th>State</th>
                                       <th>Order Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @foreach($orders as $order)
                                    <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$order->name}}</td>
                                       <td>{{$order->city}}</td>
                                       <td>{{$order->state}}</td>
                                       <td>{{strtoupper($order->order_status)}}</td>
                                      <td>
                                          <a title="Delete order" href="{{route('admin.order.detail',$order->id)}}" ><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#customer2">View Full Order </button></a>
                                          <a title="Delete order" href="{{route('delete_order_by_admin',$order->id)}}" ><button type="button" class="btn btn-danger btn-sm">Delete Order </button></a>
                                          </div>
                                                     <form id="delete-form{{$order->id}}" action="#" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                       </td>
                                    </tr>
                                    <!-- Modal -->
  <div class="modal fade" id="myModal{{$order->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{$order->name}} Full Details</h4>
        </div>
        <div class="modal-body">
          <p>order No: {{$order->id}} </p>
          <p>Category: {{$order->category->name ?? 'N/A'}} </p>
          <p>order Code: {{$order->code}} </p>
          <p>order Color: {{$order->color}} </p>
          <p>order Price: {{$order->price}} </p>
          <p>Description: {{$order->description}} </p>
          <p>Material & Care: {{$order->care}} </p>
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
                           <p class="text-center alert alert-info">No orders Found</p>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
@endsection
