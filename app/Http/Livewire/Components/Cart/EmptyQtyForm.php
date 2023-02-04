<?php

namespace App\Http\Livewire\Components\Cart;

use Livewire\Component;

class EmptyQtyForm extends Component
{
    public $qty;
    public $cartitem;

    public function mount($cartitem)
    {
        $this->cartitem = $cartitem;
        $this->qty = $cartitem->qty;
    }

    public function updatedQty()
    {
        $updateQty = $this->cartitem;
        $updateQty->qty = $this->qty;
        $updateQty->update();


        // dd($statusUpdate->statusUpdate);

        $this->emit('updatedQtyEmpty');
    }

    public function render()
    {
        return view('livewire.components.cart.empty-qty-form');
    }
}
