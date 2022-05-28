<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\SubCategory;

class ListCategoryComponent extends Component
{
    use WithPagination;
    
    public $paginate=5;

    public function delete($id){
        $category=Category::findOrFail($id);
        if($category){

            $category->subCategories()->delete();
            $category->delete();
            return redirect()->back()->with('success_message',__('deleted'));
        }
        return redirect()->back()->with('error_message', __('not_found'));
    }
    public function deleteSubcategory($id){
        $subCategory=SubCategory::findOrFail($id);
        if($subCategory){
            $subCategory->delete();
            return redirect()->back()->with('success_message',__('Sub Category Deleted successfully'));
        }
        return redirect()->back()->with('error_message', __('Sub Category not_found'));
    }

    public function render()
    {
        $categories=Category::paginate($this->paginate);
        return view('livewire.admin.category.list-category-component',[
            'items'=>$categories
        ])->layout('layouts.base');
    }
}
