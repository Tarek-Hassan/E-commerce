<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboard-component',[
            'orders'=>Order::where('user_id',Auth::id())->orderByDesc('created_at')->get()->take(10),
            'totalCost'=>Order::where('user_id',Auth::id())->where('status','!=','canceled')->sum('total'),
            'totalPurchase'=>Order::where('user_id',Auth::id())->where('status','!=','canceled')->count(),
            
            'totalDelivered'=>Order::where('user_id',Auth::id())->where('status','delivered')->whereDate('created_at',today())->sum('total'),
            'totalCanceled'=>Order::where('user_id',Auth::id())->where('status','canceled')->whereDate('created_at',today())->count(),
        ])->layout('layouts.base');
    }
}
