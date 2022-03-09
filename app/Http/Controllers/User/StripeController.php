<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        
        \Stripe\Stripe::setApiKey('sk_test_51Kb5isCllP4FZQ2JWLzKsO7FTqKwkXQDod40tDODG7kepXrEIxq5gY5jKDZgVJicl18nvU8rMsNayJmIBtsmO8Rh00zeSIoSXM');

        
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => 999*100,
        'currency' => 'usd',
        'description' => 'Thomz Online Store',
        'source' => $token,
        'metadata' => ['order_id' => '6735'],
        ]);

        dd($charge);



    } //end method











}
