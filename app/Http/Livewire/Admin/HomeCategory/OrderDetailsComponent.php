<?php

namespace App\Http\Livewire\Admin\HomeCategory;

use Livewire\Component;
use App\Models\Order;

class OrderDetailsComponent extends Component
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
        if($this->order){
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
            return redirect()->route('admin.orders')->with('error_message',__('not_found'));
        }
        
    }
    public function render()
    {
        return view('livewire.admin.home-category.order-details-component',[
            'order'=>$this->order
        ])->layout('layouts.base');
    }
}
