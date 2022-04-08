<?php

namespace App\Http\Controllers\User;

use App\Models\ShipState;
use App\Models\ShipDistrict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    // Shipping Routes Method AJAX
    public function GetDistrict($division_id)
    {
        $district = ShipDistrict::where('division_id', $division_id)
                                ->orderBy('district_name', 'ASC')
                                ->get();

        return json_encode($district);

    } //end method

    public function GetState($district_id)
    {
        $state = ShipState::where('district_id', $district_id)
                            ->orderBy('state_name', 'ASC')
                            ->get();
                            
        return json_encode($state);

    } //end method



    public function CheckoutStore(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['notes'] = $request->notes;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;

        $cartTotal = Cart::total();


        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data', 'cartTotal'));

        } elseif ($request->payment_method == 'card') {
            return 'card';
        } else {
            return view('frontend.payment.cash', compact('data', 'cartTotal'));

        }

    } //end method












}
