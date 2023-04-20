@extends("resize.layouts.master")
@section("myscript")
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#kimages").change(function() {
  readURL(this);
});
  </script>
@endsection

@section('mycss')
 <style type="text/css">
    .myimage{
    width: 100%;
    height:300px;
}

.imgdiv{
    height: 300px;
    overflow: hidden;
    padding:10px;
}
</style>
@endsection
@section("main_content")
 <section class="banner_w3lspvt" id="home"><div class="csslider infinity" id="slider1">
         <input type="radio" name="slides" checked id="slides_1"><input type="radio" name="slides" id="slides_2"><input type="radio" name="slides" id="slides_3"><input type="radio" name="slides" id="slides_4"><input type="radio" name="slides" id="slides_5"><ul class="banner_slide_bg"><li>
           
                   <div class="slider-info">
                  <div class="bs-slider-overlay1">
                     <h3 class="heading text-center mb-md-5 mb-4">Resize and Download Photo</h3>
                     <div class="row">
                        <div class="col-lg-6 contact-left">
                           @includeif('partials.message')
                           <div class="contact">
                             <form method="POST" action="{{route('resize.resize_photo')}}" enctype="multipart/form-data">
                                 @csrf
<div class="form-group">
    <label for="email">Select Photo:</label>
    <input type="file" accept="image/*" name="kimages" class="form-control" id="kimages">
  </div>
<div class="row">
   <div class="col-md-6">
       <div class="form-group">
    <label for="email">Width:</label>
    <input type="number" name="width" class="form-control" placeholder="i.e 650 pixels.." id="email">
  </div>
   </div>

    <div class="col-md-6">
       <div class="form-group">
    <label for="email">Height:</label>
    <input type="number" name="height" class="form-control" placeholder="i.e 450 pixels..." id="email">
  </div>
   </div>
</div>
 
  <div class="text-right"><button type="submit" class="btn btn-primary">Resize</button></div>
</form>
                             
@if(Session::has("save_photo"))
               
                  
                  @endif
                           </div>
                        </div>
                        <div class="col-lg-6 mt-lg-0 mt-4">
                           <div class="contact-right imgdiv">
                            @if(Session::has("save_photo"))
                             <img id="blah" src="{{Session::get('image_path')}}" class="myimage" />
                            @else
                        <img id="blah" src="{{asset('resize_assets/uploads/dummy.jpg')}}" class="myimage" />
                        @endif
                           </div>
                        </div>
                     </div>
                     <!--  -->
                      @if(Session::has("save_photo"))
                        <div class="row">
                      
                        <div class="col-lg-12 mt-lg-0 mt-4 text-center">
                           <div class="contact-right imgdiv">
                           <?php 

                            $widthh=Session::get('widthh');
                            $heightt=Session::get('heightt');
                            ?>
                             <img style="width:$widthh;height:$heightt;" src="{{Session::get('image_path')}}" />
                      <br><br>
                      <div class="text-center"><p>
                  <a href="{{Session::get('image_path')}}" class="btn btn-primary" download>Download Your Photo</a>
                </div>
                           </div>
                        </div>
                     </div>
                       @endif
                  </div>
               </div>

            </li>
            
           
           
           
         </ul>
   </section>

@endsection