<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use App\Koinpack_statusupdate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DropdownCartBottleHeader extends Component
{
    protected $listeners = [
        'updatedQtyEmpty' => 'handleEmptyUpdated',
        'sliderCardStored' => 'handleSliderCardStored',
        'deleteItemEmptyCart' => '$refresh',

    ];


    public function render()
    {
        // dd('a');
        $carts = Koinpack_shopping_cart::with([
            'empetybottle', 'customer','customer_full'
            ])
            ->whereHas('empetybottle')
            ->whereHas('customer_full')
            ->where('users_id', Auth::user()->id)
            ->get();
            
        return view('livewire.dropdown-cart-bottle-header', [
            'cartitems'     =>  $carts,
        ]);
    }


    public function handleSliderCardStored()
    {
    }

    public function handleEmptyUpdated()
    {
    }
}
