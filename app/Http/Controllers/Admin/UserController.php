<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::with('role')->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index');
    }

    public function update(Request $request, $id)
    {
        User::findOFail($id)->update($request->all());
        return redirect()->route('admin.users.index');
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }
}
