<?php

namespace App\Http\Livewire\Components\Cart;

use Livewire\Component;

class CartListing extends Component
{
    public $cart;

    public function render()
    {
        return view('livewire.components.cart.cart-listing');
    }
}
