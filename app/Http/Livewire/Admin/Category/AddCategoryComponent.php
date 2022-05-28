<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
class AddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function generateSlug(){
        $this->slug=str::slug($this->name);
    }
    protected function rules(){
        return [
            'name'=>'required|min:6',
            'slug'=>'required|unique:categories,slug',
        ];
    }
    protected function message(){
        return [
            'name.required'=>'Name is Required',
            'name.min'=>'Name is more than 6',

            'slug.required'=>'Slug is Required',
            'slug.unique'=>'Slug is already Exist ',
        ];
    }
    protected function update($fields){
        $this->validateOnly($fields, [
            'name'=>'required|min:6',
            'slug'=>'required|unique:categories,slug',
        ]);
    }

    public function store(){

        // $this->validateOnly();
        $this->validate();
        
        if($this->category_id){
            SubCategory::create($this->all());
        }else{
            Category::create($this->all());
        }
        return redirect()->route('admin.categories')->with('success_message',__('created'));
    }
    public function render()
    {
        return view('livewire.admin.category.add-category-component',[
            'categories'=>Category::all(),
        ])->layout('layouts.base');
    }
}
