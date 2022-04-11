<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\HomeCategory;
use App\Models\Category;

class HomeComponent extends Component
{
    public function render()
    {
        $homeCategory=HomeCategory::first();
        $cats=$homeCategory ? explode(',',$homeCategory->sel_categories) :[] ;
        $no_of_products=$homeCategory ? explode(',',$homeCategory->no_of_products) : 1 ;

        

        return view('livewire.home-component',[
            'sliders'=>HomeSlider::all(),
            'lproducts'=>Product::orderByDesc('created_at')->take(8)->get(),
            'categories'=>Category::WhereIn('id',$cats)->get(),
            'no_of_products'=>$no_of_products,
            'products'=>Product::all(),
        ])
                ->layout('layouts.base');
    }
}
