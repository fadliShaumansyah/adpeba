<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminPermissionController extends Controller
{
 
    public function index(Request $request)
    {
        //tampilkan admin
     
        $finduser = null;
      
        if ($request->has('npa')) {
            $finduser = User::where('npa', $request->npa)->first();
            
    }

    $users = User::whereIn('role', ['admin', 'super_admin'])->get();

    return view('admin.permission.index', compact('finduser', 'users'));

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
    
        return redirect()->route('admin.permissions.index')->with('success', 'User berhasil diubah menjadi admin');
    }

    public function remove($id)
{
    $admin = User::findOrFail($id);

    if ($admin->role === 'super_admin') {
        // Hitung jumlah super admin saat ini
        $superAdminCount = User::where('role', 'super_admin')->count();

        // Jika hanya ada satu super admin, tidak boleh dihapus
        if ($superAdminCount <= 1) {
            return redirect()->route('admin.permissions.index')
                ->with('error', 'Tidak bisa menghapus Super Admin terakhir.');
        }
    }
    
     $admin->role = 'user';
     $admin->save();


    return redirect()->route('admin.permissions.index')
        ->with('success', 'Admin berhasil dihapus');
}



}
