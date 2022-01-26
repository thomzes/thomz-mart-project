<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request)
    {
        $request->validate(
        [
            'brand_name_en' => 'required',
            'brand_name_idn' => 'required',
            'brand_image' => 'required', 
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;
        
        Brand::insert(
        [
            'brand_name_en' => $request->brand_name_en,
            'brand_name_idn' => $request->brand_name_idn,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_idn' => strtolower(str_replace(' ','-',$request->brand_name_idn)),
            'brand_image' => $save_url,
        ]);

        // Notification Toastr
        $notification = array(
            'message' => 'Brand Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


}
