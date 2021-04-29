<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'إيمان كلاب',
            'email' => 'emankullab@gmail.com',
            'password' => Hash::make('mohammed/87'),
            'avatar' => 'person.png'
            ]);

        //get super-admin role
        $role = Role::select('*')->where('slug','=','super-admin')->first();

        // give user super-admin role
        $user->role()->attach($role->id);

        //get all permissions
        $permissions = Permission::all();

        // give super-admin all permissions
        foreach($permissions as $permission)
        {
            $user->permission()->attach($permission->id);
        }
    }
}
