<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ShopComponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.shop-component',[
            'items' => Product::paginate(5),
        ])->layout('layouts.base');
    }
}
