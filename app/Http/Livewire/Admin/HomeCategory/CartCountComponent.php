<?php

namespace App\Http\Livewire\Admin\HomeCategory;

use Livewire\Component;

class CartCountComponent extends Component
{
    protected $listeners =['refreshComponent'=>'$refresh'];

    public function render()
    {
        return view('livewire.admin.home-category.cart-count-component')->layout('layouts.base');
    }
   
}
