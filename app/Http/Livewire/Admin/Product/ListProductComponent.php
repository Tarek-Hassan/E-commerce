<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ListProductComponent extends Component
{
    use WithPagination;
    public $paginate;

    public function mount(){
        $this->paginate=6;
    }

    public function destroyproduct($id){

        $product=Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success_message','Product Delete Successfully');
    }

    public function render()
    {
        return view('livewire.admin.product.list-product-component',[
            'items'=>Product::paginate($this->paginate),
        ])->layout('layouts.base');
    }
}
