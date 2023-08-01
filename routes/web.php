<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ProductDetails;
use App\Http\Livewire\ProductCategoryComponent;
use App\Http\Livewire\ProductSubCategoryComponent;
use App\Http\Livewire\ProductBrandComponent;
use App\Http\Livewire\SerchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactPageComponent;
use App\Http\Livewire\AboutPageComponent;


// user
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserReviewComponent;


// admin
use App\Http\Livewire\Admin\AdminDashboardComponent;
   //home page slider
use App\Http\Livewire\Admin\AdminSliderHomePageComponent;
use App\Http\Livewire\Admin\AdminAddSliderHomePageComponent;
use App\Http\Livewire\Admin\AdminEditSliderHomePageComponent;

   //homg page information
use App\Http\Livewire\Admin\AdminHomePageComponent;
use App\Http\Livewire\Admin\AdminEditLogoComponent;
use App\Http\Livewire\Admin\AdminAddHeaderTopNewsComponent;
use App\Http\Livewire\Admin\AdminEditHeaderTopNewsComponent;
use App\Http\Livewire\Admin\AdminEditHomeBanner;
use App\Http\Livewire\Admin\AdminAddHomeFeaturedBrands;
use App\Http\Livewire\Admin\AdminEditHomeFeaturedBrands;

   //product category
use App\Http\Livewire\Admin\AdminProductCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductCategoryComponent;
//product sub category
use App\Http\Livewire\Admin\AdminProductSubCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductSubCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductSubCategoryComponent;
//product sub category
use App\Http\Livewire\Admin\AdminBrandComponent;
use App\Http\Livewire\Admin\AdminAddBrandComponent;
use App\Http\Livewire\Admin\AdminEditBrandComponent;
//product
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
//coupon
use App\Http\Livewire\Admin\CouponComponent;
use App\Http\Livewire\Admin\AddCouponComponent;
use App\Http\Livewire\Admin\EditCouponComponent;
//order
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminPandingOrderComponent;
use App\Http\Livewire\Admin\AdminDeliveryOrderComponent;
use App\Http\Livewire\Admin\AdminCancelOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
//setting
use App\Http\Livewire\Admin\AdminSetting;
//contact
use App\Http\Livewire\Admin\AdminContactComponent;

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


Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopeComponent::class)->name('shop');
Route::get('/product/{p_slug}', ProductDetails::class)->name('product.details');
Route::get('/cart', CartComponent::class)->name('cart');

Route::get('/category/{cat_slug}', ProductCategoryComponent::class)->name('category');
Route::get('/product/{cat_slug}/{subcat_slug}', ProductSubCategoryComponent::class)->name('subcategory');
Route::get('/brand/{brand_slug}', ProductBrandComponent::class)->name('brand');
Route::get('/serch', SerchComponent::class)->name('serch');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist');
Route::get('/contact', ContactPageComponent::class)->name('contact');
Route::get('/about', AboutPageComponent::class)->name('about');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',UserDashboardComponent::class)->name('dashboard');
    Route::get('/orderdetails/{order_id}',UserOrderDetailsComponent::class)->name('orderdetails');
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');
    Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');
    Route::get('/review/{order_item_id}',UserReviewComponent::class)->name('review');
});

Route::middleware(['auth','authadmin'])->group(function () {

    Route::get('/checkout', CheckoutComponent::class)->name('checkout');

    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    //home page info
    Route::get('/admin/homepage',AdminHomePageComponent::class)->name('admin.homepage');
    Route::get('/admin/edit/log/{logo_id}',AdminEditLogoComponent::class)->name('admin.edit.logo');
    Route::get('/admin/add/headertopnews',AdminAddHeaderTopNewsComponent::class)->name('admin.add.headertopnews');
    Route::get('/admin/edit/headertopnews/{sheadetopnews_id}',AdminEditHeaderTopNewsComponent::class)->name('admin.edit.headertopnews');
    Route::get('/admin/edit/homebanner/{banner_id}',AdminEditHomeBanner::class)->name('admin.edit.homebanner');
    Route::get('/admin/add/home/featuredbrands',AdminAddHomeFeaturedBrands::class)->name('admin.add.home.featuredbrands');
    Route::get('/admin/edit/home/featuredbrands/{featuredbrands_id}',AdminEditHomeFeaturedBrands::class)->name('admin.edit.home.featuredbrands');

     //home page slider
    Route::get('/admin/sliderhomepage',AdminSliderHomePageComponent::class)->name('admin.sliderhomepage');
    Route::get('/admin/add/sliderhomepage',AdminAddSliderHomePageComponent::class)->name('admin.add.sliderhomepage');
    Route::get('/admin/edit/sliderhomepage/{sliderhome_id}',AdminEditSliderHomePageComponent::class)->name('admin.edit.sliderhomepage');
    //product category
    Route::get('/admin/product-category',AdminProductCategoryComponent::class)->name('admin.product.category');
    Route::get('/admin/add/product-category',AdminAddProductCategoryComponent::class)->name('admin.add.product.category');
    Route::get('/admin/edit/product-category/{category_slug}',AdminEditProductCategoryComponent::class)->name('admin.edit.product.category');
    //product subcategory
    Route::get('/admin/product-subcategory',AdminProductSubCategoryComponent::class)->name('admin.product.subcategory');
    Route::get('/admin/add/product-subcategory',AdminAddProductSubCategoryComponent::class)->name('admin.add.product.subcategory');
    Route::get('/admin/edit/product-subcategory/{subcategory_slug}',AdminEditProductSubCategoryComponent::class)->name('admin.edit.product.subcategory');
    //product category
    Route::get('/admin/brand',AdminBrandComponent::class)->name('admin.brand');
    Route::get('/admin/add/brand',AdminAddBrandComponent::class)->name('admin.add.brand');
    Route::get('/admin/edit/brand/{brand_slug}',AdminEditBrandComponent::class)->name('admin.edit.brand');
    //product
    Route::get('/admin/product',AdminProductComponent::class)->name('admin.product');
    Route::get('/admin/add/product',AdminAddProductComponent::class)->name('admin.add.product');
    Route::get('/admin/edit/product/{product_slug}',AdminEditProductComponent::class)->name('admin.edit.product');
    //coupon
    Route::get('/admin/coupon',CouponComponent::class)->name('admin.coupon');
    Route::get('/admin/add/coupon',AddCouponComponent::class)->name('admin.add.coupon');
    Route::get('/admin/edit/coupon/{coupon_id}',EditCouponComponent::class)->name('admin.edit.coupon');
    //order
    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.order');
    Route::get('/admin/panding/orders',AdminPandingOrderComponent::class)->name('admin.order.panding');
    Route::get('/admin/delivery/orders',AdminDeliveryOrderComponent::class)->name('admin.order.delivery');
    Route::get('/admin/cancel/orders',AdminCancelOrderComponent::class)->name('admin.order.cancel');
    Route::get('/admin/order/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');
    //setting
    Route::get('/admin/setting',AdminSetting::class)->name('admin.setting');
    //contact
    Route::get('/admin/contact',AdminContactComponent::class)->name('admin.contact');

});


require __DIR__.'/auth.php';
