<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Cart;
use Stripe;
use App\Mail\OrderMail;


class CheckoutComponent extends Component
{
    
    public $is_shipping_different=0;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $city;
    public $country;
    public $zipcode;
    public $line1;
    public $line2;
    public $province;
    public $paymentmode;
    public $thank=0;

    public $_firstname;
    public $_lastname;
    public $_email;
    public $_mobile;
    public $_city;
    public $_country;
    public $_zipcode;
    public $_line1;
    public $_line2;
    public $_province;

    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

    protected function rules(){
        return [
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|numeric',
            'city'=>'required',
            'country'=>'required',
            'zipcode'=>'required',
            'line1'=>'required',
            'line2'=>'nullable',
            'province'=>'required',
            'paymentmode'=>'required',
        ];
    }

    protected function message(){
        return [
            'firstname.required'=>'First Name is Required',
            'lastname.required'=>'Last Name is Required',

            'email.required'=>'Email is Required',
            'email.email'=>'Email In vaild',

            'mobile.required'=>'Mobile is Required',
            'mobile.numeric'=>'Mobile Must be Numeric ',

            'city.required'=>'City is Required',
            'country.required'=>'Country is Required',
            'zipcode.required'=>'Zip Code is Required',
            'line1.required'=>'Line1 is Required',
            'province.required'=>'Province is Required',
            'paymentmode.required'=>'Payment Mode is Required',
        ];
    }

    public function store(){
        $this->validate();
       $order= new Order;
        DB::transaction( function() use(&$order){
            $order=Order::create([
                        'firstname'=>$this->firstname,
                        'lastname'=>$this->lastname,
                        'email'=>$this->email,
                        'mobile'=>$this->mobile,
                        'city'=>$this->city,
                        'country'=>$this->country,
                        'zipcode'=>$this->zipcode,
                        'line1'=>$this->line1,
                        'line2'=>$this->line2,
                        'province'=>$this->province,
                        'status'=>'ordered',
                        'user_id'=>Auth::id(),
                        'is_shipping_different'=>$this->is_shipping_different,
                        'subtotal'=> session()->get('checkout')['subtotal'],
                        'discount'=> session()->get('checkout')['discount'],
                        'tax'=> session()->get('checkout')['tax'],
                        'total'=> session()->get('checkout')['total'],
                    ]);
         
            foreach (Cart::instance('cart')->content() as $item) {
                OrderItem::create([
                    'order_id'=>$order->id,
                    'product_id'=>$item->id,
                    'quantity'=>$item->qty,
                    'price'=>$item->price,
                ]);
                # code...
            }
    
            if ($this->is_shipping_different) {
                
                $this->validate([
                    '_firstname'=>'required',
                    '_lastname'=>'required',
                    '_email'=>'required|email',
                    '_mobile'=>'required|numeric',
                    '_city'=>'required',
                    '_country'=>'required',
                    '_zipcode'=>'required',
                    '_line1'=>'required',
                    '_line2'=>'nullable',
                    '_province'=>'required',
                ]);
                
                $shipping=Shipping::create([
                    'firstname'=>$this->_firstname,
                    'lastname'=>$this->_lastname,
                    'email'=>$this->_email,
                    'mobile'=>$this->_mobile,
                    'city'=>$this->_city,
                    'country'=>$this->_country,
                    'zipcode'=>$this->_zipcode,
                    'line1'=>$this->_line1,
                    'line2'=>$this->_line2,
                    'province'=>$this->_province,
                    'order_id'=>$order->id,
                ]);
                # code...
            }
            
            if($this->paymentmode =='cod'){
                $this->makeTransaction($order->id,'pending');
                $this->resetCart();
            }

            else if($this->paymentmode =='card'){
                $this->validate([
                    'cvc'=>'required',
                    'exp_month'=>'required',
                    'exp_year'=>'required',
                    'card_no'=>'required',
                ]);
                try {
            
                    $stripe=Stripe::make(env('STRIPE_KEY'));
                    $token=$stripe->tokens()->create([
                        'card'=>[
                            'number'=>$this->card_no,
                            'exp_month'=>$this->exp_month,
                            'exp_year'=>$this->exp_year,
                            'cvc'=>$this->cvc,
                        ]
                    ]);
                    if(!isset($token['id'])){
                        session()->flash('stripe_error','stripe token not generated ');
                        $this->thank=0;
                    }
                    $customer=$stripe->customers()->create([
                        'name'=>$this->firstname.' '.$this->lastname,
                        'email'=>$this->email,
                        'phone'=>$this->mobile,
                        'address'=>[
                            'line1'=>$this->line1,
                            'postal_code'=>$this->zipcode,
                            'city'=>$this->city,
                            'state'=>$this->province,
                            'country'=>$this->country,
                            
                        ],
                        'shipping'=>[
                            'name'=>$this->_firstname.' '.$this->_lastname,
                            'address'=>[
                                'line1'=>$this->_line1,
                                'postal_code'=>$this->_zipcode,
                                'city'=>$this->_city,
                                'state'=>$this->_province,
                                'country'=>$this->_country,
                                
                            ],

                        ],
                        'source'=>$token['id']
                    ]);
                    $charge=$stripe->charges()->create([
                        'customer'=>$customer['id'],
                        'currency'=>'USD',
                        'amount'=>session()->get('checkout')['total'],
                        'description'=>'payment for order no '.$order->id
                    ]);

                    if($charge['status']=='succeeded'){
                        $this->makeTransaction($order->id,'approved');
                        $this->resetCart(); 
                    }else{
                        session()->flash('stripe_error','Error In Transaction');
                        $this->thank=0;
                    }

                } catch (Exception $e) {
                    session()->flash('stripe_error',$e->getMessage());
                    $this->thank=0;
                }
               
            }


        });
        $this->sendOrderConfirmationMail($order);
 
    }
    public function resetCart(){
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id,$status){
        Transaction::create([
            'order_id'=>$order_id,
            'user_id'=>Auth::id(),
            'mode'=>$this->paymentmode,
            'status'=>$status,
        ]);

    }
    public function sendOrderConfirmationMail($order){
        Mail::to($order->email)->send(new OrderMail($order));

    }
    public function verifyForCheckout(){
        if(!Auth::check()){
            return redirect()->route('login');
        } elseif ($this->thank) {
            return redirect()->route('thank');
        }elseif (!session()->has('checkout')) {
            return redirect()->route('product.cart');
            # code...
        }
    }
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
