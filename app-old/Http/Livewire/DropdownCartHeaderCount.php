<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DropdownCartHeaderCount extends Component
{
    public $qty ;
    public $cartitem;
    // public $statusUpdate;

    // protected $listeners = [
    //     'sliderCardStored' => 'handleSliderCardStored'

    // ];

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
        // $statusUpdate = $this->statusUpdate->first();
        return view('livewire.dropdown-cart-header-count');
    }


    public function handleSliderCardStored()
    {
        // return $this->mount($cartitem);
        //  $this->cartitem = $cartitem;
        // $this->qty = $cartitem->qty;
    }
}
