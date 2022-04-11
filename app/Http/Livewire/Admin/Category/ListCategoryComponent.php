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

    public function delete($id){
        $category=Category::findOrFail($id);
        if($category){
            $category->delete();
            return redirect()->back()->with('success_message',__('deleted'));
        }
        return redirect()->back()->with('error_message', __('not_found'));
    }

    public function render()
    {
        $categories=Category::paginate($this->paginate);
        return view('livewire.admin.category.list-category-component',[
            'items'=>$categories
        ])->layout('layouts.base');
    }
}
