<?php

namespace App\Http\Livewire\Admin\HomeCategory;

use Livewire\Component;
use App\Models\SaleSetting;

class HomeSaleSettingComponent extends Component
{
    public $sale_date ;
    public $status;

    public function mount(){
        if(SaleSetting::count() > 0){ 
            $saleSetting=SaleSetting::first();
            $this->sale_date = $saleSetting->sale_date;
            $this->status = $saleSetting->status;
        }else{
            $this->sale_date = now();
            $this->status=true;
        }

    }
    public function update(){

        if(SaleSetting::count() > 0){ 
            SaleSetting::first()->update($this->all());
        }else{
            SaleSetting::create($this->all());
        }

        return redirect()->route("admin.homeSaleSetting")->with('success_message',__('updated'));
    }

    public function render()
    {
        return view('livewire.admin.home-category.home-sale-setting-component')->layout('layouts.base');
    }

}
