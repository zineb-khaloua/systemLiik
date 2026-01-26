<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    
    public function index(){
        $this->authorize('viewAny',Role::class);
        $roles=Role::with(['permissions','users'])->get();
        $roleCount=$roles->count();
        $permissionCount=Permission::count();

        return view('roles.index',compact('roles','roleCount','permissionCount'));
    }

    public function create(){
        $this->authorize('create',Role::class);
        $permissions=Permission::all();
        return view('roles.create',compact('permissions'));
    }
    public function store(Request $request){
        $this->authorize('create',Role::class);
        $validated= $request->validate([
            'name'=>'required|string|max:255',
            'permissions'=>'required|array',
        ]);

        $role = Role::create([
            'name'=> $validated['name'],
        ]);

         if ($request->filled('permissions')) {
        $permissionIds = Permission::whereIn('name', $request->permissions)
            ->pluck('id');

        $role->permissions()->sync($permissionIds);
    }

    return redirect()
        ->route('roles.index')
        ->with('success', 'Rôle créé avec succès');
    } 



    public function edit(Role $role){
        $this->authorize('update',$role);

        $roles=Role::all();
        $permissions=Permission::all();
        return view('roles.edit', compact('role', 'permissions','roles')); 
   }

    public function update(Request $request, Role $role){
        $this->authorize('update',$role);
        $validated =$request->validate([
            'name'=>'required|string|max:255',
            "permissions"=>'required|array',
        ]);
        $role->update([
            'name'=> $validated['name'],
        ]);
        
       $role->permissions()->sync($validated['permissions'] ?? []);

        return redirect()->route('roles.index')
        ->with('success', 'Rôle mis à jour avec succès');


    }
    public function destroy(Role $role){
        $this->authorize('delete',$role);
        $role->delete();
        return redirect()->route('roles.index')->with('success','Role supprimé avec succès');

        
    }
}
