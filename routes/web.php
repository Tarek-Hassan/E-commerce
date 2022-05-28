<?php
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\ContactUsComponent;
use App\Http\Livewire\DetailsComponet;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishListComponent;
use App\Http\Livewire\ThankComponent;

use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\ReviewComponent;
use App\Http\Livewire\User\ChangePassword;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\ContactComponent;
use App\Http\Livewire\Admin\AboutComponent;
use App\Http\Livewire\Admin\SettingComponent;

use App\Http\Livewire\Admin\Category\ListCategoryComponent;
use App\Http\Livewire\Admin\Category\AddCategoryComponent;
use App\Http\Livewire\Admin\Category\EditCategoryComponent;

use App\Http\Livewire\Admin\Product\ListProductComponent;
use App\Http\Livewire\Admin\Product\AddProductComponent;
use App\Http\Livewire\Admin\Product\EditProductComponent;

use App\Http\Livewire\Admin\HomeSlider\ListHomeSliderComponent;
use App\Http\Livewire\Admin\HomeSlider\AddHomeSliderComponent;
use App\Http\Livewire\Admin\HomeSlider\EditHomeSliderComponent;

use App\Http\Livewire\Admin\Coupon\ListCouponComponent;
use App\Http\Livewire\Admin\Coupon\AddCouponComponent;
use App\Http\Livewire\Admin\Coupon\EditCouponComponent;

use App\Http\Livewire\Admin\HomeCategory\HomeCategoryComponent;
use App\Http\Livewire\Admin\HomeCategory\HomeSaleSettingComponent;
use App\Http\Livewire\Admin\HomeCategory\OrderComponent;
use App\Http\Livewire\Admin\HomeCategory\OrderDetailsComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class)->name('product.checkout');
Route::get('/shop',ShopComponent::class)->name('product.shop');
Route::get('/product/{slug}',DetailsComponet::class)->name('product.detail');
Route::get('/product-category/{category_slug}/{scategory_slug?}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/wish-list',WishListComponent::class)->name('product.wishList');
Route::get('/about-us',AboutUsComponent::class)->name('about-us');
Route::get('/contact-us',ContactUsComponent::class)->name('contact-us');
Route::get('/thank',ThankComponent::class)->name('thank');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// for admin
Route::middleware(['auth:sanctum','authAdmin','verified'])->prefix('admin/')->name('admin.')->group(function(){
    Route::get('dashboard',AdminDashboardComponent::class )->name('dashboard');

    Route::prefix('categories/')->group(function(){
        Route::get('',ListCategoryComponent::class )->name('categories');
        Route::get('create',AddCategoryComponent::class )->name('addcategory');
        Route::get('edit/{slug}/{scategory_slug?}',EditCategoryComponent::class )->name('editcategory');
    });

    Route::prefix('products/')->group(function(){
        Route::get('',ListProductComponent::class )->name('products');
        Route::get('create',AddProductComponent::class )->name('addproduct');
        Route::get('edit/{slug}',EditProductComponent::class )->name('editproduct');
    });
    
    Route::prefix('home-sliders/')->group(function(){
        Route::get('',ListHomeSliderComponent::class )->name('homeSliders');
        Route::get('create',AddHomeSliderComponent::class )->name('addHomeSliders');
        Route::get('edit/{id}',EditHomeSliderComponent::class )->name('editHomeSliders');
    });

    Route::prefix('coupons/')->group(function(){
        Route::get('',ListCouponComponent::class )->name('coupons');
        Route::get('create',AddCouponComponent::class )->name('addcoupon');
        Route::get('edit/{id}',EditCouponComponent::class )->name('editcoupon');
    });
    // Route::prefix('home-category/')->group(function(){

        Route::get('home-category/',HomeCategoryComponent::class )->name('homeCategories');
        Route::get('home-sale-setting/',HomeSaleSettingComponent::class )->name('homeSaleSetting');
        
        Route::get('orders',OrderComponent::class )->name('orders');
        Route::get('order/{id}',OrderDetailsComponent::class )->name('orderDetails');

        Route::get('contactus',ContactComponent::class)->name('contactus');
        Route::get('about',AboutComponent::class)->name('about');
        Route::get('setting',SettingComponent::class)->name('setting');

});
// for User
Route::middleware(['auth:sanctum', 'verified'])->prefix('user/')->name('user.')->group(function(){
    Route::get('/dashboard',UserDashboardComponent::class )->name('dashboard');
    Route::get('orders',UserOrderComponent::class )->name('orders');
    Route::get('order/{id}',UserOrderDetailsComponent::class )->name('orderDetails');
    Route::get('review/{id}',ReviewComponent::class )->name('orderReview');
    Route::get('change-password',ChangePassword::class )->name('changePassword');
});
