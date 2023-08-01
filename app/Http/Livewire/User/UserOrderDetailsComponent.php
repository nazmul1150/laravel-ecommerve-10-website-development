<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;

class UserOrderDetailsComponent extends Component
{

    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order = Order::find($this->order_id);

        return view('livewire.user.user-order-details-component',['order'=>$order])->layout('website.layouts.base');
    }
}
