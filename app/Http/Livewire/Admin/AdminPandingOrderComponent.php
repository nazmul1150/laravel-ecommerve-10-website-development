<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AdminPandingOrderComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateOrderStatus($orderid,$status)
    {
        $order = Order::find($orderid);
        $order->status = $status;

        if($status == 'delivered')
        {
            $order->delivery_date = DB::raw('CURRENT_DATE');
        }
        else if($status == 'canceled')
        {
            $order->cancel_date = DB::raw('CURRENT_DATE');
        }

        $order->update();

        return redirect()->route('admin.order')->with('message','Order status has been update successfully!');
    }

    public function render()
    {
        $status = 'panding';

        $orders = Order::where('status', $status)->orderBy('created_at','DESC')->paginate(10);

        return view('livewire.admin.admin-panding-order-component',['orders'=>$orders])->layout('admin.layouts.base');
    }
}
