<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;

class ContactComponent extends Component
{


    public function render()
    {
        return view('livewire.admin.contact-component',[
            'items'=>Contact::paginate(15),
        ])->layout('layouts.base');
    }
}
