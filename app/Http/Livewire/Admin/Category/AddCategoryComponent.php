<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
class AddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateSlug(){
        $this->slug=str::slug($this->name);
    }
    public function storeCategory(){
        Category::create($this->all());
        return redirect()->route('admin.categories')->with('success_message','Category Created Succeefuly');
        // session()->flash('success_message','Category Created Succeefuly');
    }
    public function render()
    {
        return view('livewire.admin.category.add-category-component')->layout('layouts.base');
    }
}
