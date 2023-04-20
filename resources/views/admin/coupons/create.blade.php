@extends('admin.layouts.master')
@section('title')
Create Coupon
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-gift"></i>
               </div>
               <div class="header-title">
                  <h1>Add Coupon</h1>
                  <small>Add Coupons</small>
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
                              <a class="btn btn-add " href="{{route('coupon.index')}}"> 
                              <i class="fa fa-list"></i>  View Coupons </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="POST" action="{{route('coupon.store')}}" enctype="multipart/form-data">
                           	@csrf
                              <div class="form-group">
                                 <label>Coupon Code</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Coupon Code" name="coupen_code" id="name" required>
                              </div>
                              <div class="form-group">
                                 <label>Amount</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Amount" name="amount" id="name" required>
                              </div>
                              <div class="form-group">
                                 <label>Amount Type</label>
                                <select name="amount_type" class="form-control">
                           <option>Percentage</option>
                           <option>Fixed</option>
                        </select>
                              </div>
                             <div class="form-group">
                                 <label>Expiry Date</label>
                                <input type="text" id="datepicker" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Expiry Date" name="expiry_date" required>
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Coupon">
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

@section('myscript')

@endsection