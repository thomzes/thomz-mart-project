<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function AddProduct()
    {  
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
    
        return view('backend.product.product_add', compact('categories', 'brands'));

    } //end method
}
