@extends('shopvert.layouts.master')


@section('myscript')
<script>
             $(document).ready( function () {
            $("#selSize").change(function(){ 
            $.ajax({
                     type: 'get',
                     url: "{{route('product.get_price')}}",
                     data: {idSize: $('#selSize').val()},
                     success:function(resp){
                        $("#getPrice").html("Product Price: Rs"+resp);
                        $("#price").val(resp);
                     },error:function(){
                        alert('Error');
                     }
                  });  
            });
         });
    </script>
@endsection

@section('content')
   <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
@includeif('partials.message')
    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">

                            <div class="carousel-item active"> <img class="d-block w-100" src="{{asset('uploads/products/'.$product->image)}}" alt="First slide"> </div>
                            @foreach($product->multiple_images as $multiple_image)
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset('uploads/products/'.$multiple_image->image)}}" alt="Second slide"> </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>

                        <ol class="carousel-indicators">
                             <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{asset('uploads/products/'.$product->image)}}" alt="" />
                            </li>
                            @foreach($product->multiple_images as $product_image)
                            <li data-target="#carousel-example-1" data-slide-to="{{$loop->iteration}}">
                                <img class="d-block w-100 img-fluid" src="{{asset('uploads/products/'.$product_image->image)}}" alt="" />
                            </li>
                           @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <form name="add_to_cart" method="POST" action="{{route('cart.store')}}">
                        @csrf
                    <div class="single-product-details">
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <input type="hidden" value="{{$product->name}}" name="product_name">
                        <input type="hidden" value="{{$product->color}}" name="product_color">
                        <input type="hidden" id="price" value="{{$product->price}}" name="price">
                         <input type="hidden" value="{{$product->code}}" name="product_code">
                      
                        <h2>{{$product->name}}</h2>
                        <h5 id="getPrice">Product Price: PKR {{$product->price}}</h5>
                        <p class="available-stock">
                           
                               
                             
                                <ul>
                                   <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">In Stock</label>
                                            <input class="form-control" readonly name="stock_in" value="{{$product->stock_in}}" min="1" max="20" type="text">
                                        </div>
                                    </li> 
                                    <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">Quantity</label>
                                            <input class="form-control" name="quantity" value="1" min="1" max="20" type="number" autofocus="true">
                                        </div>
                                    </li>
                                </ul>
 <h4>Description:</h4>
                                <p>{{$product->description}}</p>
                                <div class="price-box-bar">
                                     @if(Auth::check())
                                    <div class="cart-and-bay-btn">
                                        <button class="btn hvr-hover btn-block" style="color:white;" data-fancybox-close="" type="submit">Add to cart</button> 

                                    </div>
                                    @else
                                    <div class="cart-and-bay-btn">
                                     <a href="{{route('user.login_register')}}" class="btn hvr-hover btn-block" style="color:white;" data-fancybox-close="" type="submit">Add to cart</a>

                                    </div>
                                        @endif
                                </div>
</form>
                                {{-- <div class="add-to-btn">
                                    <div class="add-comp">
                                        <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                                        <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                                    </div>
                                    <div class="share-bar">
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                    </div>
                                </div> --}}
                    </div>
                </div>
            </div>

           <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>Featured Products are Listed Here...</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach($featured_products as $featured_product)
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                   
                                    <img src="{{asset('uploads/products/'.$featured_product->image)}}" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                      
                                        <a class="cart btn btn-block btn-lg" title="{{$featured_product->name}}" href="{{route('product.detail',$featured_product->id)}}">Detail</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>{{$featured_product->name}}</h4>
                                    <h5>PKR {{$featured_product->price}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- All Featured Products jo featured_products column k 1 honey pr tamaam products show hon gi.  -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

    

@endsection