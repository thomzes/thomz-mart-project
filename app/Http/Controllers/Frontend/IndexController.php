<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->get();
        
        $skip_brand_0 = Brand::skip(0)->first();
        $skip_brand_product_0 = Product::where('status', 1)->where('brand_id', $skip_brand_0->id)->orderBy('id', 'DESC')->get();


        // return $skip_category->id;
        // die();
        
        return view('frontend.index', compact('categories', 'sliders', 'products', 'featured', 'hot_deals', 'special_offer', 'special_deals', 'skip_category_0', 'skip_product_0', 'skip_category_1', 'skip_product_1', 'skip_brand_0', 'skip_brand_product_0'));

    } //end method

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');

    } //end method

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile', compact('user'));

    } //end method

    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();

        // Notification Toastr
        $notification = array(
            'message' => 'User Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

    } //end method

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.change_password', compact('user'));

    } //end method

    public function UserPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

        // Notification Toastr
        $notification = array(
            'message' => 'User Password Changed Successfully!',
            'alert-type' => 'success'
        );

            return redirect()->back()->with($notification);
        }else{
        // Notification Toastr
        $notification = array(
            'message' => 'Current Password or Confirm Password Not Matched!',
            'alert-type' => 'error'
        );
            return redirect()->back()->with($notification);
        }

    } //end method

    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id', $id)->get();

        return view('frontend.product.product_details', compact('product', 'multiImg'));

    } //end method

    public function TagWiseProduct($tag)
    {
        $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_idn',$tag)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();


        return view('frontend.tags.tags_view', compact('products', 'categories',));

    } //end method

    // SubCategory Tags Data
    public function SubCateWiseProduct($subcat_id, $slug)
    {
        $products = Product::where('status',1)->where('subcategory_id', $subcat_id)->orderBy('id','DESC')->paginate(6);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();


        return view('frontend.product.subcategory_view', compact('products', 'categories',));

    } //end method

    // SubSubCategory Tags Data
    public function SubSubCateWiseProduct($subsubcat_id, $slug)
    {
        $products = Product::where('status',1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id','DESC')->paginate(6);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();


        return view('frontend.product.sub_subcategory_view', compact('products', 'categories',));

    }




}
