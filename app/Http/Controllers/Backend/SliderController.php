<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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



}
