<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['slug'=>'profile','name'=>__('admin.controlProfile')],
            ['slug'=>'settings','name'=>__('admin.controlSettings')],
            ['slug'=>'users','name'=>__('admin.controlUsers')],
            ['slug'=>'roles','name'=>__('admin.controlRoles')],
            ['slug'=>'permissions','name'=>__('admin.controlPermissions')],
            ['slug'=>'categories','name'=>__('admin.controlCategories')],
            ['slug'=>'news','name'=>__('admin.controlNews')],
            ['slug'=>'videos','name'=>__('admin.controlVideos')],
            ['slug'=>'messages','name'=>__('admin.controlMessages')],
        ];
        DB::table('permissions')->insert($permissions);
    }
}
