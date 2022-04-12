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

    protected function rules(){
        return [
            'sel_categories'=>'required',
            'no_of_products'=>'required|min:1',
        ];
    }
    
    protected function message(){
        return [
            'sel_categories.required'=>'Categories Should be Selected ',

            'no_of_products.required'=>'No Of Products Is Required ',
            'no_of_products.min'=>'No Of Products greater Than 0 ',
        ];
    }

    public function update(){
        $this->validate();

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
