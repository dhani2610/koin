<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubCartCheckoutQty extends Component
{
    public $cartitem;


    protected $listeners = [
        'updatedQty' => 'handleUpdated'
    ];

    // public function mount($cartitem)
    // {
    //     $this->cartitem = $cartitem;

    // }

    public function render()
    {
        return view('livewire.sub-cart-checkout-qty');
    }

    public function handleUpdated()
    {
        // dd('a');
    }
}
