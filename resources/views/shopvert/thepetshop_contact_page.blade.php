 @extends('shopvert.layouts.master')
 @section('content')
   <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Thepetshop</a></li>
                        <li class="breadcrumb-item active">Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
 <div class="contact-box-main">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-12 col-sm-12">
                    <div class="contact-form-right">
                        <h2>GET IN TOUCH</h2>
                        <p>Enter your name, email, subject and message for any query...</p>
                        <form method="POST" action="{{route('user.login')}}" class="">
                            @csrf
                            
                                    <div class="form-group has-error">
                                    <input type="email" value="{{Session::get('email')}}" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                       <div class="form-group has-error">
                                    <input type="text" value="{{Session::get('email')}}" class="form-control" id="email" name="email" placeholder="Your Email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                       <div class="form-group has-error">
                                    <input type="text" value="{{Session::get('email')}}" class="form-control" id="email" name="email" placeholder="Your Subject" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                       <div class="form-group has-error">
                                    <textarea class="form-control" rows="6" id="email" name="message" placeholder="Message Here..." required data-error="Please enter your email"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                           
                                    <div class="submit-button text-center">
                                       <br> <button class="btn hvr-hover" id="submit" type="submit">Submit</button>
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