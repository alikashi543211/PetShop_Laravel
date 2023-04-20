<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        DB::table('permission_role')->truncate();
    	

        $adminPermissions=Permission::take(2)->get();
         $subAdminPermissions=Permission::skip(1)->take(2)->get();

     $adminRole=new Role();
     $adminRole->name="admin";
     $adminRole->save();

     $userRole=new Role();
     $userRole->name="user";
     $userRole->save();

     $subAdminRole=new Role();
     $subAdminRole->name="subAdmin";
     $subAdminRole->save();

     $subAdminRole->permissions()->sync($subAdminPermissions);
     $adminRole->permissions()->sync($adminPermissions);
    }
}
