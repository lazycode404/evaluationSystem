<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('admin.user',compact('users'));
    }

    public function store(Request $request)
    {
        $user = new User();

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');

        if(User::where('email','=',$email)->first())
        {
            return redirect()->back()->with('error', 'Email is already use!');
        }
        else
        {
            date_default_timezone_set('Asia/Manila');
            $user->name = $name;
            $user->email = $email;
            $password = Hash::make($password);
            $user->password = $password;
            $user->role = $role;
            $user->save();

            return redirect('admin/user')->with('success','User Added Successfully!');
        }
    }

    public function updateStatus(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function resetPass(Request $request)
    {
        $user = User::findOrFail($request->resetID);
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['message' => 'User password reset successfully.']);
    }

    public function edit($id)
    {
        $user = User::find($id);
        if($user)
        {
            return response()->json([
                'status' => 200,
                'user' => $user,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 200,
                'message' => 'User not found',
            ]);
        }
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->userID);
        $user->name = $request->editName;
        $user->email = $request->editEmail;
        $user->role = $request->editRole;
        $user->save();
        return redirect('admin/user')->with('success','User Update Successfully!');

    }
}
