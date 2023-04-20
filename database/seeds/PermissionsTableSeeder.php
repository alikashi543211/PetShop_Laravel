<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Permission::truncate();

       $create_product=new Permission();
       $create_product->name="add-product";
       $create_product->for="product";
       $create_product->save();

       $edit_product=new Permission();
       $edit_product->name="update-product";
       $edit_product->for="product";
       $edit_product->save();

       $delete_product=new Permission();
       $delete_product->name="delete-product";
       $delete_product->for="product";
       $delete_product->save();

    }
}
