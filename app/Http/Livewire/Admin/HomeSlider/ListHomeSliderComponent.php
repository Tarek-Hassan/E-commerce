<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithPagination;

class ListHomeSliderComponent extends Component
{
    use WithPagination;

    public $paginate;

    public function mount()
    {
        $this->paginate=12;
    }


    public function delete($id){
        $homeSlider=HomeSlider::find($id);
        if($homeSlider){
            if ($homeSlider->image){
                unlink($homeSlider->image);
            }
            $homeSlider->delete();
            return redirect()->route("admin.homeSliders")->with('success_message',__('deleted'));
        }
        return redirect()->route("admin.homeSliders")->with('error_message','Data Notfound');
    }

    public function render()
    {
        return view('livewire.admin.home-slider.list-home-slider-component',[
            'items'=>HomeSlider::orderByDesc('created_at')->paginate($this->paginate),
        ])->layout('layouts.base');
    }
}
