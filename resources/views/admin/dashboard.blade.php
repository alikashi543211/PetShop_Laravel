@extends('admin.layouts.master')
@section('title')
Dashboard
@endsection
@section('content')
<?php $tp=\App\Product::count();
$tu=\App\User::count();
$sp=\App\Product::sum('stock_out');
   $po= \App\Order::where("order_status","pending")->count();
   $pro= \App\Order::where("order_status","processing")->count();
   $co= \App\Order::where("order_status","completed")->count();
   $co= \App\Order::where("order_status","cancelled")->count();
 ?>
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
           
               <div class="header-title">
                  <h1 style="color:#010a0f;font-weight:bold;">Welcome Admin</h1>
                 
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                          
                           <div class="counter-number pull-right">
                           </div>
                           <h3><center>Total Products <br><br> {{$tp}}</center></h3>
                        </div>
                     </div>
                  </div>
                     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                          
                           <div class="counter-number pull-right">
                           </div>
                           <h3><center>Sold Products <br><br> {{$sp}}</center></h3>
                        </div>
                     </div>
                  </div>
                     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                          
                           <div class="counter-number pull-right">
                           </div>
                           <h3><center>Pending Orders <br><br> {{$po}}</center></h3>
                        </div>
                     </div>
                  </div>
                     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                          
                           <div class="counter-number pull-right">
                           </div>
                           <h3><center>Processing Orders <br><br> {{$pro}}</center></h3>
                        </div>
                     </div>
                  </div>
                     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                          
                           <div class="counter-number pull-right">
                           </div>
                           <h3><center>Completed Orders <br><br> {{$co}}</center></h3>
                        </div>
                     </div>
                  </div>
                     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                          
                           <div class="counter-number pull-right">
                           </div>
                           <h3><center>Cancelled Orders <br><br> {{$co}}</center></h3>
                        </div>
                     </div>
                  </div>
                   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                          
                           <div class="counter-number pull-right">
                           </div>
                           <h3><center>Total Users <br><br> {{$tu-1}}</center></h3>
                        </div>
                     </div>
                  </div>
                            </div>
     
       
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->

@endsection