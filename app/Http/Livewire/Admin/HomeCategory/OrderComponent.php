<?php

namespace App\Http\Livewire\Admin\HomeCategory;

use Livewire\Component;
use App\Models\Order;

class OrderComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.home-category.order-component',[
            'items'=>Order::orderByDesc('created_at')->paginate(12),
        ])->layout('layouts.base');
    }
}
