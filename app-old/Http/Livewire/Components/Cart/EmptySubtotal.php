<?php

namespace App\Http\Livewire\Components\Cart;

use Livewire\Component;

class EmptySubtotal extends Component
{
    public $cartitem;

    protected $listeners = [
        'updatedQtyEmpty' => '$refresh'
    ];

    public function mount($cartitem)
    {
        $this->cartitem = $cartitem;
    }

    public function render()
    {
        return view('livewire.components.cart.empty-subtotal');
    }
}
