@extends('shopvert.layouts.master')

@section('content')
 <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        
        <div class="container">
            <div class="row">

                <div class="col-lg-12">

                    <div class="table-main table-responsive">
                         @include('partials.message')
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
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
                                <td class="quantity-box">

                                    <a href="{{route('cart.increment_quantity',$cart->id)}}" style="font-size: 25px;">+</a>
                                    <input type="text" size="4" readonly value="{{$cart->quantity}}" name="quantity" step="1" class="c-input-text qty text">
                                    @if($cart->quantity!=1)
                                    <a href="{{route('cart.decrement_quantity',$cart->id)}}" style="font-size: 25px;">-</a>
                                    @endif
                                </td>
                                    <td class="total-pr">
                                        <p>PKR {{$cart->quantity*$cart->price}}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{route('cart.delete',$cart->id)}}">
                                    <i class="fas fa-times"></i>
                                </a>
                                 
                                    </td>
                                </tr>
                                <?php $total_amount=$total_amount+$cart->quantity*$cart->price; ?>
                                @endforeach
                                <?php
                                 $chk=\App\Cart::where("user_email",Auth::user()->email)->count();
                                ?>
                                @if($chk==0):
                                <tr>
                                    <td colspan="6" class="alert alert-info text-center"><b>Your Cart is Empty</b></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
               
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <form method="POST" action="{{route('coupon.coupon_apply')}}">
                            @csrf
                        <div class="input-group input-group-sm">

                            <input class="form-control" placeholder="Enter your coupon code" name="coupen_code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                     <div class="order-box">
                        <h3>Order summary</h3>
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
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{route('shopvert.index')}}" class="ml-auto btn hvr-hover">Continue Shopping</a> <a href="{{route('user.checkout')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
                &nbsp;&nbsp;&nbsp;
                
               
                </div>
            </div>
 
           
    </div>
    <!-- End Cart -->

 
    <!-- End Instagram Feed  -->

@endsection