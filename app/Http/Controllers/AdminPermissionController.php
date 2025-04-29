<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminPermissionController extends Controller
{
 
    public function index()
    {
        //tampilkan admin
        $users = User::where('role', 'admin')->orWhere('role', 'super_admin')->get();
        return view('admin.permission.index', compact('users'));
    }

    public function updatePermissions(Request $request, User $user)
    {
        $permissions = $request->input('permissions', []);
        $user->permissions = $permissions;
        $user->save();

        return redirect()->back()->with('success', 'Permissions updated.');
    }

    public function add(Request $request)
    {
        //validasi data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
        ]);
        //tambah admin
        $admin = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.manage')->with('success', 'Admin berhasil ditambahkan');
    }

    public function remove($id)
    {
        //hapus admin
        $admin = User::findOrFail($id);

        if ($admin->role == 'super_admin') {
            return redirect()->route('admin.manage')->with('error', 'Cannot remove Super Admin');
        }

        $admin->delete();

        return redirect()->route('admin.manage')->with('success', 'Admin berhasil dihapus');
    }
}
