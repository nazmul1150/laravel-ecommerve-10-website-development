<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Review;

class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

     public function update($fields)
    {
        $this->validateOnly($fields,[
            'rating' => 'required',
            'comment' => 'required'
        ]);
    }

    public function addReview()
    {
         $this->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);

        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->order_item_id = $this->order_item_id;
        $review->save();

        $order = OrderItem::find($this->order_item_id);
        $order->rstatus = true;
        $order->update();

        return redirect()->route('dashboard')->with('message', 'Review Add Successfully!');
    }

    public function render()
    {
        $orderitem = OrderItem::find($this->order_item_id);

        return view('livewire.user.user-review-component',['orderitem'=>$orderitem])->layout('website.layouts.base');
    }
}
