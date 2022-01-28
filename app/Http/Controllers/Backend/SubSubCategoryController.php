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






}
