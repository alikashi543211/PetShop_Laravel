<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\DeliveryAddress;
use App\ShippingAddress;
use App\Country;
use App\Product;
use App\User;
use App\Cart;
use App\Category;
use App\Product_Attribute;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use Gate;
use Auth;
use Session;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Product::class,'product');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function parent_categories()
    {
        return Category::where('parent_id',0)->get();
    }
    public function create()
    {
        // $response=Gate::inspect('product.create');
        // if($response->denied())
        // {
        //     return redirect()->back()->with('flash_message_error',$response->message());
        // }
        $categories=$this->parent_categories();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
    'name'=>'required|string',
    'description'=>'required',
    'price'=>'required|numeric',
    'stock_in'=>'required|numeric',
  ]);
       if(empty($request->category_id)):
        Session::flash("category_id","Select Category Required");
        return redirect()->back();
       endif;
        $product=new Product();
        $product->name=$request->name;
        $product->code=$request->code;
        $product->color=$request->color;
        $product->description=$request->description;
        if($request->care!='')
        {
           $product->care=$request->care; 
       }else{
        $product->care='';
       }
        
        $product->price=$request->price;
        $product->category_id=$request->category_id;
        // upload image
        if($request->hasFile('image'))
        {
            $img_tmp=$request->file('image');
            if($img_tmp->isValid()){
                // image k path ka code
                $filename = sprintf("products_%s.",rand(1,1000)).$request->file('image')->getClientOriginalName();
                $img_path='uploads/products/'.$filename;
                // image resize kren
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->image=$filename;
    } 
        }
        else
        {
           $product->image="dummy.png";
        }
        $product->stock_in=$request->stock_in;
        $product->stock_remaining=$request->stock_in;
        $save=$product->save();
        if($save)
        {
           return redirect()->route('product.index')->with('flash_message_success','Product added successfully'); 
       }else
       {
         return redirect()->route('product.create')->with('flash_message_error','Product added failed!');
       }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function edit(Product $product)
    {
        // $response=Gate::inspect('product.update');
        // if($response->denied())
        // {
        //     return redirect()->back()->with('flash_message_error',$response->message());
        // }
        // if(Gate::denies('allow-edit'))
        // {
        //     return redirect()->back()->with('flash_message_error','You are Not Authorized to Edit Product!');
        // }
        $categories=$this->parent_categories();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      $request->validate([
    'name'=>'required|string',
    'description'=>'required',
    'price'=>'required|numeric',
    'stock_in'=>'required|numeric',
  ]);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->category_id=$request->category_id;
        $product->stock_in=$request->stock_in;
        // upload image
        if($request->hasFile('image'))
        {
            $img_tmp=$request->file('image');
            if($img_tmp->isValid()){
                // image k path ka code
                $filename = sprintf("products_%s.",rand(1,1000)).$request->file('image')->getClientOriginalName();
                $img_path='uploads/products/'.$filename;
                // image resize kren
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->image=$filename;
                $image_path="uploads/products/";
                if($request->current_image!='')
                {
                    if(file_exists($image_path.$request->current_image))
        {
            unlink($image_path.$request->current_image);
        }
                }
    } 
        }
        else
        {
           $product->image=$request->current_image;
        }
        $save=$product->save();
        if($save)
        {
           return redirect()->route('product.index')->with('flash_message_success','Product updated successfully'); 
       }else
       {
         return redirect()->route('product.edit')->with('flash_message_error','Product updated failed!');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //  $response=Gate::inspect('product.delete');
        // if($response->denied())
        // {
        //     return redirect()->back()->with('flash_message_error',$response->message());
        // }
// if(Auth::user()->can('allowDelete'))
//         {
        $image_path="uploads/products/";
        if(file_exists($image_path.$product->image))
        {
            unlink($image_path.$product->image);
        }
        $result=$product->delete();
        if($result)
        {
             Alert::success('Deleted Successfully', 'Success Message');
            return redirect()->back();
        }
   // }
    }

    public function change_status(Request $request)
    {
        $id=$request->id;
        $product=Product::find($id);
        $product->status=$request->status;
        $product->save();
    }

     public function product_detail($id=null)
    {
        $product=Product::find($id);
        $featured_products=Product::where('featured_products',1)->get();
        return view('shopvert.product_detail',compact('product','featured_products'));   
    }


    public function add_attributes(Request $request,$id=null)
    {
       
        if($request->isMethod('POST'))
        {
            // dd($request->all());
            foreach ($request->sku as $key => $sku) {
                $check_one=Product_Attribute::where('product_id',$id)->where('size',$request->size[$key])->count();
                if($check_one>0)
                {
                    return redirect()->route('product.add_attributes',$id)->with('flash_message_error',$request->size[$key].' Size is already taken.');
                }
                $product_attribute=new Product_Attribute();
                $product_attribute->product_id=$id;
                $product_attribute->sku=$request->sku[$key];
                $product_attribute->size=$request->size[$key];
                $product_attribute->price=$request->price[$key];
                $product_attribute->stock=$request->stock[$key];
                $save=$product_attribute->save();
            }
             if($save)
        {
           return redirect()->route('product.add_attributes',$id)->with('flash_message_success','Product Attributes added successfully'); 
       }else
       {
         return redirect()->route('product.add_attributes',$id)->with('flash_message_error','Product Attributes failed to add!');
       }
        }
        else
        {
             $product=Product::find($id);
             $attributes=$product->attributes;
             return view('admin.products.add_attributes',compact('product','attributes'));

        }
    }

    public function delete_attribute($id=null)
    {
        $result=Product_Attribute::find($id)->delete();
        if($result)
        {
           Alert::success('Deleted Successfully', 'Success Message');
            return redirect()->back();
        }
    }

    public function update_attributes(Request $request,$id=null)
    {
                $product_attributes=Product::find($id)->attributes;

                foreach($product_attributes as $key => $product_attribute) {
                $product_attribute->sku=$request->sku[$key];
                $product_attribute->size=$request->size[$key];
                $product_attribute->price=$request->price[$key];
                $product_attribute->stock=$request->stock[$key];
                $save=$product_attribute->save();   
                }
             if($save)
        {
           return redirect()->route('product.add_attributes',$id)->with('flash_message_success','Product Attributes added successfully'); 
       }else
       {
         return redirect()->route('product.add_attributes',$id)->with('flash_message_error','Product Attributes failed to add!');
       }
    }

    public function add_images(Request $request,$id=null)
    {
        if($request->isMethod('POST'))
        {
            // dd($request->all());
            // upload image
        if($request->hasFile('image'))
        {
            foreach ($request->file('image') as $img_tmp) {
                if($img_tmp->isValid()){
                // image k path ka code
                $filename = sprintf("products_%s.",rand(1,1000)).$img_tmp->getClientOriginalName();
                $img_path='uploads/products/'.$filename;
                // image resize kren
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $image=new ProductImage();
                $image->image=$filename;
                $image->product_id=$id;
                $save=$image->save();

    }
    
}
if($save)
{
    return redirect()->route('product.add_images',$id)->with('flash_message_success','Product Images added successfully');
}else
{
    return redirect()->route('product.add_images',$id)->with('flash_message_error','Product Images failed to add!');
}
            
        } else
        {
            return redirect()->route('product.add_images',$id)->with('flash_message_error','Please Choose image firest!!');
        }
    }
        else
            $product=Product::find($id);
            $images=ProductImage::where('product_id',$id)->get();
            return view('admin.products.add_images',compact('product','images'));
    }


    public function delete_product_image($id=null)
    { 
        $product_image=ProductImage::find($id); // image ka record find kiya
        $image_path="uploads/products/"; // path jahan pr images save hen
        if(file_exists($image_path.$product_image->image)) // agr us path pr current naam ki image mojood he.
        {
            unlink($image_path.$product_image->image); // to image ko wohaan se delete kr de.
        }
        $result=$product_image->delete(); // phir database se us image waali row delete kr de.
        if($result)
        {
             Alert::success('Deleted Successfully', 'Success Message');
             return redirect()->back();
        }
    }

    public function delete_product_fimage($id=null)
    {
        $product=Product::find($id);
        $image_path="uploads/products/"; // path jahan pr images save hen
        if(file_exists($image_path.$product->image)) // agr us path pr current naam ki image mojood he.
        {
            unlink($image_path.$product->image); // to image ko wohaan se delete kr de.
        }
        $product->image=""; // phir database se us image waali row delete kr de.
        $result=$product->save();
        if($result){
         return redirect()->back()->with('flash_message_error','Product Image Deleted Successfully !!');   
        }
    }

    public function show_product_fimage($id=null)
    {

    }


    public function change_featured_products(Request $request)
    {
        // ye method status se bilkul same he jesey status he wesey ye he sirf naam is ka featured_products he.
        $id=$request->id;
        $product=Product::find($id);
        $product->featured_products=$request->featured_products;
        $product->save();
    }

    public function get_price(Request $request)
    {
        $idSize=$request->idSize;
        $idSize=explode('-',$idSize);
        $id=$idSize[0];
        $size=$idSize[1];
        $product_attribute=Product_Attribute::where('product_id',$id)->where('size',$size)->first();
        echo $product_attribute->price;
    }


    public function checkout(Request $request)
    {
        if($request->isMethod("POST"))
        {
            if(isset(Auth::user()->delivery_address))
            {
            //dd($request->all());
                // update record
            Auth::user()->delivery_address->user_id=Auth::user()->id;
            Auth::user()->delivery_address->user_email=Auth::user()->email;
            Auth::user()->delivery_address->name=$request->billing_name;
            Auth::user()->delivery_address->address=$request->billing_address;
            Auth::user()->delivery_address->name=$request->billing_name;
            Auth::user()->delivery_address->city=$request->billing_city;
            Auth::user()->delivery_address->state=$request->billing_state;
            Auth::user()->delivery_address->country=$request->billing_country;
            Auth::user()->delivery_address->mobile=$request->billing_mobile;
            Auth::user()->delivery_address->zip=$request->billing_zip;
            Auth::user()->delivery_address->save();
        } else {
             //dd($request->all());
            // add record
            $billing_address=new DeliveryAddress();
            $billing_address->user_id=Auth::user()->id;
            $billing_address->user_email=Auth::user()->email;
            $billing_address->name=$request->billing_name;
            $billing_address->address=$request->billing_address;
            $billing_address->city=$request->billing_city;
            $billing_address->state=$request->billing_state;
            $billing_address->country=$request->billing_country;
            $billing_address->mobile=$request->billing_mobile;
            $billing_address->zip=$request->billing_zip;
            $billing_address->save();
        }
        if(isset(Auth::user()->shipping_address))
        {
            // update record
            Auth::user()->shipping_address->user_id=Auth::user()->id;
            Auth::user()->shipping_address->user_email=Auth::user()->email;
            Auth::user()->shipping_address->name=$request->shipping_name;
            Auth::user()->shipping_address->address=$request->shipping_address;
            Auth::user()->shipping_address->city=$request->shipping_city;
            Auth::user()->shipping_address->state=$request->shipping_state;
            Auth::user()->shipping_address->country=$request->shipping_country;
            Auth::user()->shipping_address->mobile=$request->shipping_mobile;
            Auth::user()->shipping_address->zip=$request->shipping_zip;
            Auth::user()->shipping_address->save();
} else
{
    // add record
           $shipping_address=new ShippingAddress();
            $shipping_address->user_id=Auth::user()->id;
            $shipping_address->user_email=Auth::user()->email;
            $shipping_address->name=$request->shipping_name;
            $shipping_address->address=$request->shipping_address;
            $shipping_address->city=$request->shipping_city;
            $shipping_address->state=$request->shipping_state;
            $shipping_address->country=$request->shipping_country;
            $shipping_address->mobile=$request->shipping_mobile;
            $shipping_address->zip=$request->shipping_zip;
            $shipping_address->save();
}
            return redirect()->route('user.order_review');

        }else
        {
            $countries=Country::all();
            $chk=Cart::where("user_email",Auth::user()->email)->count();
            if($chk==0):
                Session::flash("flash_message_error","Please Add At Least 1 Product Into Cart Before Checkout");
                return redirect()->back();
            endif;
            if(isset(Auth::user()->delivery_address) && isset(Auth::user()->shipping_address))
            {
                return view("shopvert.edit_checkout",compact("countries"));
            }else
            {
                return view("shopvert.checkout",compact("countries"));
            } 
        }
    }

    public function order_review(Request $request)
    {
        if($request->isMethod("POST"))
        {

        }else
        {
            // $session_id=Session::get('session_id');
            $session_id=0;
            $user_email=Auth::user()->email;
        $user_cart=Cart::where('user_email',$user_email)->get();
        return view('shopvert.order_review',compact('user_cart','session_id'));
        
        }
    }

    public function place_order(Request $request)
    {
        // dd($request->all());
        $order=new Order();
        $order->user_id=Auth::user()->id;
        $order->user_email=Auth::user()->email;
        $order->name=Auth::user()->shipping_address->name;
        $order->address=Auth::user()->shipping_address->address;
        $order->city=Auth::user()->shipping_address->city;
        $order->state=Auth::user()->shipping_address->state;
        $order->zip=Auth::user()->shipping_address->zip;
        $order->country=Auth::user()->shipping_address->country;
        $order->mobile=Auth::user()->shipping_address->mobile;
        $order->shipping_charges=Auth::user()->shipping_address->shipping_charges ?? '';
        $order->address=Auth::user()->shipping_address->address;
        $order->coupon_amount=Session::get('coupon_amount') ?? '';
        $order->coupon_code=Session::get('coupon_code') ?? '';
        $order->order_status="pending";
        $order->payment_method=$request->payment_method;
        $order->grand_total=$request->grand_total;
        $order->save();
        $order_id=$order->id;
        //dd($order->id);
        // $session_id=Session::get('session_id');
        $user_email=Auth::user()->email;
        $user_cart=Cart::where('user_email',$user_email)->get();
        foreach($user_cart as $cart)
        {
            $orderProduct=new OrderProduct();
            $orderProduct->user_id=Auth::user()->id;
            $orderProduct->order_id=$order_id;
            $orderProduct->product_id=$cart->product_id;
            $productt=Product::find($orderProduct->product_id);
            $orderProduct->product_code=$cart->product_code;
            $orderProduct->product_name=$cart->product_name;
            $orderProduct->product_size=$cart->size ?? '';
            $orderProduct->product_color=$cart->product_color ?? '';
            $orderProduct->product_price=$cart->price;
            $orderProduct->product_qty=$cart->quantity;
            $productt->stock_in=$productt->stock_in-$cart->quantity;
            $productt->stock_out=$productt->stock_out+$cart->quantity;
            $productt->save();
            $orderProduct->save();
        }
        Session::flash('order_id',$order_id);
        Session::flash('grand_total',$request->grand_total);
        if($request->payment_method=='COD' || $request->payment_method=='Stripe')
        {
            return redirect()->route('user.thanks');
        }
    }

    public function thanks()
    {
        Cart::where("user_email",Auth::user()->email)->delete();
        return view('shopvert.thanks');
    }
}
