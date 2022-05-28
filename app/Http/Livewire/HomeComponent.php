<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\HomeCategory;
use App\Models\Category;
use App\Models\SaleSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
    public function render()
    {
        $homeCategory=HomeCategory::first();

        $cats=$homeCategory ? explode(',',$homeCategory->sel_categories) :[] ;
        $no_of_products=$homeCategory ? explode(',',$homeCategory->no_of_products) : 1 ;

        $saleSetting=SaleSetting::where('status',true)->first();

        $sale_date= $saleSetting ? Carbon::parse($saleSetting->sale_date)->format('Y/m/d h:m:s') : null ;
        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        return view('livewire.home-component',[
            'sliders'=>HomeSlider::all(),
            'lproducts'=>Product::orderByDesc('created_at')->take(8)->get(),
            'categories'=>Category::WhereIn('id',$cats)->get(),
            'no_of_products'=>$no_of_products,
            'products'=>Product::all(),
            'sproducts'=>Product::where('sale_price','>',0)->orderByDesc('created_at')->take(10)->get(),
            'sale_date'=>$sale_date,
        ])->layout('layouts.base');
    }
}
