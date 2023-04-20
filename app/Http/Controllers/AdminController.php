<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Session;
use Hash;
use DB;
use App\Order;
use App\Product;
use App\OrderProduct;
// use Session;
class AdminController extends Controller
{
    public function __construct()
{
    // $this->middleware('guest');
}
public function thepetshop_fyp_print_sale_report_front(Request $request)
{
     if(isset($request->get_report)):
        $sreport=$this->find_report($request);
        Session::flash("report",$sreport);
         return view("show_report_view");
     else:
        return redirect()->back();
     endif;
}
public function find_report($request)
{
 $orders=Order::all();
        $products=Product::all();
        foreach($products as $p):
             $sreport[$p->name]['qty']=0;
         $sreport[$p->name]['total_amount']=0;
            foreach($orders as $order):
                // $result=0;
                $count=OrderProduct::where("order_id",$order->id)->count();
                if($count==0):
                    continue;
                else:
                     $result=explode(" ",$order->created_at);
                $odate=$result[0];
                if($odate>=$request->starting_date && $odate<=$request->ending_date):

                else:
                    continue;
                endif;
                endif;

                $order_products=OrderProduct::where("order_id",$order->id)->get();
                // dd($order_products);
                // dd($order_products);
                foreach($order_products as $op):
                    if($p->id==$op->product_id):
                        $sreport[$p->name]['qty']=$sreport[$p->name]['qty']+$op->product_qty;
                        $sreport[$p->name]['total_amount']=$sreport[$p->name]['total_amount']+$op->product_price;
                    endif;
                endforeach;
            endforeach;
        endforeach;
        // $s=$sreport;
        // dd($s);
        return $sreport;
}

public function thepetshop_fyp_view_sale_report_front(Request $request)
{
    if(isset($request->get_report)):
        $sreport=$this->find_report($request);
        Session::flash("report",$sreport);
        if(isset($request->print_report)):
            return view("show_report_view");
        else:
         return view("admin.thepetshop_fyp_view_sale_report_front");
     endif;
    else:
      return view("admin.thepetshop_fyp_view_sale_report_front");
    endif;
}
public function delete_order_by_admin(Request $request,$id)
{
    $order=Order::find($id)->delete();
    
    Session::flash("flash_message_success","Order Deleted Successfully..");
            return redirect()->back();
}

public function bzu_thepetshop_change_order_status(Request $request)
{
    $order=Order::find($request->order_id);
    $order->order_status=$request->status;
    $order->save();
    Session::flash("flash_message_success","Order Status Updated Successfully..");
            return redirect()->back();
}
    public function lms_update_logged_in_user_profile_post(Request $request)
    {
        // $r=Helpers::lms_update_logged_in_user_profile_post($request->logged_in_user_id,$request->name,$request->email);
        
        $user=User::find($request->logged_in_user_id);
$user->email=$request->email;
$user->name=$request->name;
$save=$user->save();
if($save):
 Session::flash("flash_message_success","Profile Updated Successfully..");
            return redirect()->route("every_user_profile_front");
else:
    Session::flash("flash_message_error","There is something error to update profile...");
            return redirect()->route("every_user_profile_front");
    endif;
    }
      public function every_user_profile_front()
    {
        return view("admin.every_user_profile_front");
    }
  public function lms_logged_in_user_change_password_post(Request $request)
    {
           $password=Auth::user()->password;
  if(Hash::check($request->old_password,$password)):
            $user=User::find(Auth::user()->id);
    $user->password=Hash::make($request->new_password);
    $save=$user->save();
     return redirect()->back()->with("flash_message_success","Password Changed Successfully..");
        else:
             return redirect()->back()->with("flash_message_error","Old Password doesn't match.");
           endif;
    }
public function lms_logged_in_user_change_password_front()
    {
        return view("admin.lms_logged_in_user_change_password_front");
    }
    public function login(Request $request)
    {
            // $findUser=User::where('email',$request->username)->first();
            // $findRole=Role::select('id')->where('name','user')->first();
            //dd($findUser->roles->pluck('id')->contains($findRole->id));
            // if($findUser->roles->pluck('id')->contains($findRole->id))
            // {
            //   return redirect()->route('admin')->with('flash_message_error','Invalid Username or Password');  
            // }
    		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                if(Auth::user()->hasRole('user')==true)
                {
                    return redirect()->route('user.account')->with('flash_message_success','Every thing is Correct');
                }
                if(Auth::user()->hasAnyRole(['Super Admin','Admin']))
                {
                    return redirect()->route('admin.dashboard')->with('flash_message_success','Every thing is Correct');
                }
    		}else{
                Session::flash('email',$request->email);
    			return redirect()->route('user.login_register')->with('flash_message_error','Invalid Username or Password');
    		}
    	
    }

    public function register(Request $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();  
        $userRole=Role::where('name','user')->first();
        $save=$user=$user->roles()->sync($userRole);
       
        Session::flash('r','Registered!!');
            if($save)
        {
           return redirect()->back()->with('flash_message_success','You have Been Registered successfully Now Login!!'); 
       }else
       {
          return redirect()->back()->with('flash_message_error','Your Account Created Failed!!'); 
       }

    }

    public function dashboard()
    {
    	return view('admin.dashboard');
    }
    public function logout(Request $request)
    {
        if(isset($request->user)):
       // Cart::where("user_email",Auth::user()->email)->delete();
    endif;
    	 Session::flush();
    	 return redirect()->route('user.login_register')->with('flash_message_success','Logged out Successfully!');
    }
    
}
