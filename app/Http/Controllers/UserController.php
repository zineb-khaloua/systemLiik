<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function __construct()
    {
    $this->authorizeResource(User::class, 'user');
    }
    
  
    public function index()
    {
        $users=User::all();
        $roles=Role::all();
        return view('users.index',compact('users','roles'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated= $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string',
            'role'=>'required',
        ]);
        $user=User::create([

            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make( $validated['password']),
        ]);
        $user->assignRole($validated['role']);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Utilisateur créé avec succès !']);
        }

        return redirect()->back()->with('success','Utilisateur créé avec succès !' );
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email,'.$user->id,
            'role'=>'required',
            'status' => 'nullable|string',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if($request->filled('password')){
             $user->password = Hash::make($validated['password']);
        }
        $user->status = $validated['status'] ?? $user->status;
        $user->save();
        
        $user->syncRoles([$validated['role']]);

        return redirect()->route('users.index')->with('success','Utilisateur modifié avec succès !' );
    }


    public function destroy(  User $user)
    {
        $user->delete();
        return redirect()->back()->with('success','Utilisateur supprimé avec succès !' );
    }

    public function profile()
    {
        return view('profile.show');
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success',' vous avez été déconnecté avec succès !');
    }
}

