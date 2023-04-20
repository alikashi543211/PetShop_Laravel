<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];
	
    public function product()
    {
    	return $this->belongsTo('App\Product','product_id','id');
    	// pehli foreign key in child table ka argument he or doosra parent table ka argument he parent.
    }
}
