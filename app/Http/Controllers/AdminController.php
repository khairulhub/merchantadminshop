<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admindashboard()
    {
        return view('admin.index');
    }



    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        $notification = [
            'message' => 'Logout successfully',
            'alert-type' => 'info',
        ];


        return redirect('/')->with($notification);
    }



    public function AllMerchants()
    {
        $merchants = User::where('role', 'merchant')->get();
        return view('admin.merchants.all-merchants', compact('merchants'));
    }

    public function UpdateUserStatus(Request $request)
    {
        $userId = $request->input('user_id');
        $isChecked = $request->input('is_checked', 0); // Default to 0 if not provided
        $user = User::find($userId);

        if ($user) {
            $user->status = $isChecked;
            $user->save();
            return redirect()->route('all.instructor');
        }
    }


    public function AllUsersPending()
    {
        $users = User::where('role', 'user')->where('status', 1)->get();
        return view('admin.merchants.pending-merchants', compact('users'));
    }

    public function updateRole(Request $request)
    {
        // Validate input
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'role' => 'required|in:user,merchant',
    ]);

    // Find the user and update the role
    $user = User::findOrFail($request->user_id);
    $user->role = $request->role;
    $user->save();

    return redirect()->back()->with('message', 'User role updated successfully!');
    }





}
