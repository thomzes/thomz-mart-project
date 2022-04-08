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
        $subcategory = SubCategory::where('category_id',$category_id)
                                    ->orderBy('subcategory_name_en', 'ASC')
                                    ->get();
        return json_encode($subcategory);

    } //end method

    public function GetSubSubCategory($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)
                                    ->orderBy('subsubcategory_name_en', 'ASC')
                                    ->get();
        return json_encode($subsubcat);
    }

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
                'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
                'subsubcategory_slug_idn' => strtolower(str_replace(' ','-',$request->subsubcategory_name_idn)),
            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Sub-SubCategory Inserted Successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

    } //end method

    public function SubSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.subsubcategory.sub_subcategory_edit', compact('subsubcategories', 'subcategories', 'categories'));

    } //end method

    public function SubSubCategoryUpdate(Request $request)
    {
        $subsubcat_id = $request->id;

        SubSubCategory::findOrFail($subsubcat_id)->update(
            [
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_name_en' => $request->subsubcategory_name_en,
                'subsubcategory_name_idn' => $request->subsubcategory_name_idn,
                'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
                'subsubcategory_slug_idn' => strtolower(str_replace(' ','-',$request->subsubcategory_name_idn)),
            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Sub-SubCategory Updated Successfully!',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.subsubcategory')->with($notification);

    } //end method

    public function SubSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        // Notification Toastr
        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }








}
