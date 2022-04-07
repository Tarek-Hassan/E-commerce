<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public $paginate;

    public function mount(){
        $this->paginate=5;

    }
    public function render()
    {
        $categories=Category::paginate($this->paginate);
        return view('livewire.admin.admin-category-component',[
            'items'=>$categories
        ])->layout('layouts.base');
    }
}
