@extends('shopvert.layouts.master')

@section('mytitle')
 / Change Passwor
@endsection

@section('navbarHeader')
@includeif('shopvert.layouts.navbarHeader',['menus'=>'yes'])
@endsection


@section('header')
@include('shopvert.layouts.header',['top_menu'=>'yes'])
@endsection

@section('content')
 
 
    <!-- End All Title Box -->
 <div class="contact-box-main">
        <div class="container">
          <div class="text-center">
                                    <h1><strong>Change Password</strong></h1>
                                </div>
            <div class="row">
            
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                       
                        <form method="POST" action="{{route('user.login')}}" class="">
                            @csrf
                            
                                    <div class="form-group has-error">
                                    <input type="email" value="{{Session::get('email')}}" class="form-control" id="name" name="name" placeholder="Old Password" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                       <div class="form-group has-error">
                                    <input type="text" value="{{Session::get('email')}}" class="form-control" id="email" name="email" placeholder="New Password" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                       <div class="form-group has-error">
                                    <input type="text" value="{{Session::get('email')}}" class="form-control" id="email" name="email" placeholder="Confirm Password" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                           
                                    <div class="submit-button text-center">
                                       <br> <button class="btn hvr-hover" id="submit" type="submit">Update</button>
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
    <!-- End Cart -->

@endsection