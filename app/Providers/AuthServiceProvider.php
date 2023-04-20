<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Policies\PostPolicy;
use App\Product;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
      // 'App\Product' => 'App\Policies\ProductPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('isAdmin',function($user){
        //     return $user->hasAnyRole(['admin','subAdmin']);
        // });

        // Gate::define('create-products',function($user){
        //     return $user->hasRole('admin');
        // });

        // Gate::define('edit-products',function($user){
        //     return $user->hasRole('admin');
        // });
        // Gate::define('delete-products',function($user){
        //     return $user->hasRole('admin');
        // });
        // Gate::define('isSubAdmin',function($user){
        //     return $user->hasRole('subAdmin');
        // });
        Gate::define('isAllowed','App\Gates\ProductGate@allowed');
        // Gate::define('allow-edit','App\Gates\ProductGate@editAction');
        // Gate::define('allow-create','App\Gates\ProductGate@createAction');
        // Gate::define('allow-delete','App\Gates\ProductGate@deleteAction');
        // Policies ka istemaal krtey huwey ye neechey waaaaley Gates bnaaey.
        /*
        Gate::define('isAllowed','App\Policies\ProductPolicy@isAllowed');
        Gate::define('product.edit','App\Policies\ProductPolicy@allowEdit');
        Gate::define('product.create','App\Policies\ProductPolicy@allowCreate');
        Gate::define('product.delete','App\Policies\ProductPolicy@allowDelete');
        */
        // Resource Policies ka istemaal krtey huwey ye neechey waaaaaaaley Gates bnaey hen
        Gate::resource('product','App\Policies\ProductPolicy');
    }
}
