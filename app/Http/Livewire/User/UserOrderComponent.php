<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class UserOrderComponent extends Component
{

    public function render()
    {
        return view('livewire.user.order-component',[
            'items'=>Order::where('user_id',Auth::id())->orderByDesc('created_at')->paginate(10),
        ])->layout('layouts.base');
    }
}
