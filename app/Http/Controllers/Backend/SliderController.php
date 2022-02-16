<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function SliderView()
    {
        $sliders = Slider::latest()->get();

        return view('backend.slider.slider_view', compact('sliders'));

    } //end method

    public function SliderStore(Request $request)
    {
        $request->validate(
        [
            'slider_img' => 'required', 
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;
        
        Slider::insert(
        [
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,

        ]);

        // Notification Toastr
        $notification = array(
            'message' => 'Slider Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } //end method

    public function SliderEdit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));

    } //end method

    public function SliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('slider_img')) {

            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);

            // Notification Toastr
            $notification = array(
                'message' => 'Slider Updated Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('manage-slider')->with($notification);

        }else{
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            // Notification Toastr
            $notification = array(
                'message' => 'Slider Updated Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('manage-slider')->with($notification);

        }




    }



}
