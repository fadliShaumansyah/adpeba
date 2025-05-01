<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminPermissionController extends Controller
{
 
    public function index(Request $request)
    {
        //tampilkan admin
     
        $user = null;
      
        if ($request->has('npa')) {
            $user = User::where('npa', $request->npa)->first();
            
    }

    $users = User::whereIn('role', ['admin', 'super_admin'])->get();

    return view('admin.permission.index', compact('user', 'users'));

    }
    //permision
    public function updatePermissions(Request $request, User $user)
    {
        $permissions = $request->input('permissions', []);
        $user->permissions = $permissions;
        $user->save();

        return redirect()->back()->with('success', 'Permissions updated.');
    }

   // Role
    public function promoteToAdmin(Request $request)
    {
        // Validasi input npa
        $validatedData = $request->validate([
            'npa' => 'required|exists:users,npa',
        ]);
    
        // Cari user dan update role-nya
        $user = User::where('npa', $validatedData['npa'])->first();
        $user->role = 'admin';
        $user->save();
    
        return redirect()->route('admin.manage')->with('success', 'User berhasil diubah menjadi admin');
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
