<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewComponent extends Component
{
    public $orderItem;
    public $rating;
    public $user_id;
    public $comment;

    public function mount($id){
        $this->user_id=Auth::id();
        $this->orderItem=OrderItem::findOrFail($id);
    }
    protected function rules(){
        return[
            'rating'=>'required',
            'comment'=>'required',
        ];
    }
    protected function message(){
        return [
            'rating.required'=>'Rating is Required',
            'comment.required'=>'Comment is Required',
        ];
    }

    public function addReview(){
        $this->validate();
     

        $this->orderItem->review()->create($this->all());
        $this->orderItem->update([
            'status'=>true,
        ]);
        return redirect()->back()->with("success_message",__('reviewed_Successfully'));

    }
    public function render()
    {
        return view('livewire.user.review-component',[
            'orderItem'=>$this->orderItem,
        ])->layout('layouts.base');
    }
}
