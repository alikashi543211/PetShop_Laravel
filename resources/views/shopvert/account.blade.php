@extends('shopvert.layouts.master')

@section('mytitle')
 / Account
@endsection

@section('navbarHeader')
@includeif('shopvert.layouts.navbarHeader',['menus'=>'yes'])
@endsection


@section('header')
@include('shopvert.layouts.header',['top_menu'=>'yes'])
@endsection

@section('content')
 
 <!-- Start My Account  -->
    <div class="my-account-box-main">
        <div class="container">
            <div class="text-center">
                                    <h1><strong>Welcome {{Auth::user()->name}}</strong></h1>
                                </div>
            <div class="my-account-page">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="{{route('user.show_orders')}}"> <i class="fa fa-gift"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>My Orders</h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-lg-6 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="{{route('user.change_address')}}"> <i class="fa fa-user-circle"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>My Profile</h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account -->


@endsection