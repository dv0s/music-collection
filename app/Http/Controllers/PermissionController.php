<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function init(){
        $overlord_perm = Permission::all();

        $overlord_role = new Role();
        $overlord_role->slug = 'overlord';
        $overlord_role->name = 'System Overlord';
        $overlord_role->save();
        $overlord_role->permissions()->attach($overlord_perm);

        $overlord_role = Role::where('slug', config('app.superuser_role'))->first();

        $permissions_array = [
            "createUser" => ["create-user", "Create User"],
            "editUser" => ["edit-user", "Edit User"],
            "deleteUser" => ["delete-user", "Delete User"],
            "createRole" => ["create-role", "Create Role"],
            "editRole" => ["edit-role", "Edit Role"],
            "deleteRole" => ["delete-role", "Delete Role"],
            "createPermission" => ["create-permission", "Create Permission"],
            "editPermission" => ["edit-permission", "Edit Permission"],
            "deletePermission" => ["delete-permission", "Delete Permission"]
        ];

        foreach ($permissions_array as $var => $settings){
            if(Permission::where('slug', $settings[1])->exists()){
                continue;
            }

            ${$var} = new Permission();
            ${$var}->slug = $settings[0];
            ${$var}->name = $settings[1];
            ${$var}->save();
            ${$var}->roles()->attach($overlord_role);
        }

        $overlord_perms = Permission::all();

        $overlord = new User();
        $overlord->name = 'D. van Os';
        $overlord->email = 'overlord@gmail.com';
        $overlord->password = bcrypt('Overlord');
        $overlord->save();
        $overlord->roles()->attach($overlord);
        $overlord->permissions()->attach($overlord_perms);

    }

    public function upgrade_overlord(){
        $roles = Role::where('slug', '!=', 'overlord')->get();
        $overlord = User::where('email', 'overlord@gmail.com')->first();

        $overlord->roles()->attach($roles);

        return redirect()->back();
    }

    public function permission()
    {
        $dev_permission = Permission::where('slug', 'create-tasks')->first();
        $manager_permission = Permission::where('slug', 'edit-users')->first();

        //RoleTableSeeder.php
        $dj_role = new Role();
        $dj_role->slug = 'deejay';
        $dj_role->name = 'Radio Deejay';
        $dj_role->save();
        $dj_role->permissions()->attach($dev_permission);

        $manager_role = new Role();
        $manager_role->slug = 'manager';
        $manager_role->name = 'Radio Manager';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission);

        $dj_role = Role::where('slug', 'deejay')->first();
        $manager_role = Role::where('slug', 'manager')->first();

        $createTasks = new Permission();
        $createTasks->slug = 'create-albums';
        $createTasks->name = 'Create Albums';
        $createTasks->save();
        $createTasks->roles()->attach($dj_role);

        $editUsers = new Permission();
        $editUsers->slug = 'edit-albums';
        $editUsers->name = 'Edit albums';
        $editUsers->save();
        $editUsers->roles()->attach($manager_role);

        $dj_role = Role::where('slug', 'deejay')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $dev_perm = Permission::where('slug', 'create-albums')->first();
        $manager_perm = Permission::where('slug', 'edit-albums')->first();

        $deejay = new User();
        $deejay->name = 'Mahedi Hasan';
        $deejay->email = 'deejay@gmail.com';
        $deejay->password = bcrypt('secrettt');
        $deejay->save();
        $deejay->roles()->attach($dj_role);
        $deejay->permissions()->attach($dev_perm);

        $manager = new User();
        $manager->name = 'Hafizul Islam';
        $manager->email = 'manager@gmail.com';
        $manager->password = bcrypt('secrettt');
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);


        return redirect()->back();
    }
}
