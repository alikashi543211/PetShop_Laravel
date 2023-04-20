<?php
use App\Http\Controllers\Controller;
$mainCategories = Controller::mainCategories();
?>
{{-- @if($top_menu!='no')
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                   
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                        <option>$ USD</option>
                        <option>€ EUR</option>
                    </select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="{{route('cart.index')}}"><i class="fa fa-cart-plus" aria-hidden="true"></i> CART</a></li>
                           @if(Auth::check())
                           <li><a href="{{route('user.account')}}"><i class="fa fa-user" aria-hidden="true"></i> ACCOUNT</a></li>
                           <li><a href="{{route('admin.logout')}}"><i class="fa fa-lock" aria-hidden="true"></i> LOGOUT</a></li>
                           @else
                            <li><a href="{{route('user.login_register')}}"><i class="fa fa-user" aria-hidden="true"></i> LOGIN</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->
@endif
--}}