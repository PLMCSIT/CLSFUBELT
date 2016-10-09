<?php

namespace App\Http\Controllers\ScaffoldInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
//use Spatie\Permission\Models\Permission;
use App\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('perms')->get();
        return view('scaffold-interface.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scaffold-interface.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Spatie\Permission\Models\Role::create([
                        'name' => $request->name,
                        'display_name' => $request->display_name,
                        'description' => $request->description
                    ]);

        return redirect('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all()->pluck('name');
        $roles = Role::with('perms')->get();
        return view('scaffold-interface.roles.edit', compact('role', 'permissions', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $role = Role::findOrFail($request->role_id);

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->update();

        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect('roles');
    }


 /**
     * Assign Permission to a role.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function addPermission(Request $request)
    {
        $role = \App\Role::find($request->role_id);
        $permission = \App\Permission::where('name', '=', $request->permission_name)->first();
        $role->attachPermission($permission);
        return redirect('roles/edit/'.$request->role_id);
    }

    /**
     * revoke Permission to a role.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function revokePermission($permission, $role_id)
    {
        $role = \App\Role::findorfail($role_id);
        $removePermission = \App\Permission::where('name', '=', $permission)->first();
        $role->detachPermission($removePermission);
        return redirect('roles/edit/'.$role_id);
    }



}
