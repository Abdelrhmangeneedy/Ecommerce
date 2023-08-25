<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admins()
    {
        $admin = User::where('role_as','1')->get();
        return view('admin.admins.index', compact('admin'));
    }
    
    public function add()
    {
        return view('admin.admins.add');
    }

    public function insert(Request $request)
    {
        $admin = new User();
        $admin->name = $request->input('fname');
        $admin->lname = $request->input('lname');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');
        $admin->address1 = $request->input('address1');
        $admin->role_as = $request->input('role_as') == true ? '1':'0';
        $admin->save();
        return redirect('add-admin')->with('status', "Admin Added Successfully");
    }

    public function edit($id)
    {
        $admin = user::find($id);
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = new User();
        $admin->name = $request->input('fname');
        $admin->lname = $request->input('lname');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');
        $admin->address1 = $request->input('address1');
        $admin->role_as = $request->input('role_as') == true ? '1':'0';
        $admin->update();
        return redirect('admins')->with('status', "Updated Successfully");
    }

    ////////////////////////////////////
    public function users()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function details($id)
    {
        $users = User::find($id);
        return view('admin.users.details', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('status', "Deleted Successfully");
    }
}
