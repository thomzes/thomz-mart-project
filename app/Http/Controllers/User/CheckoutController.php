<?php

namespace App\Http\Controllers\User;

use App\Models\ShipState;
use App\Models\ShipDistrict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    // Shipping Routes Method AJAX
    public function GetDistrict($division_id)
    {
        $district = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($district);

    } //end method

    public function GetState($district_id)
    {
        $state = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($state);

    } //end method
}
