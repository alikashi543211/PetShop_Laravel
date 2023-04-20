<?php
use App\Http\Controllers\Controller;
$mainCategories = Controller::mainCategories();
?>
    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{route('shopvert.index')}}"><img src="{{asset('front_assets/images/my_logo2.png')}}" height="100" width="180" style="border-radius:20px;" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                @if( request()->path() != 'checkout' && request()->path() != 'order-review' && request()->path() != 'thanks' ) 
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{route('shopvert.index')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('thepetshop_about_page')}}">About</a></li>
                        @if(Auth::check())
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Product</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        @foreach($mainCategories as $main_category)
                                        @if($main_category->status=='1')
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">{{$main_category->name}}</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    @foreach($main_category->child_categories as $child_category)
                                                    @if($child_category->status=='1')
                                                    <li><a href="{{route('product.search_about_category',$child_category->slug)}}">{{$child_category->name}}</a></li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- end col-3 -->
                                        @endforeach
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                         @endif
                  <li class="dropdown">
                                                                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
                                                                      <ul class="dropdown-menu">
                                                                        @if(Auth::check())
                                                                          <li><a href="{{route('user.account')}}">Dashboard</a></li>
                                                                          <?php $pass=["user"=>"logout"]; ?>
                                                                          <li><a href="{{route('admin.logout',$pass)}}">Logout</a></li>
                                                                          @else
                                                                          <li><a href="{{route('user.login_register')}}">Sign up</a></li>
                                                                          <li><a href="{{route('user.login_register')}}">Login</a></li>
                                                                          @endif
                                                                         
                                                                      </ul>
                                                                  </li> 
                                                                
                            {{-- @if(Auth::check())
                            <li class="nav-item"><a class="nav-link" href="{{route('user.account')}}"> Account</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.logout')}}">Our Service</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link" href="{{route('user.login_register')}}">Our Service</a></li>
                            @endif --}}
                        
                        <li class="nav-item"><a class="nav-link" href="{{route('thepetshop_contact_page')}}">Contact</a></li>
                    </ul>
                </div>

                <!-- yahaan -->
                
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                 @if(Auth::check())
                <?php
                $user_email=Auth::user()->email;
                 $root = \App\Cart::where('user_email',$user_email)->count();
                 ?>
                 <div class="attr-nav">
                    <ul>
                       {{-- <li class="search"><a href="#"><i class="fa fa-search"></i></a></li> --}}
                        <li><a href="{{url('/cart')}}">
                        <i class="fa fa-shopping-bag"></i>
                            <span class="badge">{{$root}}</span>
                    </a></li>
                    </ul>
                </div>
                @else

   <div class="attr-nav">
                    <ul>
                       {{-- <li class="search"><a href="#"><i class="fa fa-search"></i></a></li> --}}
                        <li class="side-menu"><a href="#">
                        <i class="fa fa-shopping-bag"></i>
                            <span class="badge">0</span>
                    </a></li>
                    </ul>
                </div>

                @endif
                @endif
             
                <!-- End Atribute Navigation -->
                <!-- is me yahaaan pr me navbar ko display krwaney k check ko end if kr raha hoon -->
               
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="{{asset('front_assets/images/img-pro-01.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{asset('front_assets/images/img-pro-02.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{asset('front_assets/images/img-pro-03.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->