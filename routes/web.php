<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Models\Wishlist;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=> 'admin', 'middleware'=> ['admin:admin']], function() {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('login', [AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:admin'])->group(function () {

// Admin middleware
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');

// Admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
// Admin Profile Route
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
// Change Password Route
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');

}); //end middleware admin



// User middleware
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

// User All Routes
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');



// Admin Brand All Route
Route::prefix('brand')->group(function() {
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});



// Admin Category All Route
Route::prefix('category')->group(function() {
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
    
    // Admin Sub Category All Route
        Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
        Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

    // Admin Sub->Sub Category All Route
        Route::get('/sub/sub/view', [SubSubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
        Route::post('/sub/sub/store', [SubSubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
        Route::get('/sub/sub/edit/{id}', [SubSubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
        Route::post('/sub/sub/update', [SubSubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('/sub/sub/delete/{id}', [SubSubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');

        // Ajax Route In SubSubCategory
        Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);
        Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);
});



// Admin Products All Route
Route::prefix('product')->group(function() {
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
    Route::post('/thumbnail/update', [ProductController::class, 'ThumbnailImageUpdate'])->name('update-product-thumbnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
});




// Admin Slider All Route
Route::prefix('slider')->group(function() {
    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
});





// ======================================== FRONTEND ALL ROUTES ======================================== //

// Multi Language All Routes
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/indo', [LanguageController::class, 'Indo'])->name('indo.language');


// Product Details Page URL
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);


// Product Tags Page
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);


// SubCategory Tags Data
Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCateWiseProduct']);


// SubSubCategory Tags Data
Route::get('subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCateWiseProduct']);


// Product View Modal With Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);


// Add To Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);


// Get Data Mini Cart
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);


// Remove Mini Cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);


// Add To Wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);


// Wishlist Page
Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWIshlistProduct']);









