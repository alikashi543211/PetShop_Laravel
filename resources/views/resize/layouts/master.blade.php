@include("resize.layouts.header")
<div class="content">
   <div class="container">
   @yield("main_content")
  <!-- //banner --><!-- footer --><section class="foooter-section pt-3 pb-5 position-relative"><div class="d-md-flex justify-content-between footer-inner">
         <!-- social icons-->
         <ul class="w3layouts_social_list list-unstyled"><li>
               <a href="#" class="w3pvt_facebook">
                  <span class="fa fa-facebook-f"></span>
               </a>
            </li>
            <li class="mx-2">
               <a href="#" class="w3pvt_twitter">
                  <span class="fa fa-twitter"></span>
               </a>
            </li>
            <li>
               <a href="#" class="w3pvt_dribble">
                  <span class="fa fa-dribbble"></span>
               </a>
            </li>
            <li class="ml-2">
               <a href="#" class="w3pvt_google">
                  <span class="fa fa-google-plus"></span>
               </a>
            </li>
         </ul><!-- //social icons--><!-- copyright -->
         @include("resize.layouts.footer")
