<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    public function users()
    {
        $users = User::with('role')->latest()->get();
        return view('admin.users.users', compact('users'));
    }

    public function addUser()
    {
        $roles = Role::latest()->get();
        return view('admin.users.add', compact('roles'));
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required',
            'role_id' => 'required|exists:roles,id'
        ]);

        User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users');
    }

    public function edit($id)
    {
        $user = User::with('role')->findOrFail($id);
        $roles = Role::latest()->get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update($request->all());
        return redirect()->route('admin.users');
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users');
    }
}
