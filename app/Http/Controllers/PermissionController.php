<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
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
        $deejay->email = 'mahedi@gmail.com';
        $deejay->password = bcrypt('secrettt');
        $deejay->save();
        $deejay->roles()->attach($dj_role);
        $deejay->permissions()->attach($dev_perm);

        $manager = new User();
        $manager->name = 'Hafizul Islam';
        $manager->email = 'hafiz@gmail.com';
        $manager->password = bcrypt('secrettt');
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);


        return redirect()->back();
    }
}
