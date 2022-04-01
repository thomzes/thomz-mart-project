<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    public function AllAdminRole()
    {
        $adminuser = Admin::where('type', 2)->latest()
                                            ->get();
        
        return view('backend.role.admin_role_all', compact('adminuser'));

    } //end method


    public function AddAdminRole()
    {
        return view('backend.role.admin_role_create');

    } //end method


    public function StoreAdminRole(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required'
            ]);
    
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;
            
            Admin::insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password), 
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'setting' => $request->setting,
                'return_order' => $request->return_order,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'admin_user_role' => $request->admin_user_role,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'created_at' => Carbon::now(),
            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Admin User Created Successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.admin.user')->with($notification);


    } //end method







}
