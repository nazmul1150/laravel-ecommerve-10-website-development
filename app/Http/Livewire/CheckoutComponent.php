<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class CheckoutComponent extends Component
{
    public $firstname;
    public $lastname;
    public $add1;
    public $add2;
    public $phone;
    public $email;
    public $city;
    public $zipcode;
    public $country;

    public $is_shipping_different;
    public $s_firstname;
    public $s_lastname;
    public $s_add1;
    public $s_add2;
    public $s_phone;
    public $s_email;
    public $s_city;
    public $s_zipcode;
    public $s_country;

    public $paymentmode;

    public $thankyou;

    public function mount()
    {
        $this->paymentmode = 'cas';
        $this->country = 'Bangladesh';
        $this->s_country = 'Bangladesh';
    }

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname' => 'required',
            'add1' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
            'zipcode' => 'required'
        ]);

        if($this->is_shipping_different)
        {
          $this->validateOnly($fields,[
            's_firstname' => 'required',
            's_lastname' => 'required',
            's_add1' => 'required',
            's_phone' => 'required',
            's_email' => 'required',
            's_city' => 'required',
            's_zipcode' => 'required'
          ]);
        }
    }

    public function placeOrder()
    {
        
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'add1' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
            'zipcode' => 'required'
        ]);

        //order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];

        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->add1 = $this->add1;
        $order->add2 = $this->add2;
        $order->phone = $this->phone;
        $order->email = $this->email;
        $order->city = $this->city;
        $order->zipcode = $this->zipcode;
        $order->country = $this->country;
        $order->status = 'ordered';
        $order->shipping_different = $this->is_shipping_different ? 1:0;
        $order->save();

        //orderitem
        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderitem = new OrderItem();
            $orderitem->product_id = $item->id;
            $orderitem->order_id = $order->id;
            $orderitem->price = $item->price;
            $orderitem->quantity = $item->qty;
            $orderitem->save();
        }

        //shipping
        if($this->is_shipping_different)
        {
            $this->validate([
            's_firstname' => 'required',
            's_lastname' => 'required',
            's_add1' => 'required',
            's_phone' => 'required',
            's_email' => 'required',
            's_city' => 'required',
            's_zipcode' => 'required'
          ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->add1 = $this->s_add1;
            $shipping->add2 = $this->s_add2;
            $shipping->phone = $this->s_phone;
            $shipping->email = $this->s_email;
            $shipping->city = $this->s_city;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->country = $this->s_country;
            $shipping->save();
        }

        //transaction
        if($this->paymentmode == 'cas')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cas';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;

        Cart::instance('cart')->destroy();
        session()->forget('checkout');

        $this->sendOrderConfirmationMail($order);

        return redirect()->route('thankyou');

        
    }

    public function verifyForChackout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('cart');
        }
    }

    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function render()
    {
        $this->verifyForChackout();

        return view('livewire.checkout-component')->layout('website.layouts.base');
    }
}
