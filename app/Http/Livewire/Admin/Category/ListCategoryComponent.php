<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class ListCategoryComponent extends Component
{
    use WithPagination;
    public $paginate;

    public function mount(){
        $this->paginate=5;
        
    }

    public function destroyCategory($id){
        $category=Category::findOrFail($id);
        if($category){
            $category->delete();
            return redirect()->back()->with('success_message', 'Category Deleted Successfully');
        }
        return redirect()->back()->with('error_message', 'Category Not Found');
    }

    public function render()
    {
        $categories=Category::paginate($this->paginate);
        return view('livewire.admin.admin-category-component',[
            'items'=>$categories
        ])->layout('layouts.base');
    }
}
