<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;

class EditProductComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.product.edit-product-component')->layout('layouts.base');
    }
}
