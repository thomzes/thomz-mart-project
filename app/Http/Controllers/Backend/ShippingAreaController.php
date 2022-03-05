<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingAreaController extends Controller
{
    public function DivisionView()
    {
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();

        return view('backend.ship.division.view_division' ,compact('divisions'));


    } //end method


    public function DivisionStore(Request $request)
    {
        $request->validate(
            [
                'division_name' => 'required',
                
            ]);
            
            ShipDivision::insert(
            [
                'division_name' => $request->division_name,
                'created_at' => Carbon::now(),

            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Ship Division Inserted Successfully!',
                'alert-type' => 'success'

            );
    
            return redirect()->back()->with($notification);
    }








}
