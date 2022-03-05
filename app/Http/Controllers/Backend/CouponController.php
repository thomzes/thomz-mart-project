<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function CouponView()
    {
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('backend.coupon.view_coupon', compact('coupons'));
        
    } //end method

    public function CouponStore(Request $request)
    {
        $request->validate(
            [
                'coupon_name' => 'required',
                'coupon_discount' => 'required',
                'coupon_validity' => 'required', 
                
            ]);
            
            Coupon::insert(
            [
                'coupon_name' => strtoupper($request->coupon_name),
                'coupon_discount' => $request->coupon_discount,
                'coupon_validity' => $request->coupon_validity,
                'created_at' => Carbon::now(),

            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Coupon Inserted Successfully!',
                'alert-type' => 'success'

            );
    
            return redirect()->back()->with($notification);

    } //end method








}
