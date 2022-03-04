<?php

namespace App\Http\Controllers\User;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function ViewWishlist()
    {
        return view('frontend.wishlist.view_wishlist');

    } //end method


    public function GetWishlistProduct()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlist);

    } // end method

    public function RemoveWIshlistProduct($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();

        return response()->json(['success' => 'Successfully Remove The Product!']);



    }









}
