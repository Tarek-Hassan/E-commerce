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
    public function store(){
        Category::create($this->all());
        return redirect()->route('admin.categories')->with('success_message',__('created'));
    }
    public function render()
    {
        return view('livewire.admin.category.add-category-component')->layout('layouts.base');
    }
}
