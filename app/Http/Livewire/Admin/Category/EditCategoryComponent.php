<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class EditCategoryComponent extends Component
{

    public $name;
    public $slug;
    public $category;
    public $category_id;
    public $scategory_slug;

    public function mount($slug,$scategory_slug=null){
        if($scategory_slug){
           $this->scategory_slug=$scategory_slug;
           $this->category=SubCategory::where('slug',$scategory_slug);
           if($this->category->count() > 0){
               $this->category=$this->category->first();
               $this->name=$this->category->name;
               $this->slug=$this->category->slug;
               $this->category_id=$this->category->category_id;
           }else{
    
               return redirect()->route('admin.categories')->with('error_message',__('not_found'));
           }
       }
       else{
           $this->category=Category::where('slug',$slug);
           if($this->category->count() > 0){
               $this->category=$this->category->first();
               $this->name=$this->category->name;
               $this->slug=$this->category->slug;
           }else{
   
               return redirect()->route('admin.categories')->with('error_message',__('not_found'));
           }
       }
    }

    protected function rules(){
        return [
            'name'=>'required|min:6',
            'slug'=>'required|unique:categories,slug,'.$this->category->id,
        ];
    }

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function update(){
        $this->validate();

       
        
         $this->category->update($this->all());  
        return redirect()->route('admin.categories')->with('success_message',__('updated'));
    }
    public function render()
    {
        return view('livewire.admin.category.edit-category-component',[
            'category'=> $this->category,
            'categories'=>Category::all(),
        ])->layout('layouts.base');
    }
}
