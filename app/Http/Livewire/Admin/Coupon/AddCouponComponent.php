<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use App\Models\Coupon;

class AddCouponComponent extends Component
{
    public $code;
    public $type='fixed';
    public $value=0;
    public $cart_value=0;
    public $expire_date;



    protected function rules(){
        return[
            'code'=>'required|unique:coupons,code',
            'expire_date'=>'required|date|after_or_equal:'.today(),
            'value'=>'required|numeric|min:0',
            'cart_value'=>'required|numeric|min:0',
        ];
    }

    protected function message(){
        return[
            'code.required'=>'Code is Required',

            'code.unique'=>'Code is already Exist ',

            'expire_date.required'=>'Expire Date Is Required ',
            'expire_date.date'=>'Expire Date Invaild Formate',
            'expire_date.after_or_equal'=>'Expire Date Must Be Equal Or After Today ',

            'value.required'=>'Value Is Required ',
            'value.numeric'=>'Value Must be Numeric ',
            'value.min'=>'Value greater Than 0 ',

            'cart_value.required'=>'Cart Value Is Required ',
            'cart_value.numeric'=>'Cart Value Must be Numeric ',
            'cart_value.min'=>'Cart Value greater Than 0 ',
        ];
    }


    public function store(){
        $this->validate();
        Coupon::create($this->all());
        return redirect()->route('admin.coupons')->with("success_mesage",__('created'));
    }

    public function render()
    {
        return view('livewire.admin.coupon.add-coupon-component')->layout('layouts.base');
    }
}
