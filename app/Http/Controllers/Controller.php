<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Category; // bahger mode use kiye ap query model se nahi laga saktey hen.

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // ye neechey function method mene create kiya he
    public static function mainCategories()
    {
    	$mainCategories = Category::where('parent_id',0)->get();
    	return $mainCategories;
    	
    }
}
