<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategories'));
    }
}
