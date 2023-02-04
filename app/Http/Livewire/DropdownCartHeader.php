<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use App\Koinpack_statusupdate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DropdownCartHeader extends Component
{
    protected $listeners = [
        'updatedQty' => 'handleUpdated',
        'sliderCardStored' => 'handleSliderCardStored',
        'deleteItemCart' => '$refresh'
    ];


    public function render()
    {
        // dd($statusUpdate);
        $carts = Koinpack_shopping_cart::with([
            'product', 'customer','customer_full'
        ])
        ->whereHas('product')
        ->whereHas('customer_full')
        ->where('users_id', Auth::user()->id)
        ->get();

        return view('livewire.dropdown-cart-header', [
            'cartitems'     =>  $carts,
        ]);
    }


    public function handleSliderCardStored()
    {
    }

    public function handleUpdated()
    {
    }
}
