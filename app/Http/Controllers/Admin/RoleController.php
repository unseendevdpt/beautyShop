<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        abort_if(! auth()->user()->can('access_roles'), 403);

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        abort_if(! auth()->user()->can('create_roles'), 403);

        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required',
            'permissions' => 'array',
        ]);

        $role = Role::create(['name' => $request->name, 
                      'guard_name' => $request->guard_name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        abort_if(! auth()->user()->can('show_roles'), 403);

        $role = Role::findOrFail($id);
        $permissions = $role->permissions;
        return view('admin.roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        abort_if(! auth()->user()->can('edit_roles'), 403);

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'guard_name' => 'required',
            'permissions' => 'array',
        ]);

        $role = Role::findOrFail($id);

        $role->update(['name' => $request->name, 
                        'guard_name' => $request->guard_name]);

                        
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions([]); 
        }

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        abort_if(! auth()->user()->can('delete_roles'), 403);
        
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index');
    }
}
