<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use Carbon\Carbon;

class CartComponent extends Component
{
    public $coupon_name;

    public $discount;
    public $subtotalAfterdiscount;
    public $taxAfterdiscount;
    public $totalAfterdiscount;
    public $subtotal;

    public function mount()
    {
       $this->subtotal = Cart::instance('cart')->subtotal();
    }

    public function incressQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->route('cart');
    }

    public function decressQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        if($product->qty > 1)
        {
            $qty = $product->qty - 1;
            Cart::instance('cart')->update($rowId,$qty);
            return redirect()->route('cart');
        }
    }

    public function deleteCartProduct($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart')->with('message','Successfully Item has been removed');
    }

    public function destroyCartitem()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart')->with('message','Successfully removed all Item');
    }

    //Coupon

    public function applyCoupon()
    {
        $coupon = Coupon::where('name', $this->coupon_name)->where('price', '<=', $this->subtotal)->where('expiry_date','>=',Carbon::today()->format('Y-m-d'))->first();

        //$coupon = Coupon::where('expiry_date','>=',Carbon::today()->format('Y-m-d'))->first();

        //$coupon = Coupon::where('name', $this->coupon_name)->first();

        if(!$coupon)
        {
           return redirect()->route('cart')->with('coupon_message','Coupon code is invalid!'); 
        }

        session()->put('coupon',[
            'name' => $coupon->name,
            'type' => $coupon->type,
            'dicount_value' => $coupon->dicount_value,
            'price' => $coupon->price
        ]);

        return redirect()->route('cart');
    }

    public function calculateDiscount()
    {
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['dicount_value'];
            }
            else
            {
               $this->discount = ($this->subtotal * session()->get('coupon')['dicount_value'])/100;
            }
            //dd( number_format($this->subtotal, 2, '.', ''));
            $this->subtotalAfterdiscount = $this->subtotal - $this->discount;
            $this->taxAfterdiscount = ($this->subtotalAfterdiscount * config('cart.tax'))/100;
            $this->totalAfterdiscount = $this->subtotalAfterdiscount + $this->taxAfterdiscount;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
       return redirect()->route('cart')->with('message','Coupon remove Successfully!');
    }

    public function checkout()
    {
         if(Auth::check())
         {
            return redirect()->route('checkout');
         }
         else
         {
            return redirect()->route('login');
         }
    }

    public function setAmountForCheckout()
    {
        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
            return redirect()->route('home');
        }

        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterdiscount,
                'tax' => $this->taxAfterdiscount,
                'total' => $this->totalAfterdiscount
            ]);
        }
        else
        {
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }

    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['price'])
            {
                session()->forget('coupon');
            }
            else
            {
                $this->calculateDiscount();
            }
        }

        $this->setAmountForCheckout();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        return view('livewire.cart-component')->layout('website.layouts.base');
    }
}
