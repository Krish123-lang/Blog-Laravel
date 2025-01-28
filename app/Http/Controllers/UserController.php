<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_list()
    {
        $data['getRecord'] = User::getRecordUser();
        return view('backend.user.list', $data);
    }

    public function user_add()
    {
        return view('backend.user.add');
    }

    public function user_store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->status = trim($request->status);
        $save->save();
        return to_route('backend.user.list')->with('success', 'User Created Successfully!');
    }

    public function user_edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        return view('backend.user.edit', $data);
    }

    public function user_update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $save = User::getSingle($id);
        $save->name = trim($request->name);
        $save->email = trim($request->email);

        if(!empty($save->password)){
            $save->password = Hash::make($request->password);
        }
        $save->status = trim($request->status);
        $save->save();
        return to_route('backend.user.list')->with('success', 'User Updated Successfully!');
    }

    public function user_delete($id){
        $delete_user = User::getSingle($id);
        $delete_user->is_delete=1;
        $delete_user->save();
        return redirect()->back()->with('success', 'User Deleted Successfully!');
    }
}
