<?php
namespace App\Gates;
use Illuminate\Auth\Access\Response;
/**
 * 
 */
class ProductGate
{
	public function allowed($user,$allowed=null)
	{
		// $allowed=explode(':',$allowed);
        // return $user->hasAnyRole($allowed);
         return $user->hasAnyRole(['admin','subAdmin']); 
	}
	public function editAction($user)
	{
		return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Authorized to Edit Product");
	}

	public function createAction($user)
	{
		return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Authorized to Create Product");
	}

	public function deleteAction($user)
	{
		return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Authorized to Delete Product");
	}
}