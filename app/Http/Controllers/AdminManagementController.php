<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminManagementController extends Controller
{
    // Show all admins
    public function index()
    {
        if (Auth::user()->role !== 'super_admin') {
            abort(403);
        }

        $admins = User::where('role', '!=', 'user')->get();
        return view('admin.manage', compact('admins'));
    }

    // Create new admin
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'super_admin') {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.manage')->with('success', 'Admin created successfully!');
    }

    // Show edit form
        public function edit($id)
    {
        if (Auth::user()->role !== 'super_admin') {
            abort(403);
        }

        $admin = User::findOrFail($id);

        if ($admin->role === 'user' || $admin->id == 1) {
            return back()->with('error', 'You cannot edit the super admin.');
        }

        return view('admin.edit', compact('admin'));
    }


    // Update admin info
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'super_admin') {
            abort(403);
        }
    
        $admin = User::findOrFail($id);
    
        if ($admin->role === 'user' || $admin->id == 1) {
            return back()->with('error', 'You cannot update the super admin.');
        }
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'role' => 'required',
            'password' => 'nullable|string|min:6',
        ]);
    
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
    
        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }
    
        $admin->save();
    
        return redirect()->route('admin.manage')->with('success', 'Admin updated successfully!');
    }
    

    // Delete admin
        public function destroy($id)
    {
        $admin = User::findOrFail($id);

        // Prevent deleting regular users or the one super admin
        if ($admin->role === 'user' || $admin->id == 1) {
            return back()->with('error', 'You cannot delete this account.');
        }

        $admin->delete();

        return redirect()->route('admin.manage')->with('success', 'Admin deleted successfully!');
    }

}
