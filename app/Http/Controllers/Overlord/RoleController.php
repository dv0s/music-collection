<?php

namespace App\Http\Controllers\Overlord;

use App\Models\role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:overlord');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        $role->save();

        $role->permissions()->attach($request->permissions);

        return redirect()->route('overlord-role-home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if($role->slug === config('app.superuser_role'))
        {
            return redirect()->back()->with('info', "Can not edit super user role");
        }
        
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if ($role->slug === config('app.superuser_role')) {
            return redirect()->back()->with('info', "Can not edit super user role");
        }
        
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if ($role->slug === config('app.superuser_role')) {
            return redirect()->back()->with('info', "Can not edit super user role");
        }

        $request->validate([
            'name' => 'required'
        ]);

        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        $role->save();

        $role->permissions()->sync($request->permissions);

        return redirect()->route('overlord-role-home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        if ($role->slug === config('app.superuser_role')) {
            return redirect()->back()->with('info', "Can not delete super user role");
        }

        $role->delete();
        return redirect()->route('overlord-role-home');
    }
}
