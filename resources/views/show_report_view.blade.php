<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Al Jannat Traders</title>
    <link rel="stylesheet" href="{{asset('print_assets/css/style.css')}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('front_assets/images/my_logo2.png')}}">
      </div>
      <h1>SALE REPORT &nbsp;&nbsp;&nbsp;<a href="#" onclick="print_invoice()" id="print">Print</a></h1>
      <div id="company" class="clearfix">
        <div>Online Pet Shop</div>
        <div>Gulgasht Shalimar Colony,<br />Multan</div>
        <div>03087867543#</div>
        <div><a href="mailto:company@example.com">thepetshop@hotmail.com</a></div>
      </div>
      <div id="project">
        {{-- <div><span>PROJECT</span> Website development</div>
                        <div><span>CLIENT</span> John Doe</div>
                        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
                        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div> --}}
       {{-- <div><span>DATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> {{Helpers::lms_helper_my_date_formate($invoice->invoice_date)}}</div> --}}
        <br>
        <div><span>FROM DATE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> {{$_GET['starting_date']}}</div><br>
         <div><span>TO DATE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> {{$_GET['ending_date']}}</div>
        {{-- <div><span>DUE DATE</span> September 17, 2015</div> --}}
      </div>
    </header>
    <main>
      <table>
        <thead>
          
          <tr>
            <th class="qty">Sr</th>
                                       <th>Product ID</th>
                                       <th>Product Name</th>
                                       <th>Sold Qty</th>
                                       <th class="qty">Amount</th>
           
          </tr>
        </thead>
        <tbody>
         
             <?php $products=\App\Product::all();
                                  $sreport=Session::get('report');
                                   $total=0;
                                   ?>
         @foreach($products as $p)
                                                                   <tr>
                                    <td>{{$loop->iteration}}</td>
                                       <td style="text-align:center;">{{$p->id}}</td>
                                       <td style="text-align:left;">{{$p->name}}</td>
                                       <td style="text-align:center;">{{$sreport[$p->name]['qty']}}</td>
                                       <td style="text-align:center;">{{$sreport[$p->name]['total_amount']}}</td>
                                       <?php $total=$total+$sreport[$p->name]['total_amount']; ?>
                                  </tr>
                                 
                                    @endforeach   
                               
                                     <tr>
            <td colspan="3" class="grand total">GRAND TOTAL</td>
            <td colspan="2" class="grand total">PKR {{$total}}</td>
          </tr>
        </tbody>
      </table>
      
    </main>
      <script>
function print_invoice()
{
  
  document.getElementById('print').style.display="none";
  window.print();
  window.location="{{route('thepetshop_fyp_view_sale_report_front',$_GET)}}";
}
    </script>
  </body>
</html>