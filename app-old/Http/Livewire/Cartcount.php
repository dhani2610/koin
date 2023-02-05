<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cartcount extends Component
{
    protected $listeners = [
        'sliderCardStored' => 'handleSliderCardStored',
        'deleteItemCart' => '$refresh'
    ];

    public function render()
    {
        $carts = Koinpack_shopping_cart::with([
            'product', 'customer','customer_full'
        ])
        ->whereHas('product')
        ->whereHas('customer_full')
        ->where('users_id', Auth::user()->id)
        ->get();

        return view('livewire.cartcount', [
            'cartsCount'     =>  $carts
        ]);
    }

    public function handleSliderCardStored()
    {
        # code...
    }
}
