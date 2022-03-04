<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function MyCart()
    {
        return view('frontend.wishlist.view_mycart');

    } //end method


    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round((int)$cartTotal),

        ));

    } //end method

    public function RemoveCartProduct($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove The Product From Your Cart!']);

    } //end method





}
