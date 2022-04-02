<?php
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\ContactUsComponent;
use App\Http\Livewire\DetailsComponet;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use Illuminate\Support\Facades\Route;

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
Route::get('/cart',CartComponent::class);
Route::get('/checkout',CheckoutComponent::class);
Route::get('/shop',ShopComponent::class);
Route::get('/about-us',AboutUsComponent::class);
Route::get('/contact-us',ContactUsComponent::class);
Route::get('/product/{slug}',DetailsComponet::class)->name('product.detail');
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
Route::middleware(['auth:sanctum','authAdmin','verified'])->name('admin.')->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class )->name('dashboard');
});
// for User
Route::middleware(['auth:sanctum', 'verified'])->name('user.')->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class )->name('dashboard');
});
