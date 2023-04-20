@extends('shopvert.layouts.master')

@section('mytitle')
 / Login or Register
@endsection



@section('navbarHeader')
@includeif('shopvert.layouts.navbarHeader',['menus'=>'no'])
@endsection


@section('header')
@include('shopvert.layouts.header',['top_menu'=>'yes'])
@endsection


@section('content')
  
<div class="contact-box-main">
        <div class="container">
            <div class="row">
            	<!-- Register Portion -->
                <div class="col-lg-6 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Already a Member ? Just SignIn !</h2>
                        @if(Session::get('r'))

                        @else
                         @includeif('partials.message')
                        @endif
                        <form method="POST" action="{{route('user.login')}}" class="">
                            @csrf
                             <div class="row">
                                <div class="col-md-12">
                                  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                                    <input type="email" value="{{Session::get('email')}}" class="form-control" id="email" name="email" placeholder="Your Email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                               <input type="password" value="{{old('password')}}" class="form-control" id="subject" name="password" placeholder="Password" required data-error="Please enter your password">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                       <br> <button class="btn hvr-hover" id="submit" type="submit">Login</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 <div id="or" class="col-lg-1 col-sm-12">OR</div>
               <div class="col-lg-5 col-sm-12">
                    <div class="contact-form-right">
                        <h2>New User SignUp !</h2>

                        @if(Session::get('r'))
                         @includeif('partials.message')
                         @endif
                       
                        <form method="POST" action="{{route('user.register')}}" class="">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                                        <input type="text" placeholder="Your Name" id="email" class="form-control" name="name" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Your Email" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-error">
                               <input type="password" class="form-control" id="subject" name="password" placeholder="Password" required >
                                        
                                    </div>
                                    <div class="submit-button text-center">
                                       <br> <button class="btn hvr-hover" id="submit" type="submit">Signup</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login Portion -->
               
              
            </div>
        </div>
    </div>

@endsection