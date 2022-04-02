<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        return view('admin.admin_profile_view', compact('adminData'));

    } //end method

    public function AdminProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = Admin::find($id);
        return view('admin.admin_profile_edit', compact('editData'));

    } //end method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;
            $data->profile_photo_path = $save_url;

        }
        $data->save();

        // Notification Toastr
        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    } //end method

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');

    } //end method

    public function AdminUpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();

        // Notification Toastr
        $notification = array(
            'message' => 'Admin Password Changed Successfully!',
            'alert-type' => 'success'
        );

            return redirect()->back()->with($notification);
        }else{
        // Notification Toastr
        $notification = array(
            'message' => 'Current Password or Confirm Password Not Matched!',
            'alert-type' => 'error'
        );
            return redirect()->back()->with($notification);
        }

    } //end method


    public function AllUsers()
    {
        $users = User::latest()->get();

        return view('backend.user.all_user', compact('users'));

    } //end method















}
