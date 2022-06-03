<?php

namespace App\Http\Livewire\User\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ShowComponent extends Component
{
    public function render()
    {
        $userProfile=Profile::where('user_id',Auth::id())->first();
        if(!$userProfile){
            Profile::create([
                'user_id'=>Auth::id()
            ]);
        }
        return view('livewire.user.profile.show-component',[
            'user'=>User::findOrFail(Auth::id()),
        ])->layout('layouts.base');
    }
}
