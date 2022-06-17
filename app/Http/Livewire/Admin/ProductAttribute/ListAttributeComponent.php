<?php

namespace App\Http\Livewire\Admin\ProductAttribute;

use Livewire\Component;
use App\Models\Attribute;

class ListAttributeComponent extends Component
{
    public $paginate= 10;
    public $search;

    public function delete($id)
    {
        $attribute=Attribute::findOrFail($id);
        $attribute->delete();
        return redirect()->back()->with('success_message','product attribute delete successfully ');

    }

    public function render()
    {       if($this->search){
                
                $attributes=Attribute::where('name','like',"%{$this->search}%")->orderByDesc('name')->paginate($this->paginate);
            }else{
                $attributes=Attribute::orderByDesc('name')->paginate($this->paginate);

            }

        return view('livewire.admin.product-attribute.list-attribute-component',[
            'items'=>$attributes
        ])->layout('layouts.base');
    }
}
