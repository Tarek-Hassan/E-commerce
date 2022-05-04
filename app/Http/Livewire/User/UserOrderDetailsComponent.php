<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class UserOrderDetailsComponent extends Component
{
    public $order;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $status;
    public $subtotal;
    public $discount;
    public $tax;
    public $total;

    public function mount($id){
        $this->order=Order::findOrFail($id);
        if($this->order && $this->order->user_id==Auth::id()){
            $this->firstname=$this->order->firstname;
            $this->lastname=$this->order->lastname;
            $this->mobile=$this->order->mobile;
            $this->email=$this->order->email;
            $this->line1=$this->order->line1;
            $this->line2=$this->order->line2;
            $this->city=$this->order->city;
            $this->province=$this->order->province;
            $this->country=$this->order->country;
            $this->zipcode=$this->order->zipcode;
            $this->status=$this->order->status;
            $this->subtotal=$this->order->subtotal;
            $this->discount=$this->order->discount;
            $this->tax=$this->order->tax;
            $this->total=$this->order->total;
        }else{
            return redirect()->route('user.orders')->with('error_message',__('not_found'));
        }
        
    }

    public function cancelOrder(){
        $this->order->update([
            'canceled_at'=>now(),
            'status'=>'canceled',
        ]);
        return redirect()->route('user.orders')->with('success_message',__('order_status_updated'));
    }

    public function render()
    {
        return view('livewire.user.order-details-component',[
            'order'=>$this->order
        ])->layout('layouts.base');
    }
}
