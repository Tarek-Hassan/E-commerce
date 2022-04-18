<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use App\Models\Coupon;

class ListCouponComponent extends Component
{
    public $paginate=10;

    public function delete($id){
        $coupon=Coupon::findOrFail($id);
        if($coupon){
            $coupon->delete();
            return redirect()->back()->with('success_message',__('deleted'));
        }
        return redirect()->back()->with('error_message', __('not_found'));
    }

    public function render()
    {
        return view('livewire.admin.coupon.list-coupon-component',[
            'items'=>Coupon::orderByDesc('created_at')->paginate($this->paginate),
        ])->layout('layouts.base');
    }
}
