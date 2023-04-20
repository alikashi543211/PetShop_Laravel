<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = [];
	
    public function child_categories()
    {
    	return $this->hasMany('App\Category','parent_id','id');
    }

    public function parent_category()
    {
    	return $this->belongsTo('App\Category','parent_id','id');
    }

    public function products()
    {
    	return $this->hasMany('App\Product','category_id','id');
    }
}
