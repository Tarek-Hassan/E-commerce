<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;

class SettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twitter;
    public $facebook;
    public $pinterest;
    public $instagram;
    public $youtube;
    public $setting;




    public function mount(){
        $this->setting=Setting::first();
     
        if($this->setting){
            $this->email=$this->setting->email;
            $this->phone=$this->setting->phone;
            $this->phone2=$this->setting->phone2;
            $this->address=$this->setting->address;
            $this->map=$this->setting->map;
            $this->twitter=$this->setting->twitter;
            $this->facebook=$this->setting->facebook;
            $this->pinterest=$this->setting->pinterest;
            $this->instagram=$this->setting->instagram;
            $this->youtube=$this->setting->youtube;

        }

    }
    protected function rules(){
        return [
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'phone2'=>'nullable|numeric',
            
            'address'=>'required',
            'map'=>'required',
            'twitter'=>'required',
            'facebook'=>'required',
            'pinterest'=>'required',
            'instagram'=>'required',
            'youtube'=>'required',
        ];
    }

    protected function message(){
        return [

            'email.required'=>'Email is Required',
            'email.email'=>'Email is Invaild',
            
            'phone.required'=>'Phone is Required',
            'phone.email'=>'Phone  Must be Numeric',

            'phone2.email'=>'Phone2  Must be Numeric',

            'address.required'=>'Address is Required',
            'map.required'=>'Map is Required',
            'twitter.required'=>'Twitter is Required',
            'facebook.required'=>'FaceBook is Required',
            'pinterest.required'=>'Pinterest is Required',
            'instagram.required'=>'Instagram is Required',
            'youtube.required'=>'YouTube is Required',
          

        ];
    }

    public function store(){
        $this->validate();
        
        if($this->setting){
            $this->setting->update(
                $this->all()
            );
        }
        else{
            Setting::create(
                $this->all()
            );
        }

        return redirect()->route('admin.setting')->with("success_message",__('Setting Updated Successfully'));

    }

    public function render()
    {
        return view('livewire.admin.setting-component')->layout('layouts.base');
    }
}
