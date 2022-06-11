<?php

namespace App\Http\Livewire\Admin\ProductAttribute;

use Livewire\Component;
use App\Models\Attribute;

class EditAttributeComponent extends Component
{
    public $name;
    public $attribute;


    public function mount($id){
        $this->attribute=Attribute::findOrFail($id);
       
        if($this->attribute){
            $this->name=$this->attribute->name;
        }
        else{
            return redirect()->route('admin.attributes')->with('error_message','Product Attribute NotFound');
        }


    }
    protected function rules()
    {
        return [
            'name'=>'required|unique:attributes,name,'.$this->attribute->id,
        ];

    }
    protected function message()
    {
        return [
        'name.required'=>'Name is required',
        'name.unique'=>'Name is aready exsist'
        ];

    }
    public function update()
    {
        $this->validate();
        $this->attribute->update($this->all());
        return redirect()->route('admin.attributes')->with('success_message','Product Attribute Updated Successfully');
    }
    public function render()
    {
        return view('livewire.admin.product-attribute.edit-attribute-component')->layout('layouts.base');
    }
}
