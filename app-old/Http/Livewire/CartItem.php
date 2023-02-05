<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartItem extends Component
{
    // public $cartitems;
    public $qty = 1;

    protected $listeners = [
        'sliderCardStored' => 'handleSliderCardStored'
    ];

    

    public function render()
    {
        $carts = Koinpack_shopping_cart::with([
            'product', 'customer','customer_full'
        ])
        ->whereHas('product')
        ->whereHas('customer_full')
        ->where('users_id',Auth::user()->id)
        ->get();

        return view('livewire.cart-item',[
            'cartitems'     => $carts
        ]);
    }

    public function handleSliderCardStored()
    {
        # code...
    }


}
