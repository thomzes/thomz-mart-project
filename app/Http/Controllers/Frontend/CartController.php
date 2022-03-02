<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if($product->discount_pice == NULL) {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->quantity, 
                'price' => $product->selling_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => 'color',
                    'size' => 'size'
                ],
            ]);

            return response()->json(['success' => 'Successfully Added On Your Cart!']);

        } else {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->quantity, 
                'price' => $product->discount_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => 'color',
                    'size' => 'size'
                ],
            ]);

            return response()->json(['success' => 'Successfully Added On Your Cart!']);

        }

    } //end method


    // Mini Cart Section
    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total(2);

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round((int)$cartTotal),

        ));

    } //end method




















}
