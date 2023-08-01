<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class EditCouponComponent extends Component
{
    public $name;
    public $type;
    public $dicount_value;
    public $price;
    public $expiry_date;

    public $coupon_id;

    public function mount($coupon_id)
    {
        $coupon = Coupon::where('id',$coupon_id)->first();
        $this->name = $coupon->name;
        $this->type = $coupon->type;
        $this->dicount_value = $coupon->dicount_value;
        $this->price = $coupon->price;
        $this->expiry_date = $coupon->expiry_date;
        $this->coupon_id = $coupon->id;
    }

     public function update($fields)
    {
        $this->validateOnly($fields,[
           'name' => 'required',
           'type' => 'required',
           'dicount_value' => 'required',
           'price' => 'required',
           'expiry_date' => 'required'
        ]);
    }

    public function editCoupon()
    {
        $this->validate([
            'name' => 'required',
            'type' => 'required',
            'dicount_value' => 'required',
            'price' => 'required',
            'expiry_date' => 'required'
        ]);

        $coupon = Coupon::find($this->coupon_id);
        
        $coupon->name = $this->name;
        $coupon->type = $this->type;
        $coupon->dicount_value = $this->dicount_value;
        $coupon->price = $this->price;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->update();

        return redirect()->route('admin.coupon')->with('message','Update coupon has been successfully!');
    }

    public function render()
    {
        return view('livewire.admin.edit-coupon-component')->layout('admin.layouts.base');
    }
}
