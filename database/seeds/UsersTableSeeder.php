<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function run()
    {
     User::truncate();

     DB::table('role_user')->truncate();

     $adminRole=Role::select('id')->where('name','admin')->first();
     $userRole=Role::select('id')->where('name','user')->first();
     $subAdminRole=Role::select('id')->where('name','subAdmin')->first();

     $admin=new User();
     $admin->name="Admin User";
     $admin->email="admin@admin.com";
     $admin->password=Hash::make('password');
     $admin->save();

     $user=new User();
     $user->name="Generic User";
     $user->email="generic@generic.com";
     $user->password=Hash::make('password');
     $user->save();  

     $subAdmin=new User();
     $subAdmin->name="Sub Admin subAdmin";
     $subAdmin->email="subadmin@subadmin.com";
     $subAdmin->password=Hash::make('password');
     $subAdmin->save();  

     $admin->roles()->attach($adminRole);
     $user->roles()->attach($userRole); 
     $subAdmin->roles()->attach($subAdminRole); 
    }
}

