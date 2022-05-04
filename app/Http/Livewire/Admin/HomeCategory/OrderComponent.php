<?php

namespace App\Http\Livewire\Admin\HomeCategory;

use Livewire\Component;
use App\Models\Order;

class OrderComponent extends Component
{
    public $status;
    public $order;

    public function UpdateOrderStatus($order_id,$status){
       
        $this->status=$status;
        $this->order=Order::findOrFail($order_id);
       
        if($this->order){
           
            if($this->status=='delivered'){
                $this->order->update([
                    'delivered_at'=>now(),
                    'status'=>'delivered',
                ]);
            }elseif ($this->status=='canceled') {
                $this->order->update([
                    'canceled_at'=>now(),
                    'status'=>'canceled',
                ]);
            }
            return redirect()->route('admin.orders')->with('success_message',__('order_status_updated'));
        }else{
            return redirect()->route('admin.orders')->with('error_message',__('not_found'));
        }
        
        
    }
    public function render()
    {
        return view('livewire.admin.home-category.order-component',[
            'items'=>Order::orderByDesc('created_at')->paginate(12),
        ])->layout('layouts.base');
    }
}
