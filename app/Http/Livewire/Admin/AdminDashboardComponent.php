<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dashboard-component',[
            'orders'=>Order::orderByDesc('created_at')->get()->take(10),
            'totalSales'=>Order::where('status','delivered')->count(),
            'totalRevenu'=>Order::where('status','delivered')->sum('total'),
            'todaySales'=>Order::where('status','delivered')->whereDate('created_at',today())->count(),
            'todayRevenu'=>Order::where('status','delivered')->whereDate('created_at',today())->sum('total'),
        ])->layout('layouts.base');
    }
}
