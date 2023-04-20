<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Cart;
use App\Product;
use Session;
use Auth;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $session_id=Session::get('session_id');
        $session_id=0;
        $user_email=Auth::user()->email;
        $user_cart=Cart::where('user_email',$user_email)->get();
        return view('shopvert.cart_index',compact('user_cart','session_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->flush_coupon();
        // explode ho raha he.
        // $idSize=explode('-',$request->size);
        // $product_size=$idSize[1];

        // is me session bn ra he agr nahi he
        // $session_id=Session::get('session_id');
        // if(isset($session_id))
        // { }else{
        // $session_id=Str::random(40);
        // Session::put('session_id',$session_id); // yahaan session me value save ho rahi he.
        // }
$user_email=Auth::user()->email;
$product=Product::find($request->product_id);
if($product->stock_in=="0"):
    Session::flash("flash_message_error",$product->name." Has been Sold and Stock is 0");
    return redirect()->back();
endif;
if($request->quantity>$product->stock_in):
    Session::flash("flash_message_error",$product->name."Contains Only ".$product->stock_in." Quantity In Stock");
    return redirect()->back();
endif;
        // check already exists or not
        $count=Cart::where('product_id',$request->product_id)->where('user_email',$user_email)->count();
        if($count>0)
        {
            return redirect()->back()->with('flash_message_error','Product Already Exist.');
        }
        $cart=new Cart();
        $cart->product_id=$request->product_id;
        $cart->product_name=$request->product_name;
        $cart->user_email=$user_email;
        $cart->product_color="no-color";
        $cart->size=0;
        $cart->price=$request->price;
        $cart->quantity=abs($request->quantity);
        $cart->product_code=$request->product_code;
        $save=$cart->save();
        // $product->stock_in=$product->stock_in-$request->quantity;
        // $product->stock_out=$product->stock_out+$request->quantity;
        // $product->save();
        if($save)
        {
            return redirect()->route('cart.index')->with('flash_message_success','Product has been added successfully into the Cart.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carts=Cart::where('session_id',$id)->get();
        foreach($carts as $key=>$cart)
        {
           $cart->quantity=$request->quantity[$key];
           $save=$cart->save();
        }
        if($save)
        {
            return redirect()->back()->with('flash_message_success','Cart has been updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        // $cart->delete();
        // return redirect()->back()->with('flash_message_error','Product has been deleted From the Cart.');
    }
    public function delete_cart($id)
    {
        $this->flush_coupon();
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('flash_message_success','Product has been deleted From the Cart.');
    }

    public function decrement_quantity($id)
    {
        $this->flush_coupon();
        $cart=Cart::where('id',$id)->decrement('quantity',1);
        if($cart)
        {
            return redirect()->back()->with('flash_message_success','Cart has been updated successfully.');
        }
    }
    public function increment_quantity($id)
    {
        $chk=Cart::find($id);
        $inc_quantity=$chk->quantity+1;
        $product=Product::find($chk->product_id);
        if($inc_quantity>$product->stock_in):
            Session::flash("flash_message_error","Stock is Not Available More Than ".$product->stock_in);
            return redirect()->back();
        endif;
        $this->flush_coupon();
        $cart=Cart::where('id',$id)->increment('quantity',1);
        if($cart)
        {
            return redirect()->back()->with('flash_message_success','Cart has been updated successfully.');
        }
    }
    public function flush_coupon()
    {
        Session::forget('coupon_amount');
        Session::forget('coupon_code');
    }
}
