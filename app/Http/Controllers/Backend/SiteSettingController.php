<?php

namespace App\Http\Controllers\Backend;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);

        return view('backend.setting.setting_update', compact('setting'));

    } //end method


    public function SiteSettingUpdate(Request $request)
    {
        $setting_id = $request->id;

        if ($request->file('logo')) {

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(139,36)->save('upload/logo/'.$name_gen);
            $save_url = 'upload/logo/'.$name_gen;
            
            SiteSetting::findOrFail($setting_id)->update(
            [
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'github' => $request->github,
                'logo' => $save_url,
            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Setting Updated With Image Successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }else {
            SiteSetting::findOrFail($setting_id)->update(
                [
                    'phone_one' => $request->phone_one,
                    'phone_two' => $request->phone_two,
                    'email' => $request->email,
                    'company_name' => $request->company_name,
                    'company_address' => $request->company_address,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'linkedin' => $request->linkedin,
                    'github' => $request->github,
                ]);
        
                // Notification Toastr
                $notification = array(
                    'message' => 'Setting Updated Successfully!',
                    'alert-type' => 'success'
                );
        
                return redirect()->back()->with($notification);
        }

    } //end method










}
