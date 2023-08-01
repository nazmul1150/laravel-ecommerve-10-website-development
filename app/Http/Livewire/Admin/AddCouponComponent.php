<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AddCouponComponent extends Component
{
    public $name;
    public $type;
    public $dicount_value;
    public $price;
    public $expiry_date;

    public function update($fields)
    {
        $this->validateOnly($fields,[
           'name' => 'required|unique:coupons',
           'type' => 'required',
           'dicount_value' => 'required',
           'price' => 'required',
           'expiry_date' => 'required'
        ]);
    }

    public function addCoupon()
    {
        $this->validate([
            'name' => 'required|unique:coupons',
            'type' => 'required',
            'dicount_value' => 'required',
            'price' => 'required',
            'expiry_date' => 'required'
        ]);

        $coupon = new Coupon();

        $coupon->name = $this->name;
        $coupon->type = $this->type;
        $coupon->dicount_value = $this->dicount_value;
        $coupon->price = $this->price;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();

        return redirect()->route('admin.coupon')->with('message','Add coupon has been successfully!');
    }

    public function render()
    {
        return view('livewire.admin.add-coupon-component')->layout('admin.layouts.base');
    }
}
