<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin' => [
                'settings',

                'show users',
                'create users',
                'edit users',
                'delete users',

                'show roles',
                'create roles',
                'edit roles',
                'delete roles',
 
				'telescope',
                'translations',

                'services create services',
                'services edit services',
                'services delete services',

                'services create packages',
                'services edit packages',
                'services delete packages',

                'services create types',
                'services edit types',
                'services delete types',

                'services create carts',
                'services edit carts',
                'services delete carts',

                'oporations create oporation',
                'oporations edit oporation',
                'oporations delete oporation',

             ],
            'ِaccounting' => [
            ],
            'Support' => [

            ],
            'Customer' => [
 
            ],
             
        ];

        foreach ($roles as $role => $permissions) {
            $Role = Role::findOrCreate($role);
            foreach ($permissions as $permission) {
                $permissionExist = Permission::where('name', $permission)->first();
                if (!$permissionExist) {
                    Permission::insert(['name' => $permission, 'guard_name' => 'web']);
                }
            }
            $Role->syncPermissions(Permission::whereIn('name', $permissions)->get());
        }

        $user = User::updateOrCreate([
            'email' => 'admin@email.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'status' => '1',
            'password' => Hash::make("Admin@123"),
        ]);

        $user->assignRole('Admin');

    }
}
