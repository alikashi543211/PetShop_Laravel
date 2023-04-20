<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        $save=$user->roles()->sync($request->role);
         if($save)
        {
           return redirect()->route('user.index')->with('flash_message_success','user added successfully'); 
       }else
       {
         return redirect()->route('user.create')->with('flash_message_error','user added failed!');
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
    public function edit(User $user)
    {
        $roles=Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->role);
        $user->name=$request->name;
        $user->email=$request->email;
        $save=$user->save();
         if($save)
        {
           return redirect()->route('user.index')->with('flash_message_success','user updated successfully'); 
       }else
       {
         return redirect()->route('user.edit')->with('flash_message_error','user updated failed!');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $result=$user->delete();
        if($result)
        {
             Alert::success('Deleted Successfully', 'Success Message');
            return redirect()->back();
        }
    }

    public function account()
    {
        return view('shopvert.account');
    }
    
    public function change_password()
    {
        return view('shopvert.change_password');
    }
    public function change_address()
    {
        return view('shopvert.change_address');
    }
    public function show_orders()
    {
        $auth_user_id=Auth::user()->id;
        $orders=Order::where('user_id',$auth_user_id)->paginate(5);
        return view('shopvert.show_orders',compact('orders'));
    }
}
