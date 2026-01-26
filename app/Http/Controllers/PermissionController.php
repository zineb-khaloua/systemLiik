<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Permission::class,'permission');
    }
    public function index()
    {
        $permissions = Permission::with('roles')->orderBy('id','desc')->get();

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('permissions.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:permissions,name',
            'roles' => 'array'
        ]);

        $permission = Permission::create(['name' => $validated['name']]);

        if ($request->has('roles')) {
            $permission->syncRoles($request->roles);
        }

        return redirect()->route('permissions.index')->with('success', 'Permission créée avec succès.');
    }

    public function edit(Permission $permission )
    {
        $roles=Role::all();
        return view('permissions.edit', compact('permission','roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $permission->id
        ]);

        $permission->update(['name' => $validated['name']]);

        return redirect()->route('permissions.index')->with('success', 'Permission mise à jour avec succès.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission supprimée avec succès.');
    }
}
