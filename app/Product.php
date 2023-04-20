<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = [];
	
    public function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    	// pehli foreign key in child table ka argument he or doosra parent table ka argument he parent.
    }
    public function attributes()
    {
    	return $this->hasMany('App\Product_Attribute','product_id','id');
    }
    public function multiple_images()
    {
        return $this->hasMany('App\ProductImage','product_id','id');
    }
    public function carts()
    {
        return $this->hasMany('App\Cart','product_id','id');
    }
}
