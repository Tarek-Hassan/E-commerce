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

use App\Http\Livewire\User\UserDashboardComponent;

use App\Http\Livewire\Admin\AdminDashboardComponent;

use App\Http\Livewire\Admin\Category\ListCategoryComponent;
use App\Http\Livewire\Admin\Category\AddCategoryComponent;
use App\Http\Livewire\Admin\Category\EditCategoryComponent;

use App\Http\Livewire\Admin\Product\ListProductComponent;
use App\Http\Livewire\Admin\Product\AddProductComponent;
use App\Http\Livewire\Admin\Product\EditProductComponent;

use App\Http\Livewire\Admin\HomeSlider\ListHomeSliderComponent;
use App\Http\Livewire\Admin\HomeSlider\AddHomeSliderComponent;
use App\Http\Livewire\Admin\HomeSlider\EditHomeSliderComponent;

use App\Http\Livewire\Admin\HomeCategory\HomeCategoryComponent;
use App\Http\Livewire\Admin\HomeCategory\HomeSaleSettingComponent;

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
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/wish-list',WishListComponent::class)->name('product.wishList');
Route::get('/about-us',AboutUsComponent::class);
Route::get('/contact-us',ContactUsComponent::class);
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
        Route::get('edit/{slug}',EditCategoryComponent::class )->name('editcategory');
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
    // Route::prefix('home-category/')->group(function(){

        Route::get('home-category/',HomeCategoryComponent::class )->name('homeCategories');
        Route::get('home-sale-setting/',HomeSaleSettingComponent::class )->name('homeSaleSetting');


});
// for User
Route::middleware(['auth:sanctum', 'verified'])->name('user.')->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class )->name('dashboard');
});
