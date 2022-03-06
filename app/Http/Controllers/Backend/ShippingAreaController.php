<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;

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
                'message' => 'Shipping Division Inserted Successfully!',
                'alert-type' => 'success'

            );
    
            return redirect()->back()->with($notification);

    } //end method


    public function DivisionEdit($id)
    {
        $divisions = ShipDivision::findOrFail($id);

        return view('backend.ship.division.edit_division', compact('divisions'));

    } //end method


    public function DivisionUpdate(Request $request, $id)
    {
        ShipDivision::findOrFail($id)->update(
            [
                'division_name' => $request->division_name,
                'created_at' => Carbon::now(),

            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Ship Division Updated Successfully!',
                'alert-type' => 'info'

            );
    
            return redirect()->route('manage-division')->with($notification);

    } //end method


    public function DivisionDelete($id)
    {
        ShipDivision::findOrFail($id)->delete();

        // Notification Toastr
        $notification = array(
            'message' => 'Shipping Division Deleted Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } //end method





    // START DISTRICT METHOD

    public function DistrictView()
    {
        $division = ShipDivision::orderBy('id', 'ASC')->get();
        $district = ShipDistrict::orderBy('id', 'DESC')->get();

        return view('backend.ship.district.view_district', compact('division', 'district'));

    } //end method


    public function DistrictStore(Request $request)
    {
        $request->validate(
            [
                'division_id' => 'required',
                'district_name' => 'required',
                
            ]);
            
            ShipDistrict::insert(
            [
                'division_id' => $request->division_id,
                'district_name' => $request->district_name,
                'created_at' => Carbon::now(),

            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Shipping District Inserted Successfully!',
                'alert-type' => 'success'

            );
    
            return redirect()->back()->with($notification);

    } //end method


    public function DistrictEdit($id)
    {
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($id);

        return view('backend.ship.district.edit_district', compact('district', 'division'));

    } //end method

    public function DistrictUpdate(Request $request, $id)
    {
        ShipDistrict::findOrFail($id)->update(
            [
                'division_id' => $request->division_id,
                'district_name' => $request->district_name,
                'created_at' => Carbon::now(),

            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Shipping District Updated Successfully!',
                'alert-type' => 'info'

            );
    
            return redirect()->route('manage-district')->with($notification);

    } //end method

    public function DistrictDelete($id)
    {
        ShipDistrict::findOrFail($id)->delete();

        // Notification Toastr
        $notification = array(
            'message' => 'Shipping District Deleted Successfully!',
            'alert-type' => 'info'

        );

        return redirect()->back()->with($notification);

    } //end method








}
