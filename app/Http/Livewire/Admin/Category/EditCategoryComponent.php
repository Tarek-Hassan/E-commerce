<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class EditCategoryComponent extends Component
{

    public $name;
    public $slug;
    public $category;

    public function mount($slug){
       
        $this->category=Category::where('slug',$slug);
        if($this->category->count() > 0){
            $this->category=$this->category->first();
            $this->name=$this->category->name;
            $this->slug=$this->category->slug;
        }else{

            return redirect()->route('admin.categories')->with('error_message',__('not_found'));
        }
    }

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function update(){
     
        $this->category->update($this->all());  
        return redirect()->route('admin.categories')->with('success_message',__('updated'));
    }
    public function render()
    {
        return view('livewire.admin.category.edit-category-component',[
            'category'=> $this->category,
        ])->layout('layouts.base');
    }
}
