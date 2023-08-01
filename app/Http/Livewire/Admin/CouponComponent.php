<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Livewire\WithPagination;

class CouponComponent extends Component
{
    use WithPagination;

    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id)->delete();

        return redirect()->route('admin.coupon')->with('message','Delete coupon has been successfully!');
    }

    public function render()
    {
        $coupons = Coupon::orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.admin.coupon-component',['coupons'=>$coupons])->layout('admin.layouts.base');
    }
}
