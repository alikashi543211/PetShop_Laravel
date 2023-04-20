@extends('shopvert.layouts.master')

@section('mytitle')
 / Cart
@endsection


@section('navbarHeader')
@includeif('shopvert.layouts.navbarHeader',['menus'=>'no'])
@endsection


@section('header')
@include('shopvert.layouts.header',['top_menu'=>'no'])
@endsection



@section('myscript')
<script type="text/javascript">
    function billing_equal_shipping()
    {
        if(document.getElementById('same-address').checked==true)
        {
            document.getElementById('shipping_name').value=document.getElementById('billing_name').value
            document.getElementById('shipping_address').value=document.getElementById('billing_address').value
            document.getElementById('shipping_city').value=document.getElementById('billing_city').value
            document.getElementById('shipping_state').value=document.getElementById('billing_state').value
            document.getElementById('shipping_country').value=document.getElementById('billing_country').value
            document.getElementById('shipping_zip').value=document.getElementById('billing_zip').value
            document.getElementById('shipping_mobile').value=document.getElementById('billing_mobile').value
        }else 
        {
           document.getElementById('shipping_name').value=""
            document.getElementById('shipping_address').value=""
            document.getElementById('shipping_city').value=""
            document.getElementById('shipping_state').value=""
            document.getElementById('shipping_country').value="Choose..."
            document.getElementById('shipping_zip').value=""
            document.getElementById('shipping_mobile').value=""
        }
    }
</script>
@endsection

@section('content')

<div class="contact-box-main">
        <div class="container">
             <div class="text-center">
                                    <h1><strong>Check Out</strong></h1>
                                </div>
             @include('partials.message')
            <div class="row">
                <!-- Register Portion -->
               
               <div class="col-lg-5 col-sm-12">
              
                    <div class="contact-form-right">
                       <div class="title-left">
                                    <h3>Billing Address</h3>
                                </div>
                       
                        <form method="POST" action="{{route('user.checkout')}}" class="">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                                <input type="text" placeholder="Billing Name" id="billing_name" class="form-control" name="billing_name" value="{{Auth::user()->name}}" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" placeholder="Billing Address" id="billing_address" class="form-control" name="billing_address" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" placeholder="Billing City" id="billing_city" class="form-control" name="billing_city" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" placeholder="Billing State" id="billing_state" class="form-control" name="billing_state" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                     <div class="col-md-12">
                                    <div class="form-group has-error">
                                    <select id="billing_country" name="billing_country" class="form-control">
                                    <option value="Choose..." data-display="Select">Select Country</option>
                                    @foreach($countries as $c)
                        <option value="{{$c->country_name}}" >{{$c->country_name}}</option>
                                    @endforeach
                                </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" placeholder="ZIP" id="billing_zip" class="form-control" name="billing_zip" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               
                             
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                               <input type="text" class="form-control" id="billing_mobile" name="billing_mobile" placeholder="Billing Mobile No" required >
                                        
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                <input type="checkbox" onchange="billing_equal_shipping();" name="shipping" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div>
                                </div>
                            </div>
                       
                    </div>
                </div>
                <!-- Login Portion -->
                <div id="or" class="col-lg-1 col-sm-12 d-lg-block d-md-none d-sm-none">OR</div>
                <div class="col-lg-6 col-sm-12">
                    <div class="contact-form-right">
                        <div class="title-left">
                                    <h3>Shipping Address</h3>
                                </div>
                          
                            <div class="row">
                                <div class="col-md-12">
                                  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" placeholder="Shipping Name" id="shipping_name" class="form-control" name="shipping_name" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" placeholder="Shipping Address" id="shipping_address" class="form-control" name="shipping_address" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" placeholder="Shipping City" id="shipping_city" class="form-control" name="shipping_city" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" placeholder="Shipping State" id="shipping_state" class="form-control" name="shipping_state" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                                    <select id="shipping_country" name="shipping_country" class="form-control">
                                    <option value="Choose..." data-display="Select">Select Country</option>
                                    @foreach($countries as $c)
                        <option value="{{$c->country_name}}" >{{$c->country_name}}</option>
                                    @endforeach
                                </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" id="shipping_zip" placeholder="ZIP" id="email" class="form-control" name="shipping_zip" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               
                             
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                               <input type="text" class="form-control" id="shipping_mobile" name="shipping_mobile" placeholder="Shipping Mobile No" required >
                                    </div>
                                   <div class="submit-button text-right">
                                       <br> <button class="btn hvr-hover" id="submit" type="submit">Proceed to Checout</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection