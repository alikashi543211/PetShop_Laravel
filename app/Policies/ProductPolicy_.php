<?php

namespace App\Policies;
use Illuminate\Auth\Access\Response;

use App\User;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function isAllowed(User $user)
    {
        return $user->hasAnyRole(['admin','subAdmin']);
    }
    public function allowEdit(User $user)
    {
        return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Authorized to Edit Product");
    }

    public function allowCreate(User $user)
    {
        return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Authorized to Create Product");
    }

    public function allowDelete(User $user)
    {
        
        return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Authorized to Delete Product");
    }
}
