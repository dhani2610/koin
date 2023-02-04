<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemCartCheckoutQty extends Component
{
    public $qty ;
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

        $this->emit('updatedQty');
    }

    public function render()
    {
        return view('livewire.item-cart-checkout-qty');
    }
}
