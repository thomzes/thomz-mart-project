<?php

namespace App\Http\Controllers\Backend;

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








}
