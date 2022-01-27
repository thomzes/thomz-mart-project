<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_name_en' => 'required',
                'category_name_idn' => 'required',
                'category_icon' => 'required', 
            ]);
            
            Category::insert(
            [
                'category_name_en' => $request->category_name_en,
                'category_name_idn' => $request->category_name_idn,
                'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_idn' => strtolower(str_replace(' ','-',$request->category_name_idn)),
                'category_icon' => $request->category_icon
            ]);
    
            // Notification Toastr
            $notification = array(
                'message' => 'Category Inserted Successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

    }

    public function CategoryEdit($id)
    {
        $categories = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('categories'));

    }

    public function CategoryUpdate(Request $request)
    {
        $category_id = $request->id;

        Category::findOrFail($category_id)->update(
        [
            'category_name_en' => $request->category_name_en,
            'category_name_idn' => $request->category_name_idn,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_idn' => strtolower(str_replace(' ','-',$request->category_name_idn)),
            'brand_icon' => $request->category_icon
        ]);

        // Notification Toastr
        $notification = array(
            'message' => 'Category Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }



}
