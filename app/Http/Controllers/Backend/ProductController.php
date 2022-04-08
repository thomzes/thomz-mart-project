<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Facades\Image;

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
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        ]);

        if ($files = $request->file('file')) {
            $destinationPath = 'upload/pdf'; //upload path
            $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $digitalItem);
        }


        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(915,1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;


        $product_id = Product::insertGetId([            
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
            'digital_file' => $digitalItem,
            'special_deals' => $request->special_deals,
            
            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // Multiple Image Code Start
        $images = $request->file('multi_img');
        foreach ($images as $image){
            $make_me = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(915,1000)->save('upload/products/multi-image/'.$make_me);
            $uploadPath = 'upload/products/multi-image/'.$make_me;

            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
       
            ]);
        }
        //Multiple Image Code End

        // Notification Toastr
        $notification = array(
            'message' => 'Product Inserted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);

    } //end method

    public function ManageProduct()
    {
        $products = Product::latest()->get();

        return view('backend.product.product_view',compact('products'));

    } //end method

    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        
        $subsubcategories = SubSubCategory::latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $products = Product::findOrFail($id);

        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategories', 'subsubcategories','products', 'multiImgs'));

    } //end method

    public function ProductDataUpdate(Request $request)
    {
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([            
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

            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // Notification Toastr
        $notification = array(
            'message' => 'Product Updated Without Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);

    } //end method

    // Multiple Image Update
    public function MultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(915,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);

        } //end foreach

        // Notification Toastr
        $notification = array(
            'message' => 'Product Image Updated Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);


    } //end method

    
    //Thumbnail Image Update
    public function ThumbnailImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImg = $request->old_img;
        unlink($oldImg);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(915,1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        // Notification Toastr
        $notification = array(
            'message' => 'Product Image Thumbnail Updated Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } //end method

    // Multi Image Delete
    public function MultiImageDelete($id)
    {
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImg::findOrFail($id)->delete();

        // Notification Toastr
        $notification = array(
            'message' => 'Product Image Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } //end method

    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);

        // Notification Toastr
        $notification = array(
            'message' => 'Product Inactive!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    } //end method

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

         // Notification Toastr
         $notification = array(
            'message' => 'Product Active!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } //end method

    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();

        }

        // Notification Toastr
        $notification = array(
            'message' => 'Product Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } //end method



    // Product Stock Method
    public function ProductStock()
    {
        $products = Product::latest()->get();

        return view('backend.product.product_stock',compact('products'));

    } //end method

    


}
