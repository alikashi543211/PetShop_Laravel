<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::all();
        return view('admin.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner=new Banner();
        $banner->name=$request->name;
        $banner->sort_order=$request->sort_order;
        $banner->content=$request->content;
        $banner->link=$request->link;
        // upload image
        if($request->hasFile('image'))
        {
            $img_tmp=$request->file('image');
            if($img_tmp->isValid()){
                // image k path ka code
                $filename = sprintf("banners_%s.",rand(1,1000)).$request->file('image')->getClientOriginalName();
                $img_path='uploads/banners/'.$filename;
                // image resize kren
                Image::make($img_tmp)->resize(1920,1001)->save($img_path);
                $banner->image=$filename;
        }
    }
    $banner->text_style=$request->text_style;
    $save=$banner->save();
    if($save)
        {
           return redirect()->route('banner.index')->with('flash_message_success','Banner added successfully'); 
       }else
       {
         return redirect()->route('banner.index')->with('flash_message_error','Banner added failed!');
       }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->name=$request->name;
        $banner->sort_order=$request->sort_order;
        $banner->content=$request->content;
        $banner->link=$request->link;
        // upload image
        if($request->hasFile('image'))
        {
            $img_tmp=$request->file('image');
            if($img_tmp->isValid()){

                // image k path ka code
                $filename = sprintf("banners_%s.",rand(1,1000)).$request->file('image')->getClientOriginalName();
                $img_path='uploads/banners/'.$filename;
                // image resize kren
                Image::make($img_tmp)->resize(1920,1001)->save($img_path);
                $banner->image=$filename;
                // Delete Old Image From Folder
        if($request->current_image!='dummy.png')
        {
            $image_path="uploads/banners/";
              if(file_exists($image_path.$request->current_image))
        {
            unlink($image_path.$request->current_image);
        }
        }
    }
    } else
    {
        $banner->image=$request->current_image;
    }
    $banner->text_style=$request->text_style;
    $save=$banner->save();
    if($save)
        {
           return redirect()->route('banner.index')->with('flash_message_success','Banner updated successfully'); 
       }else
       {
         return redirect()->route('banner.edit',$banner->id)->with('flash_message_error','Banner updated failed!');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $image_path="uploads/banners/";
        if($banner->image!='dummy.png')
        {
              if(file_exists($image_path.$banner->image))
        {
            unlink($image_path.$banner->image);
        }
        }
          $result=$banner->delete();
        if($result)
        {
             Alert::success('Deleted Successfully', 'Success Message');
            return redirect()->back();
        }
    }

    public function change_status(Request $request)
    {
        $id=$request->id;
        $banner=Banner::find($id);
        $banner->status=$request->status;
        $banner->save();
    }

    public function delete_banner_image($id=null)
    {
        $banner=Banner::find($id);
        $image_path="uploads/banners/";
        if($banner->image!='dummy.png'){

            if(file_exists($image_path.$banner->image)){
                unlink($image_path.$banner->image);
            }
        }
        $banner->image="dummy.png";
        $result=$banner->save();
        if($result){
             return redirect()->back()->with('flash_message_error','Banner Image Deleted Successfully !!');
        }
    }
}
