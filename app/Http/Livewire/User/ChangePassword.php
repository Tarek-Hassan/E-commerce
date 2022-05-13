<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    protected function rules(){
        return[
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password',
        ];
    }

    protected function message(){
        return[
            'current_password.required'=>'Current Password is Required',
            'password.required'=>'Password is Required',
            'password.confirmed'=>'Password Not Like Confirmation',
            'password.different'=>'Password Should be Different Current Password',
            'password.min'=>'Value greater Than 8',
        ];
    }

    public function changePassword(){
        
        $this->validate();
        if(Hash::check($this->current_password, Auth::user()->password)){
            Auth::user()->update([
                'password'=>Hash::make($this->password),
            ]);

            return redirect()->back()->with("success_message",__('password Updated'));
        }
        return redirect()->back()->with("error_message",__('password Not Correct'));
    }
    
    public function render()
    {
        return view('livewire.user.change-password')->layout('layouts.base');
    }
}
