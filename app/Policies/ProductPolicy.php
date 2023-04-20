<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
// use Illuminate\Auth\Access\Response;
//$this ka matlab yahaaaaaaaaan pr hmari current policy.
class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // return $user->hasAnyRole(['admin','']);
        return $user; // is ka matlab ye he k user agr logged in he to True wagarna False return ho ga.
    }

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        // return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Allowed to Edit Product");
        return $user;
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Allowed to Create Product");
        return $this->getPermission($user,1);
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function update(User $user)
    {
        // return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Allowed to Edit Product");
       return $this->getPermission($user,2) ? $this->allow() : $this->deny("You are Not Allowed to Update Product Permission.");
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(User $user, Product $product=null)
    {
        // return $user->hasRole('admin') ? Response::allow() : Response::deny("You are Not Allowed to Delete Product");
        return $this->getPermission($user,3) ? $this->allow() : $this->deny("You are Not Allowed to Delete the Product.");
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function restore(User $user, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function forceDelete(User $user, Product $product)
    {
        //
    }

    // public function before(User $user)
    // {
    //     // return $user->hasRole('admin') ? $this->allow() : $this->deny("You are Not Allowed to do this Action.");
    //     return $user->hasRole('admin') ? true : null;
    // }

    protected function getPermission($user,$p_id)
    {
        foreach($user->roles as $role)
        {
            if($role->permissions->pluck('id')->contains($p_id))
            {
                return true;
            }
        }
    } 
}
