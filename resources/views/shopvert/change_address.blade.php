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
                                    <h1><strong>My Profile</strong></h1>
                                </div>
                                 @include('partials.message')
            <div class="row">
            
                <div class="col-lg-12 col-sm-12">
                    <div class="contact-form-right">
                       
                        <form method="POST" action="{{route('visiting_user_change_account_info_post')}}" class="">
                            @csrf
                           
                                   <div class="row">
                                       <div class="col-md-6">
                                            <div class="form-group has-error">
                                    <input type="text" value="{{(Auth::user()->name)}}" class="form-control" id="name" name="name" placeholder="name" required data-error="Please enter your name">
                                        
                                         @if ($errors->has('name'))
                                                      <span class="my_error_design">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                  @endif
                                    </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group has-error">
                                    <input type="text" value="{{Auth::user()->email}}" class="form-control" id="name" name="email" placeholder="Old Password" required data-error="Please enter your name">
                                       @if ($errors->has('email'))
                                                      <span class="my_error_design">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                  @endif
                                    
                                    </div>
                                       </div>
                                       
                                   </div>
                                   <div class="row">
                                    <div class="col-md-4">
                                            <div class="form-group has-error">
                                    <input type="password" value="" class="form-control" id="name" name="old_password" placeholder="Old Password" data-error="Please enter your new password">
                                     
                                    </div>
                                       </div>
                                         <div class="col-md-4">
                                            <div class="form-group has-error">
                                    <input type="password" value="" class="form-control" id="email" name="new_password" placeholder="New Password" data-error="Please enter your password_confirm">
                                          
                                    </div>
                                       </div>
                                       <div class="col-md-4">
                                            <div class="form-group has-error">
                                    <input type="password" value="" class="form-control" id="email" name="confirm_password" placeholder="Confirm Password" data-error="Please enter your email">
                                       
                                    </div>
                                       </div>
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