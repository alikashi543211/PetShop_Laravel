<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRole($roles)
    {
        $rolesCount=$this->roles->whereIn('name',$roles)->count();
        if($rolesCount>0)
        {
            return true;
        }else{
            return false;
        }
    }

    public function hasRole($role)
    {
        $roleCount=$this->roles->where('name',$role)->count();
        if($roleCount>0)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function delivery_address()
    {
        return $this->hasOne('App\DeliveryAddress','user_id','id');
    }

    
    public function shipping_address()
    {
        return $this->hasOne('App\ShippingAddress','user_id','id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order','user_id','id');
    }

    public function order_products()
    {
        return $this->hasMany('App\OrderProduct','user_id','id');
    }
}
