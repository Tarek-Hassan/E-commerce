<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use App\Models\Coupon;

class EditCouponComponent extends Component
{
    public $code;
    public $type='fixed';
    public $value=0;
    public $cart_value=0;
    public $expire_date;
    public $coupon;

    public function mount($id){
        $this->coupon=Coupon::findOrFail($id);
        if($this->coupon){
            $this->code=$this->coupon->code;
            $this->type=$this->coupon->type;
            $this->value=$this->coupon->value;
            $this->cart_value=$this->coupon->cart_value;
            $this->expire_date=$this->coupon->expire_date;
        }else{

            return redirect()->route('admin.coupons')->with('error_message',__('not_found'));
        }
    }
    protected function rules(){
        return[
            'code'=>'required|unique:coupons,code,'.$this->coupon->id,
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

    public function update(){
        $this->validate();
    
        $this->coupon->update($this->all());
        return redirect()->route('admin.coupons')->with("success_mesage",__('updated'));
    }
    
    public function render()
    {
        return view('livewire.admin.coupon.edit-coupon-component')->layout('layouts.base');
    }
}
