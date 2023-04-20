@extends('admin.layouts.master')

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
                  <i class="fa fa-book"></i>
               </div>
               <div class="header-title">
                  <h1>SALE REPORT</h1>
                  <small>Daily, Weekly, Monthly Report</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     @includeif("partials.message")
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                               
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                       
                           <div class="table-responsive">
                             <form action="{{route('thepetshop_fyp_view_sale_report_front')}}" method="GET"> <table class="table table-bordered table-striped table-hover">
                             
                                 <thead>
                                   
                                    <tr>
                                      <td>
                                        <div class="form-group">
                                          <label>From Date</label>
                                          <input type="text" readonly class="form-control input-lg datepicker" placeholder="Select From Date" value="@if(isset($_GET['starting_date'])) {{$_GET['starting_date']}} @endif" name="starting_date">
                                        </div>
                                      </td>
                                        <td>
                                        <div class="form-group">
                                          <label>To Date</label>
                                          <input type="text" value="@if(isset($_GET['ending_date'])) {{$_GET['ending_date']}} @endif" placeholder="Select To Date" readonly class="form-control input-lg datepicker" name="ending_date">

                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="50" class="text-center"> <input type="submit"name="get_report" class="btn btn-add btn-lg btn-block" value="GET REPORT"></td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    
                               
                        
                                 </tbody>
                              </table></form>
                           </div>
                           @if(isset($_GET['get_report']))
                               <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                
                                 <a href="{{route('thepetshop_fyp_print_sale_report_front',$_GET)}}"> <button name="print_report" value="print" class="btn btn-add btn-block btn-lg"> <i class="fa fa-print"></i> Print</button></a>
                              
                              </div>
                              
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover">
                                 <thead>
                                  <tr class="info">
                                    <th colspan="50" class="text-center"><h2><b>Sale Report</b></h2></th>
                                  </tr>
                                 
                                    <tr>
                                       <th>From Date</th>
                                    <td colspan="4">{{$_GET['starting_date']}}</td>
                                  </tr>
                                    <tr>
                                       <th>Ending Date</th>
                                    <td colspan="4">{{$_GET['ending_date']}}</td>
                                  </tr>
                                  <tr>
                                       <th>Sr</th>
                                       <th>Product ID</th>
                                       <th>Product Name</th>
                                       <th>Sold Qty</th>
                                       <th>Amount</th>
                                      
                                  </tr>
                                  <?php $products=\App\Product::all();
                                  $sreport=Session::get('report');
                                   $total=0;
                                   ?>
                                  @foreach($products as $p)
                                                                   <tr>
                                    <td>{{$loop->iteration}}</td>
                                       <td>{{$p->id}}</td>
                                       <td>{{$p->name}}</td>
                                       <td>{{$sreport[$p->name]['qty']}}</td>
                                       <td> {{$sreport[$p->name]['total_amount']}}</td>
                                       <?php $total=$total+$sreport[$p->name]['total_amount']; ?>
                                  </tr>
                                 
                                    @endforeach   
                                    <tr>
                                      <th colspan="4" class="text-center">Grand Total</th>
                                      <td colspan="1">PKR {{$total}}</td>
                                    </tr>
                                 </thead>
                                 </table>
                               </div>
                               @endif
               <!-- customer Modal1 -->
               
               <!-- /.modal -->
               <!-- Modal -->    
               <!-- Customer Modal2 -->
             

                
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <style type="text/css">
.centered-modal.in {
    display: flex !important;
}
.centered-modal .modal-dialog {
    margin: auto;
}
</style>

@endsection