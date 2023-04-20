<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\Product;
use Auth;
use App\Cart;
use Hash;
use App\User;

class IndexController extends Controller
{
//     public function (Request $request) {
//     \Stripe\Stripe::setApiKey ( 'sk_test_11V1wQTOlpTTkO7yjFu5wkHZ00oLfXrVL1' );
//     try {
//         \Stripe\Charge::create ( array (
//                 "amount" => 300 * 100,
//                 "currency" => "usd",
//                 "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
//                 "description" => "Test payment." 
//         ) );
//         Session::flash ( 'success-message', 'Payment done successfully !' );
//         return Redirect::back ();
//     } catch ( \Exception $e ) {
//         Session::flash ( 'fail-message', "Error! Please Try again." );
//         return Redirect::back ();
//     }
// }
      public function visiting_user_change_account_info_post(Request $request)
    {
        if(empty($request->confirm_password) || empty($request->old_password) || empty($request->new_password)):

    else:
        $password=Auth::user()->password;
  if(Hash::check($request->old_password,$password)):
            
        else:
            return redirect()->back()->with("flash_message_error","Old Password is Wrong..");
           endif;

         if($request->confirm_password==$request->new_password):
            
        else:
            return redirect()->back()->with("flash_message_error","New Password and Confirm Password Does Not Match..");
           endif;
    endif;
    $u=User::find(Auth::user()->id);
    if(empty($request->confirm_password) || empty($request->old_password) || empty($request->new_password)):

else:
    // dd("Ok");
    $u->password=bcrypt($request->new_password);
endif;
    
    $u->email=$request->email;
    $u->name=$request->name;
    $u->save();
    return redirect()->back()->with("flash_message_success","Profile Updated Successfully...");
   
    }
    public function thepetshop_contact_page()
    {
        return view("shopvert.thepetshop_contact_page");
    }
    public function thepetshop_about_page()
    {
        return view("shopvert.thepetshop_about_page");
    }
      public function go_to_cart_detail()
    {
        $session_id=0;
        $user_email=Auth::user()->email;
        $user_cart=Cart::where('user_email',$user_email)->get();
        return view('shopvert.cart_index',compact('user_cart','session_id'));
    }
    
    public function parent_category_total_products()
    {
         $categories=Category::with('child_categories')->where('parent_id',0)->where('status','1')->get();
         foreach($categories as $cat)
                {
                    foreach($cat->child_categories as $child_cat)
                    {
                        if($child_cat->status=='1')
                        {
                             $child_cat_ids[]=$child_cat->id;
                        }
                    }
                    $total_products_of_parent[]=Product::whereIn('category_id',$child_cat_ids)->count();
                    $child_cat_ids=array();
                }
                return $total_products_of_parent;
    }
    
    public function index()
    {
        $total_products_of_parent=$this->parent_category_total_products();
    	$banners=Banner::orderBy('sort_order','asc')->get();
        $featured_products=Product::where('featured_products',1)->get();
    	$products=Product::paginate(9);
    	return view('shopvert.index',compact('banners','total_products_of_parent','products','featured_products'));
    }



    
    public function search_about_category($slug=null)
    {
        // check kro category ye mojood he ya nahi.
        $category_count=Category::where('slug',$slug)->count();
        if($category_count==0)
        {
            abort(404);
        }

        // check kro category jo mojood he Status enable b he ya nahi.
        $category_status=Category::where('slug',$slug)->where('status','1')->count();
        if($category_status==0)
        {
            abort(404);
        }
        $category=Category::where('slug',$slug)->first();

        if($category->parent_id==0)
        {
            foreach($category->child_categories as $child_cat)
                {
                    $child_cat_ids[]=$child_cat->id;
                }
                $products=Product::whereIn('category_id',$child_cat_ids)->paginate(9); // parent k tamaam products get
        }else{
             // $products=$category->products;
            $products=Product::where("category_id",$category->id)->paginate(9);
        }

        $categories=Category::with('child_categories')->where('parent_id',0)->where('status','1')->get();
        foreach($categories as $cat)
                {
                    foreach($cat->child_categories as $child_cat)
                    {
                        if($child_cat->status=='1')
                        {
                             $child_cat_ids[]=$child_cat->id;
                        }
                    }
                    $total_products_of_parent[]=Product::whereIn('category_id',$child_cat_ids)->count();
                }
        $banners=Banner::orderBy('sort_order','asc')->get();
       $featured_products=Product::where('featured_products',1)->get();
        return view('shopvert.index',compact('banners','categories','total_products_of_parent','products','slug','featured_products'));
    }
}
