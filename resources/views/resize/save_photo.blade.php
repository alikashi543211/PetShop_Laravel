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
                          
                           <div class="contact">
@if(Session::has("image_path"))
                  <a href="{{Session::get('image_path')}}" class="btn btn-primary" download>Download Your Photo</a>
                  @endif
                           </div>
                        </div>
                        <div class="col-lg-6 mt-lg-0 mt-4">
                           <div class="contact-right imgdiv">
                        <img id="blah" src="{{asset('resize_assets/uploads/dummy.jpg')}}" class="myimage" />
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </li>
            
           
           
           
         </ul>
   </section>

@endsection