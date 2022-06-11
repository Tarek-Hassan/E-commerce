<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ListProductComponent extends Component
{
    use WithPagination;
    public $paginate;
    public $search;
    // protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->paginate=10;
    }

    public function delete($id){

        $product=Product::findOrFail($id);
       

        if ($product->image){
            unlink($product->image);
        }
        if ($product->images){
            $images=explode(",",$product->images);
            foreach ($images  as $image){
                unlink($image);
            }
        }
        $product->delete();

        return redirect()->back()->with('success_message',__('deleted'));
    }

    public function render()
    {
        if($this->search){
            $products=Product::where('name','like',"%{$this->search}%")
                                ->orderBy('created_at','Desc')->paginate($this->paginate);
        }
        else{
            $products=Product::orderBy('created_at','Desc')->paginate($this->paginate);

        }
        return view('livewire.admin.product.list-product-component',[
            'items'=>$products,
        ])->layout('layouts.base');
    }
}
