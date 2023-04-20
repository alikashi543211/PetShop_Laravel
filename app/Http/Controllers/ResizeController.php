<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use Gate;
use Auth;
use Session;

class ResizeController extends Controller
{
    public function index()
    {
    	return view("resize.index");
    }
    public function resize_photo(Request $request)
    {
    	       if($request->hasFile('kimages'))
        {
            $img_tmp=$request->file('kimages');
            if($img_tmp->isValid()){
                // kimages k path ka code
                $filename = sprintf("size_%s.",rand(1,1000)).$request->width."_by_".$request->height."_".$request->file('kimages')->getClientOriginalName();
$height = Image::make($img_tmp)->height();
$width = Image::make($img_tmp)->width();

               
                
                $img_path='uploads/resizes/'.$filename;
                // kimages resize kren
                Image::make($img_tmp)->resize($request->width,$request->height)->save($img_path);
                Session::flash("success","Your photo has been resized Successfully.");
                Session::flash("image_path",$img_path);
                Session::flash("save_photo","save your photo");
                Session::flash("widthh",$request->width);
                Session::flash("heightt",$request->height);
                Session::flash("filename",$request->filename);
    } 
        }
       return redirect()->route("resize.index");
    }

    public function save_photo()
    {
    	if(Session::has())
    	return view("resize.save_photo");
    }

}
