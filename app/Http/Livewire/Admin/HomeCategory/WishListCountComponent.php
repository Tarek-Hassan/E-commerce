<?php

namespace App\Http\Livewire\Admin\HomeCategory;

use Livewire\Component;

class WishListCountComponent extends Component
{
    protected $listeners =['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.admin.home-category.wish-list-count-component')->layout('layouts.base');
    }
}
