<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Coupon;
use Cart;
use Illuminate\Support\Facades\Auth;


class CartComponent extends Component
{

    public $haveCouponCode=0;
    public $couponCode;
    // public $couponType;
    // public $couponValue;
    // public $couponCartValue;
    public $discount;
    public $taxAfterDiscount;
    public $subtotalAfterDiscount;
    public $TotalAfterDiscount;

    public function increaseQuantity($rowId){
        
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty +1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
    }

    public function reduceQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
    }

    public function removeItem($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message",'Item Deleted Successfully');
    }
    
    public function destroy(){
        Cart::instance('cart')->destroy();
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message",'Shopping Cart is Clear Successfully');
    }
    
    public function moveToCart($rowId){
        $item=Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,$item->qty,$item->price)->associate(Product::class);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message",__('moved_to_savelater'));
    }
    // SaveLater
    public function switchToSaveLater($rowId){
        $item=Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,$item->qty,$item->price)->associate(Product::class);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message_save",__('moved_to_savelater'));
    }
    
    public function removeItemFromSaveLate($rowId){
        Cart::instance('saveForLater')->remove($rowId);
        $this->emitTo('admin.home-category.cart-count-component','refreshComponent');
        session()->flash("success_message_save",__('delete_from_savelater'));
    }
    // applyCoupon
    public function applyCoupon(){

        
        $coupon=Coupon::where('code',$this->couponCode)
                        ->where('cart_value','<=',Cart::instance('cart')->subtotal())
                        ->where('expire_date','>=', Carbon::today())
                        ->first();

        if(!$coupon){
            session()->flash("coupon_message",__('In vaild Coupon'));
        }else {
            # code...
            
                    // $this->couponCode=$coupon->code;
                    // $this->couponType=$coupon->type;
                    // $this->couponValue=$coupon->value;
                    // $this->couponCartValue=$coupon->cart_value;
            session()->put("coupon",[
                'code'=>$coupon->code,
                'type'=>$coupon->type,
                'value'=>$coupon->value,
                'cart_value'=>$coupon->cart_value,
            ]);
        }

        
        

    }

    public function calculateDiscount(){

        if(session()->has('coupon')){
            if(session()->get('coupon')['type'] == 'fixed'){
                $this->discount = session()->get('coupon')['value']; 
            }else{
                $this->discount = ( Cart::instance('cart')->subtotal() * session()->get('coupon')['value'] ) / 100;
            }
            $this->subtotalAfterDiscount= Cart::instance('cart')->subtotal() - $this->discount; 
            $this->taxAfterDiscount= ($this->subtotalAfterDiscount * config('cart.tax'))/100; 
            $this->TotalAfterDiscount= $this->TotalAfterDiscount + $this->taxAfterDiscount; 


        }


      
    }
    public function removeCoupon(){
        session()->forget('coupon');

    }
    // checkout
    public function checkout(){
        if(Auth::check()){
            return redirect()->route('product.checkout');
        }
            return redirect()->route('login');
    }
    public function setAmountForCheckout(){
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }
        
        if(session()->has('coupon')){
            session()->put('checkout',[
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'tax'=>$this->taxAfterDiscount,
                'total'=>$this->TotalAfterDiscount,
            ]);
        }
        else{
            session()->put('checkout',[
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'tax'=>Cart::instance('cart')->tax(),
                'total'=>Cart::instance('cart')->total(),
            ]);
            
        }



    }




    public function render()
    {
        if(session()->has('coupon')){
            if( Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');

            }else{
                $this->calculateDiscount();
                
            }
        }

        $this->setAmountForCheckout();
        $most_viewed_product=Product::inRandomOrder()->limit(8)->get();

        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        
        return view('livewire.cart-component',[
            'items'=>$most_viewed_product
        ])->layout('layouts.base');
    }
}
