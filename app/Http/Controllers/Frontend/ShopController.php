<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function ShopPage()
    {
        $products = Product::query();

        if (!empty($_GET['category'])) {

            $slugs = explode(',', $_GET['category']);

            $catIds = Category::select('id')
                                ->whereIn('category_slug_en', $slugs)
                                ->pluck('id')
                                ->toArray();

            $products = Product::whereIn('category_id', $catIds)
                                ->paginate(3);

        }
        else {

            $products = Product::where('status', 1)
                                ->orderBy('id', 'DESC')
                                ->paginate(3);

        }



        

        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.shop.shop_page', compact('products', 'categories'));

    } //end method


    public function ShopFilter(Request $request)
    {
        




    } //end method





}
