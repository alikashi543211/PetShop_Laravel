<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with('parent_category')->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('parent_id',0)->get();
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->parent_id!=0)
        {
        $pid=$request->parent_id;
        $parent_cat=Category::find($pid);
        $parent_cat_name=$parent_cat->name;
        }
        
        $category=new Category();
        $category->parent_id=$request->parent_id;
        $category->name=$request->name;
        $slug = preg_replace('/\s+/', '-', strtolower($request->name));
        if($request->parent_id!=0)
        {
            $slug=$parent_cat_name.'-'.$slug;
        }
        $category->slug=strtolower($slug);
        $category->description=$request->description;
           // upload image
        if($request->hasFile('thumbnail'))
        {
            $img_tmp=$request->file('thumbnail');
            if($img_tmp->isValid()){
                // image k path ka code
                $filename = sprintf("categories%s.",rand(1,1000)).$request->file('thumbnail')->getClientOriginalName();
                $img_path='uploads/categories/'.$filename;
                // image resize kren
                Image::make($img_tmp)->resize(160,160)->save($img_path);
                $category->thumbnail=$filename;
    } 
        }
        $save=$category->save();
         if($save)
        {
           return redirect()->route('category.index')->with('flash_message_success','Category added successfully'); 
       }else
       {
         return redirect()->route('category.index')->with('flash_message_error','Category added failed!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories=Category::where('parent_id',0)->where('id','<>',$category->id)->get();
        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($request->parent_id!=0)
        {
        $pid=$request->parent_id;
        $parent_cat=Category::find($pid);
        $parent_cat_name=$parent_cat->name;
        }
        $category->parent_id=$request->parent_id;
        $category->name=$request->name;
        $slug = preg_replace('/\s+/', '-', strtolower($request->name));
        if($request->parent_id!=0)
        {
            $slug=$parent_cat_name.'-'.$slug;
        }
        $category->slug=strtolower($slug);
        $category->description=$request->description;
          // upload image
        if($request->hasFile('thumbnail'))
        {
            $img_tmp=$request->file('thumbnail');
            if($img_tmp->isValid()){
                // image k path ka code
                $filename = sprintf("categories%s.",rand(1,1000)).$request->file('thumbnail')->getClientOriginalName();
                $img_path='uploads/categories/'.$filename;
                // image resize kren
                Image::make($img_tmp)->resize(160,160)->save($img_path);
                $category->thumbnail=$filename;
                if($request->current_image!='dummy.png')
        {
            $image_path="uploads/categories/";
              if(file_exists($image_path.$request->current_image))
        {
            unlink($image_path.$request->current_image);
        }
        }
    } 
        } else
        {
            $category->thumbnail=$request->current_image;
        } 
        $save=$category->save();
         if($save)
        {
           return redirect()->route('category.index')->with('flash_message_success','Category updated successfully'); 
       }else
       {
         return redirect()->route('category.index')->with('flash_message_error','Category updated failed!');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $image_path="uploads/categories/";
        if($category->thumbnail!='dummy.png')
        {
             if(file_exists($image_path.$category->thumbnail))
        {
            unlink($image_path.$category->thumbnail);
        }
        }
        /*
        if($category->parent_id==0)
        {
            // agr parent he to child categories me parent_id k column me 0 store ho jaaey or child categories me slug update ho jaaey or saath jo parent ka slug attatch tha wo khatam ho jaaey.
            // foreach($category->child_categories as $child_cat)
            // {
            //     // Ek to he me sub categories ki parent_ids 0 kr doon or slug se main category ka slug hata doon
                 
            //     $child_cat->parent_id=0;
            //     $child_cat->slug=preg_replace('/\s+/', '-', strtolower($child_cat->name));
            //     $child_cat->save();
                
            //     // Doosra me subcategories delte kr doon.
            //     //$child_cat->delete();
            // }
        }
        */
        $result=$category->delete();
        if($result)
        {
             Alert::success('Deleted Successfully', 'Success Message');
            return redirect()->back();
        }
    }

    public function change_status(Request $request)
    {
        $id=$request->id;
        $category=Category::find($id);
        $category->status=$request->status;
        $category->save();
    }


    public function delete_category_thumbnail($id=null)
    {
        $category=Category::find($id);
        $image_path="uploads/categories/";
        if($category->thumbnail!='dummy.png')
        {
            if(file_exists($image_path.$category->thumbnail))
            {
                unlink($image_path.$category->thumbnail);
            }
        }
        $category->thumbnail="dummy.png";
        $result=$category->save();
        if($result){
            return redirect()->back()->with('flash_message_error','Thumnail Deleted Successfully !');
        }
    }
}
