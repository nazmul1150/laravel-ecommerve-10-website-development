<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    protected $listener = ['refreshComponent'=>'$refresh'];
    
    public function render()
    {
        return view('livewire.wishlist-count-component');
    }
}
