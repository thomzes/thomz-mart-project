<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubSubCategoryController extends Controller
{
    public function SubSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.subsubcategory.sub_subcategory_view', compact('subsubcategories', 'categories'));

    } //end method

    // Ajax Method
    public function GetSubCategory($category_id)
    {
        $subcategory = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcategory);

    } //end method

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit', compact('subcategories', 'categories'));

    } //end method

    public function SubSubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'subsubcategory_name_en' => 'required',
                'subsubcategory_name_idn' => 'required',
            ]);
            
            SubSubCategory::insert(
            [
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_name_en' => $request->subsubcategory_name_en,
                'subsubcategory_name_idn' => $request->subsubcategory_name_idn,
                'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_slug_en)),
                'subsubcategory_slug_idn' => strtolower(str_replace(' ','-',$request->subsubcategory_slug_idn)),
            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Sub-SubCategory Inserted Successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

    } //end method






}
