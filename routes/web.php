<?php


// Route::get('resize_my_image','ResizeController@index')->name('resize.index');
// Route::post('resize_photo','ResizeController@resize_photo')->name('resize.resize_photo');
// Route::post('save_photo','ResizeController@save_photo')->name('resize.save_photo');
// // Route::get('/', function () {
//     return view('welcome');
// });


Route::get('login-or-register','FrontLoginController@login_register')->name('user.login_register')->middleware('guest');


// Common Routes

Route::get('cart_detail','IndexController@go_to_cart_detail')->name('go_to_cart_detail');
Route::get('contact','IndexController@thepetshop_contact_page')->name('thepetshop_contact_page');
Route::get('about','IndexController@thepetshop_about_page')->name('thepetshop_about_page');
Route::match(['get','post'],'/','IndexController@index')->name('shopvert.index');
Route::get('/product/{slug}','IndexController@search_about_category')->name('product.search_about_category');
Route::match(['get','post'],'/product/detail/{id}','ProductController@product_detail')->name('product.detail');
Route::get('/product/get/price','ProductController@get_price')->name('product.get_price');
Route::post('/user-login','AdminController@login')->name('user.login');
Route::post('/user-register','AdminController@register')->name('user.register');





Route::middleware(['auth'])->group(function(){

Route::post('account-update','IndexController@visiting_user_change_account_info_post')->name('visiting_user_change_account_info_post')->middleware("auth");
Route::match(['get','post'],'/checkout','ProductController@checkout')->name('user.checkout');
Route::match(['get','post'],'/order-review','ProductController@order_review')->name('user.order_review');
Route::post('place-order','ProductController@place_order')->name('user.place_order');
Route::get('thanks','ProductController@thanks')->name('user.thanks');
Route::get('account','UserController@account')->name('user.account');
Route::get('change-password','UserController@change_password')->name('user.change_password');
Route::get('change-address','UserController@change_address')->name('user.change_address');
Route::get('show_orders','UserController@show_orders')->name('user.show_orders');
Route::post('/coupon/apply','CoupenController@coupon_apply')->name('coupon.coupon_apply');

});







Route::get('/nothing',function(){
	return abort(404);
});

// Coupon Routes For User Side jab user coupon apply krta he us wakt ye controller or method chalta he.



// Login / Register k routes




// Cart Routes
Route::resource('cart','CartController');
Route::get('/cart/delete/{id}','CartController@delete_cart')->name('cart.delete');
Route::get('/cart/update/cart-items/{session_id}','CartController@update_cart')->name('cart.update_cart');
Route::get('/cart/increment-quantity/{id}','CartController@increment_quantity')->name('cart.increment_quantity');
Route::get('/cart/decrement-quantity/{id}','CartController@decrement_quantity')->name('cart.decrement_quantity');
Route::post ( 'thepetshop_charge_payment_in_order_review', 'IndexController@thepetshop_charge_payment_in_order_review')->name("thepetshop_charge_payment_in_order_review");

// Authentication Routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');







Route::get('/logout','AdminController@logout')->name('admin.logout');




















Route::prefix('admin')->middleware(['auth:web','ProtectAdmin'])->group(function(){
	// dashboard
	
Route::get('delete_order_by_admin/{id?}','AdminController@delete_order_by_admin')->name("delete_order_by_admin");
Route::get('bzu_thepetshop_change_order_status','AdminController@bzu_thepetshop_change_order_status')->name("bzu_thepetshop_change_order_status");
Route::post('lms_update_logged_in_user_profile_post','AdminController@lms_update_logged_in_user_profile_post')->name('lms_update_logged_in_user_profile_post');
Route::get('every_user_profile_front','AdminController@every_user_profile_front')->name("every_user_profile_front");
Route::post("lms_logged_in_user_change_password_post","AdminController@lms_logged_in_user_change_password_post")->name("lms_logged_in_user_change_password_post");
Route::get("lms_logged_in_user_change_password_front","AdminController@lms_logged_in_user_change_password_front")->name("lms_logged_in_user_change_password_front");
	Route::get('thepetshop_fyp_print_sale_report_front','AdminController@thepetshop_fyp_print_sale_report_front')->name('thepetshop_fyp_print_sale_report_front');
	Route::get('thepetshop_fyp_view_sale_report_front','AdminController@thepetshop_fyp_view_sale_report_front')->name('thepetshop_fyp_view_sale_report_front');
	Route::match(['get','post'],'','AdminController@dashboard')->name('admin.dashboard');

	// Products Routes
	Route::resource('product','ProductController');
	Route::match(['get','post'],'add-product-attributes/{id}','ProductController@add_attributes')->name('product.add_attributes');
	Route::match(['get','post'],'add-product-images/{id}','ProductController@add_images')->name('product.add_images');
	Route::post('/product/change-status','ProductController@change_status')->name('product.change_status');
	Route::post('/product/change-featured-products','ProductController@change_featured_products')->name('product.change_featured_products'); // jese status change honey k lye wesey same us milta he.
	Route::get('/product/delete-attribute/{id}','ProductController@delete_attribute')->name('product.delete_attribute');
	Route::post('/product/update-attributes/{id}','ProductController@update_attributes')->name('product.update_attributes');
	Route::get('/product/delete-product-image/{id}','ProductController@delete_product_image')->name('product.delete_product_image');
	Route::get('/product/delete-product-fimage/{id}','ProductController@delete_product_fimage')->name('product.delete_product_fimage');
	// Route::get('/product/show-product-fimage/{id}','ProductController@show_product_fimage')->name('product.show_product_fimage');




	// Category Routes 
	Route::resource('category','CategoryController');
	Route::post('/category/change-status','CategoryController@change_status')->name('category.change_status');
	Route::get('/product/delete-category-thumbnail/{id}','CategoryController@delete_category_thumbnail')->name('category.delete_category_thumbnail');

	// Coupen Routes
	Route::resource('coupon','CoupenController');
	Route::post('/coupon/change-status','CoupenController@change_status')->name('coupon.change_status');

	// Banner Routes
	Route::resource('banner','BannerController');
	Route::post('/banner/change-status/','BannerController@change_status')->name('banner.change_status');
	Route::get('/banner/delete-banner-image/{id}','BannerController@delete_banner_image')->name('banner.delete_banner_image');

	// User Routes
	Route::resource('user','UserController');
	Route::resource('role','RoleController');
	Route::resource('permission','PermissionController');

	// Orders show in admin side
	Route::get('/orders','OrderController@index')->name('admin.order.index');
	//  order ki full detail dikhaney k lye..
	Route::get('/order-detail/{id}','OrderController@detail')->name('admin.order.detail');
	
});
