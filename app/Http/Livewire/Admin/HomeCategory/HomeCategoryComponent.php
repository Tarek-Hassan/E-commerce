<?php

namespace App\Http\Livewire\Admin\HomeCategory;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class HomeCategoryComponent extends Component
{
 
    public $select_categories=[];
    public $no_of_products=0;

    public function mount(){

        if(HomeCategory::count() > 0){
            $homeCategory = HomeCategory::first();
            $this->select_categories=explode(',',$homeCategory->sel_categories);
            $this->no_of_products=$homeCategory->no_of_products;
        }
        
        
        
    }

    public function update(){
        $this->sel_categories=implode(',',$this->select_categories);
        if(HomeCategory::count() > 0){
            HomeCategory::first()->update($this->all());
        }else{
            HomeCategory::create($this->all());
        }

        return redirect()->route("admin.homeCategories")->with('success_message',__('updated'));
    }
    
    public function render()
    {
        return view('livewire.admin.home-category.home-category-component',[
            'categories'=>Category::all()
        ])->layout('layouts.base');
    }
}
