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

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if($request->show=='all'):
    	$orders=Order::all();
        else:
        $orders=Order::where('order_status',$request->show)->get();
        endif;

    	return view('admin.orders.index',compact('orders'));
    }
    public function detail($id=null)
    {
    	$order=Order::find($id);
    	return view('admin.orders.detail',compact('order'));
    }
}
