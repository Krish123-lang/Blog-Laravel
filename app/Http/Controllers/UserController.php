<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function changePassword(){
        return view('backend.user.change_password');
    }

    public function updatePassword(Request $request){
        $user=User::getSingle(Auth::user()->id);

        if(Hash::check($request->old_password, $user->password)){
            if($request->new_password == $request->confirm_password){
                $user->password=Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('success', 'Password successfully updated!');
            }
            else{
                return redirect()->back()->with('error', 'Confirm password does not match with New password!');
            }
        }
        else{
            return redirect()->back()->with('error', 'Old password do not match!');
        }
    }

    public function AccountSetting(){
        $data['getUser']=User::getSingle(Auth::user()->id);
        return view('backend.profile.account_setting', $data);
    }

    public function UpdateAccountSetting(Request $request){
        $getUser = User::getSingle(Auth::user()->id);
        $getUser->name = $request->name;

        if (!empty($request->file('profile_picture'))) {

            if(!empty($this->profile_picture) && file_exists('uploads/profile/'.$getUser->profile_picture)){
                unlink('uploads/profile/'.$getUser->profile_picture);
            }

            $ext = $request->file('profile_picture')->getClientOriginalExtension();
            $file = $request->file('profile_picture');
            $filename = Str::random(20) . '.' . $ext;
            $file->move('uploads/profile/', $filename);
            $getUser->profile_picture = $filename;
        }

        $getUser->save();
        return redirect()->back()->with('success', 'Account setting successfully updated!');
    }
}
