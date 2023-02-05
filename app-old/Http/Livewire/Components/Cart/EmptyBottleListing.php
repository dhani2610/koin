<?php

namespace App\Http\Livewire\Components\Cart;

use Livewire\Component;

class EmptyBottleListing extends Component
{
    public $cart;

    public function render()
    {
        return view('livewire.components.cart.empty-bottle-listing');
    }
}
