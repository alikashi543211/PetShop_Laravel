<?php

namespace App\Http\Controllers;

use App\Coupen;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class CoupenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=Coupen::all();
        return view('admin.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon=new Coupen();
        $coupon->coupen_code=$request->coupen_code;
        $coupon->amount=$request->amount;
        $coupon->amount_type=$request->amount_type; 
        $coupon->expiry_date=$request->expiry_date; 
        $save=$coupon->save();
         if($save)
        {
           return redirect()->route('coupon.index')->with('flash_message_success','Coupon added successfully'); 
       }
       else
       {
        return redirect()->route('coupon.index')->with('flash_message_error','Coupon add Failed !!'); 
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupen  $coupen
     * @return \Illuminate\Http\Response
     */
    public function show(Coupen $coupen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupen  $coupen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupen=Coupen::find($id);
        return view('admin.coupons.edit',compact('coupen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupen  $coupen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $coupon=Coupen::find($id);
        $coupon->coupen_code=$request->coupen_code;
        $coupon->amount=$request->amount;
        $coupon->amount_type=$request->amount_type; 
        $coupon->expiry_date=$request->expiry_date; 
        $save=$coupon->save();
         if($save)
        {
           return redirect()->route('coupon.index')->with('flash_message_success','Coupon added successfully'); 
       }
       else
       {
        return redirect()->route('coupon.index')->with('flash_message_error','Coupon add Failed !!'); 
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupen  $coupen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=Coupen::find($id)->delete();
        if($result)
        {
             Alert::success('Deleted Successfully', 'Success Message');
            return redirect()->back();
        }
    }

    public function change_status(Request $request)
    {
        $id=$request->id;
        $coupon=Coupen::find($id);
        $coupon->status=$request->status;
        $coupon->save();
    }
    public function coupon_apply(Request $request)
    {
        $count=Coupen::where('coupen_code',$request->coupen_code)->count();
        if($count==0)
        {
            return redirect()->back()->with('flash_message_error','Coupon Does not Exist !!'); 
        }
        $check_status=Coupen::where('coupen_code',$request->coupen_code)->where('status',1)->count();
        if($check_status==0)
        {
            return redirect()->back()->with('flash_message_error','Coupon is not Active !!'); 
        }
        $coupon=Coupen::where('coupen_code',$request->coupen_code)->first();
        $coupon_code=$coupon->code;
        $current_date=date('Y-m-d');
        if($coupon->expiry_date<$current_date)
        {
            return redirect()->back()->with('flash_message_error','Coupon has been expired !!'); 
        }
        $session_id=Session::get('session_id');
        $user_cart=Cart::where('session_id',$session_id)->get();
        $total_amount=0;
        foreach($user_cart as $key => $cart) {
            $total_amount=$total_amount+($cart->quantity*$cart->price);
        }
        if($coupon->amount_type=='Fixed')
        {
            $coupon_amount=$coupon->amount;
             
        }else{
            $coupon_amount=$total_amount*($coupon->amount/100);   
        }
       
        Session::put('coupon_amount',$coupon_amount);
        Session::put('coupon_code',$coupon_code);
        return redirect()->back()->with('flash_message_success','Coupon Code has been applied Successfully !');
    }
}
