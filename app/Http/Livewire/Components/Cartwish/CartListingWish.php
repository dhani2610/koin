<?php

namespace App\Http\Livewire\Components\Cartwish;

use Livewire\Component;

class CartListingWish extends Component
{
    public $cart;

    public function render()
    {
        return view('livewire.components.cartwish.cart-listing-wish');
    }
}
