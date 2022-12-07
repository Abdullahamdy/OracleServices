<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DeraSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToDeraSocialite()
    {
        return view('livewire.loading');
    }

    public function redirectToDera()
    {
        return Socialite::driver('dera')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleDeraSocialiteCallback()
    {
        try {

            $user = Socialite::driver('dera')->user();

            if ($user->id) {
                $rolesList = [];
                $permissionList = [];
                if (!empty($user->user['roles'])) {
                    foreach ($user->user['roles'] as $role_) {
                        $role = Role::updateOrCreate(['name' => $role_['name']]);
                        $rolesList[] = $role_['name'];
                        if(!empty($role_['permissions'])) {
                            foreach ($role_['permissions'] as $permission_) {
                                $permissionList[] = $permission_['name'];
                                $permission = Permission::where('name', $permission_['name'])->first();
                                if (!$permission) {
                                    $permission = Permission::updateOrCreate(['name' => $permission_['name']]);
                                    $role->givePermissionTo($permission_['name']);
                                }
                            }
                        }
                    }
                }

                if (!empty($user->user['role_list'])) {
                    foreach ($user->user['role_list'] as $role_) {
                        $role = Role::updateOrCreate(['name' => $role_['name']]);
//                        $rolesList[] = $role_['name'];
                    }
                }

                if (!empty($user->user['permissions'])) {
                    foreach ($user->user['permissions'] as $permission) {
                        $permission = Permission::updateOrCreate(['name' => $permission['name']]);
                        $permissionList[] = $permission->name;
                    }
                }


                if (!empty($user->user['menu'])) {
                    foreach ($user->user['menu'] as $menu) {
                        $menu['type'] = "menu";
                        $menu = Menu::updateOrCreate(['name' => $menu['name'] , 'type' => $menu['type']],$menu);
                    }
                }

                if (!empty($user->user['sidebar'])) {
                    foreach ($user->user['sidebar'] as $menu) {
                        $menu['type'] = "sidebar";
                        $menu = Menu::updateOrCreate(['name' => $menu['name'] , 'type' => $menu['type']],$menu);
                    }
                }

                $find_user = User::updateOrCreate([
                    'dera_socialite_id' => $user->id,
                ],[
                    'name' => $user->name,
                    'email' => $user->email,
                    'dera_socialite_id' => $user->id,
                    'image' => $user->avatar,
                    'password' => Hash::make(time())
                ]);

                $find_user->syncRoles($rolesList);
                $find_user->syncPermissions($permissionList);

                Auth::login($find_user);
                if(session('last_url')){
                    return redirect(session('last_url'));
                }

                return redirect('/');
            }

            if(session('last_url')){
                return redirect(session('last_url'));
            }

            return redirect('/');

        } catch (Exception $e) {
            return view('livewire.loading');
        }
    }

}
