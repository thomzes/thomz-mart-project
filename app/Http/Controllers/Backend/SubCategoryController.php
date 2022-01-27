<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategories', 'categories'));

    } //end method

    public function SubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_name_en' => 'required',
                'subcategory_name_idn' => 'required',
            ]);
            
            SubCategory::insert(
            [
                'category_id' => $request->category_id,
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_name_idn' => $request->subcategory_name_idn,
                'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
                'subcategory_slug_idn' => strtolower(str_replace(' ','-',$request->subcategory_name_idn)),
            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'SubCategory Inserted Successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

    } //end method

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategories', 'categories'));

    } //end method

    public function SubCategoryUpdate(Request $request)
    {
        $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update(
            [
                'category_id' => $request->category_id,
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_name_idn' => $request->subcategory_name_idn,
                'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
                'subcategory_slug_idn' => strtolower(str_replace(' ','-',$request->subcategory_name_idn)),
            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'SubCategory Updated Successfully!',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.subcategory')->with($notification);

    } //end method



}
