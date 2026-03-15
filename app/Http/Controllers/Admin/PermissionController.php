<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
        abort_if(! auth()->user()->can('access_permissions'), 403);

        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        abort_if(! auth()->user()->can('create_permissions'), 403);

        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required',
        ]);

        Permission::create(['name' => $request->name, 
                            'guard_name' => $request->guard_name]);

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        abort_if(! auth()->user()->can('show_permissions'), 403);

        $permission = Permission::findOrFail($id);
        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        abort_if(! auth()->user()->can('edit_permissions'), 403);

        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id,
            'guard_name' => 'required',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update(['name' => $request->name, 
                              'guard_name' => $request->guard_name]);

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        abort_if(! auth()->user()->can('delete_permissions'), 403);
        
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index');
    }
}
