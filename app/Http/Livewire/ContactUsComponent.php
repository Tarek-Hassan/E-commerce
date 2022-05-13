<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Setting;

class ContactUsComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;
    public $setting;

    public function mount(){
        $this->setting=Setting::first();
    }
    protected function rules(){
        return [
            'name'=>'required|min:6',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'comment'=>'required|max:500',
        ];
    }

    protected function message(){
        return [
            'name.required'=>'Name is Required',
            'name.min'=>'Name is more than 6',

            'email.required'=>'Email is Required',
            'email.email'=>'Email is Invaild',
            
            'phone.required'=>'Phone is Required',
            'phone.email'=>'Phone  Must be Numeric',
            'comment.required'=>'Comment is Required',
            'comment.max'=>'Comment less Than 500 ',

        ];
    }

    public function send(){
        $this->validate();
        Contact::create($this->all());
        return redirect()->route('contact-us')->with("success_message",__('Message Sent Successfully'));
    }
    
    public function render()
    {
        return view('livewire.contact-us-component',[
            'setting'=>$this->setting
        ])->layout('layouts.base');
    }
}
