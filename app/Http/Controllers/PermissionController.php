<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=Permission::all();
        return view('admin.permissions.index',compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
         'name'=>'required|max:50|unique:permissions',
         'for'=>'required',
        ]);
       // dd($request->all());
        $permission=new Permission;
        $permission->name=$request->name;
        $permission->for=$request->for;
        $save=$permission->save();
        if($save)
        {
           return redirect()->route('permission.index')->with('flash_message_success','permission added successfully'); 
       }else
       {
         return redirect()->route('permission.create')->with('flash_message_error','permission added failed!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
         $this->validate($request,[
       'name'=>'required|max:50',
        ]);
        $permission->name=$request->name;
        $permission->for=$request->for;
        $save=$permission->save();
        if($save)
        {
           return redirect()->route('permission.index')->with('flash_message_success','permission added successfully'); 
       }else
       {
         return redirect()->route('permission.create')->with('flash_message_error','permission added failed!');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $result=$permission->delete();
        if($result)
        {
             Alert::success('Deleted Successfully', 'Success Message');
            return redirect()->back();
        }

    }
}
