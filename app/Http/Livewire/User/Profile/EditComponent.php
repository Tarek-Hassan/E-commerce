<?php

namespace App\Http\Livewire\User\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class EditComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $new_img;
    public $name;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $user_id;
    public $user;

public function mount(){
    $this->user=User::findOrFail(Auth::id());
    if($this->user){
        $this->name=$this->user->name;
        $this->email=$this->user->email;

        $this->image=$this->user->profile->image;
        $this->mobile=$this->user->profile->mobile;
        $this->line1=$this->user->profile->line1;
        $this->line2=$this->user->profile->line2;
        $this->city=$this->user->profile->city;
        $this->province=$this->user->profile->province;
        $this->country=$this->user->profile->country;
        $this->zipcode=$this->user->profile->zipcode;
    }
}
    protected function rules(){
        return [
            // 'name'=>'required|min:6',
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|numeric',
            'line1'=>'required',
            'line2'=>'nullable',
            'city'=>'required',
            'province'=>'required',
            'country'=>'required',
            'zipcode'=>'required',
        ];
    }

    protected function message(){
        return [
          
            'name.required'=>'Name is Required',
            'name.min'=>'Name Must be greater than 6 char',

            'email.required'=>'Email is Required',
            'email.email'=>'Email In vaild',

            'mobile.required'=>'Phone is Required',
            'mobile.numeric'=>'Phone Must be Numeric ',
            'line1.required'=>'Line1 is Required',

            'city.required'=>'City is Required',
            'province.required'=>'Province is Required',
            'country.required'=>'Country is Required',
            'zipcode.required'=>'Zip Code is Required',
        ];
    }


    public function updateProfile()
    {
        $this->validate();
        if($this->new_img){
            if($this->image){
                unlink($this->image);
            }
            $this->image='storage/'.$this->new_img->store('profile','public');
        }
        $this->user_id=Auth::id();
        $this->user->update([
            'name'=>$this->name,
            // 'email'=>$this->email,
        ]);
        Profile::where("user_id",Auth::id())->update([
            'image'=>$this->image,
          
            'mobile'=>$this->mobile,
           'line1' =>$this->line1,
            'line2'=>$this->line2,
            'city'=>$this->city,
            'province'=>$this->province,
            'country'=>$this->country,
            'zipcode'=>$this->zipcode,
        ]);
        return redirect()->route("user.profile")->with("success_message",__('updated'));
    }

    public function render()
    {
        return view('livewire.user.profile.edit-component',[
            'user'=>$this->user,
        ])->layout('layouts.base');
    }
}
