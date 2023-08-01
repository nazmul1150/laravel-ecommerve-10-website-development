<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function moveProductFormCArt($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('\App\Models\Product');
        return redirect()->route('cart')->with('message','Successfully Item added in cart');
    }

    public function removeWishList($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $wishlist)
        {
            if($wishlist->id == $product_id)
            {
                Cart::instance('wishlist')->remove($wishlist->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return redirect();
            }
        }
    }

    public function render()
    {
        return view('livewire.wishlist-component')->layout('website.layouts.base');
    }
}
