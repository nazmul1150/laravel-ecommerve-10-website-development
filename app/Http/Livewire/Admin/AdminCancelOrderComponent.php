<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class AdminCancelOrderComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $status = 'canceled';

        $orders = Order::where('status', $status)->orderBy('created_at','DESC')->paginate(10);

        return view('livewire.admin.admin-cancel-order-component',['orders'=>$orders])->layout('admin.layouts.base');
    }
}
