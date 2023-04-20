@extends('shopvert.layouts.master')

@section('mytitle')
 / Order Review
@endsection


@section('navbarHeader')
@includeif('shopvert.layouts.navbarHeader',['menus'=>'no'])
@endsection


@section('header')
@include('shopvert.layouts.header',['top_menu'=>'no'])
@endsection




@section('content')
<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
  width:100%;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
 <!-- Start Cart  -->
    <div class="cart-box-main">
        
        <div class="container">
            <div class="text-center">
                                    <h1><strong>Order Review</strong></h1>
                                </div>
             <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Billing Address</h3>
                                </div>
                                <div class="d-flex">
                                    <h4>Name</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->delivery_address->name}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Address</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->delivery_address->address}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>City</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->delivery_address->city}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>State</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->delivery_address->state}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Country</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->delivery_address->country}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>ZIP</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->delivery_address->zip}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                 <div class="d-flex">
                                    <h4>Mobile</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->delivery_address->mobile}}</h4> </div>
                                </div>
                                <hr> </div>
                        </div>
                </div>
               <div class="col-lg-6 col-sm-6">
                   <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Shipping Address</h3>
                                </div>
                                <div class="d-flex">
                                    <h4>Name</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->shipping_address->name}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Address</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->shipping_address->address}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>City</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->shipping_address->city}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>State</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->shipping_address->state}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Country</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->shipping_address->country}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>ZIP</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->shipping_address->zip}}</h4> </div>
                                </div>
                                <hr class="my-1">
                                 <div class="d-flex">
                                    <h4>Mobile</h4>
                                    <div class="ml-auto"><h4> {{Auth::user()->shipping_address->mobile}}</h4> </div>
                                </div>
                                <hr> </div>
                        </div>
                </div>
               
                </div>
            <div class="row">

                <div class="col-lg-12">

                    <div class="table-main table-responsive">
                         @include('partials.message')
                          <div>
                                    <h3 class="font-weight-bold">Review Cart</h3>
                                </div>
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_amount=0; ?>
                                @foreach($user_cart as $cart)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="{{route('product.detail',$cart->product_id)}}">
                                    <img class="img-fluid" src="{{asset('uploads/products/'.$cart->product->image ?? 'dummy.png')}}" alt="" />
                                </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="{{route('product.detail',$cart->product_id)}}">
                                    {{$cart->product->name ?? 'N/A'}}
                                    @if($cart->size=='0')
                                    <p>{{$cart->product_code}}
                                    @else
                                     <p>{{$cart->product_code}} | {{$cart->size}} </p>
                                    @endif
                                </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>PKR {{$cart->price ?? 'N/A'}}</p>
                                    </td>
                                <td class="quantity-box text-center">
                                    {{$cart->quantity}}
                                </td>
                                    <td class="total-pr">
                                        <p>PKR {{$cart->quantity*$cart->price}}</p>
                                    </td>
                                   
                                </tr>
                                <?php $total_amount=$total_amount+$cart->quantity*$cart->price; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
               
                </div>
            </div>
 <form action="{{route('user.place_order')}}" method="POST">
    @csrf
            <div class="row my-5">

                <div class="col-lg-6 col-sm-6">
                    <div class="title-left">
                                    <h3>Select Payment Method</h3>
                                </div>
                            <div class="d-block my-3">
                                <?php 
                                // $payment_method=array("COD","Paypal","Jazz Cash","Easy Paisa","Debit Card","Credit Card");
                                $payment_method=array("COD","Stripe");
                                ?>
                                @foreach($payment_method as $p)
                                <div class="custom-control custom-radio">
                                    <input id="{{$p}}" name="payment_method" value="{{$p}}" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="{{$p}}">{{$p}}</label>
                                </div>
                                @endforeach
                            </div>
                                 
                            <div class="row my-5">
                                <div class="col-lg-6 col-sm-6">
                          <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/1.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/2.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/3.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/5.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/7.png')}}" alt=""></li>
                                        </ul>
                                    </div> 
                                </div> 
                                   <div class="col-lg-6 col-sm-6"></div>
                                </div> 
                </div>
                <div class="col-lg-6 col-sm-6">
                     <div class="order-box">
                       <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                        @if($coupon_amount=Session::get('coupon_amount'))
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> PKR {{$total_amount}} </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> PKR {{$coupon_amount}} </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">PKR {{$total_amount-$coupon_amount}} </div>
                        </div>
                        @else
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">PKR {{$total_amount}} </div>
                        </div>
                        @endif
                        <hr> </div>
                         <div class="row my-5">
                                <div class="col-lg-6 col-sm-6">
                     <script src="https://js.stripe.com/v3/"></script>

<form accept-charset="UTF-8" action="/" class="require-validation"
    data-cc-on-file="false"
    data-stripe-publishable-key="test_public_key"
    id="payment-form" method="post">
    {{ csrf_field() }}
    <div class='form-group'>
        <div class='col-xs-12 form-group required'>
            <label class='control-label'>Name on Card</label> <input
                class='form-control' size='4' type='text'>
        </div>
    </div>
    <div class='form-group'>
        <div class='col-xs-12 form-group card required'>
            <label class='control-label'>Card Number</label> <input
                autocomplete='off' class='form-control card-number' size='20'
                type='text'>
        </div>
    </div>
    <div class='form-group'>
        <div class='col-xs-4 form-group cvc required'>
            <label class='control-label'>CVC</label> <input autocomplete='off'
                class='form-control card-cvc' placeholder='ex. 311' size='4'
                type='text'>
        </div>
        <div class='col-xs-4 form-group expiration required'>
            <label class='control-label'>Expiration</label> <input
                class='form-control card-expiry-month' placeholder='MM' size='2'
                type='text'>
        </div>
        <div class='col-xs-4 form-group expiration required'>
            <label class='control-label'> </label> <input
                class='form-control card-expiry-year' placeholder='YYYY' size='4'
                type='text'>
        </div>
    </div>
  
    <div class='form-group'>
        <div class='col-md-12 form-group'>
            <button class='form-control btn btn-primary submit-button'
                type='submit' style="margin-top: 10px;">Pay Now »</button>
        </div>
    </div>

</form>
 
                                </div> 
                                   <div class="col-lg-6 col-sm-6"></div>
                                </div>
                </div>
                <input type="hidden" name="grand_total" value="{{$total_amount}}">

                <div class="col-12 d-flex shopping-box"> <button style="color:white;font-size: 18px;" class="ml-auto btn hvr-hover" id="submit" type="submit">Place Order</button> </div>
                 <!-- <div class="submit-button text-center">
                                       <br> <button class="ml-auto btn hvr-hover" id="submit" type="submit">Login</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div> -->

               <!-- <div class="submit-button text-right">
                                       <br> <button class="btn hvr-hover" id="submit" type="submit">Login</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div> -->
                </div>
            </form>

            </div>
 
           
    </div>
    <!-- End Cart -->
<script>
    // Create a Stripe client.
var stripe = Stripe('pk_test_0KzgLhNNzR4sbX3RYPZ4rZCM00LVcoB5Xt');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection