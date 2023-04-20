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

@endsection

@section('content')

<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead">Your Order Submitted Successfully..</p>
  <hr>
  <p>
    Having trouble? <a href="{{route('thepetshop_contact_page')}}">Contact us</a>
  </p>
  <p class="lead">
    <a href="{{route('user.show_orders')}}" role="button"><button style="color:white;" class="btn hvr-hover btn-md" id="submit" type="submit">Click To View Orders</button></a>
    
  </p>
</div>

@endsection