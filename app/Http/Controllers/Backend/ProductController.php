<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function AddProduct()
    {  
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
    
        return view('backend.product.product_add', compact('categories', 'brands'));

    } //end method

    public function StoreProduct(Request $request)
    {

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(915,1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/product/thumbnail/'.$name_gen;


        Product::insert([            
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,

            'product_name_en' => $request->product_name_en,
            'product_name_idn' => $request->product_name_idn,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_idn' => strtolower(str_replace(' ', '-', $request->product_name_idn)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_idn' => $request->product_tags_idn,
            'product_size_en' => $request->product_size_en,
            'product_size_idn' => $request->product_size_idn,
            'product_color_en' => $request->product_color_en,
            'product_color_idn' => $request->product_color_idn,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_idn' => $request->short_desc_idn,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_idn' => $request->long_desc_idn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),






        ]);




    } //end method


}
