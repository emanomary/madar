<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['slug'=>'super-admin','name'=>__('admin.superAdmin')],
            ['slug'=>'editor','name'=>__('admin.editor')],
            ['slug'=>'author','name'=>__('admin.author')],
        ];
        DB::table('roles')->insert($roles);

        //get all permissions to give it to super admin role
        $permissions = Permission::select('id')->get();

        //get super admin role
        $superAdmin = Role::select('*')->where('slug','super-admin')->first();

        foreach($permissions as $permission)
        {
            $superAdmin->permission()->attach($permission);
        }
    }
}
