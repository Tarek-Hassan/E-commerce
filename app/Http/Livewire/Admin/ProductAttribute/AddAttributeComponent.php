<?php

namespace App\Http\Livewire\Admin\ProductAttribute;

use Livewire\Component;
use App\Models\Attribute;

class AddAttributeComponent extends Component
{
    public $name;


    protected function rules()
    {
        return [
            'name'=>'required|unique:attributes,name',
        ];

    }
    protected function message()
    {
        return [
        'name.required'=>'Name is required',
        'name.unique'=>'Name is aready exsist'
        ];

    }
    public function store()
    {
        $this->validate();
        Attribute::create($this->all());
        return redirect()->route('admin.attributes')->with('success_message','Product Attribute Created Successfully');
    }
    public function render()
    {
        return view('livewire.admin.product-attribute.add-attribute-component')->layout('layouts.base');
    }
}
