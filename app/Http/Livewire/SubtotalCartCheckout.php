<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubtotalCartCheckout extends Component
{
    // public $city;

    protected $listeners = [
        'updatedQty' => 'handleUpdated',
        'updatedQtyEmpty' => 'handleUpdatedEmpty',
        'deleteItemEmptyCart' => '$refresh',
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

        $emptyBottles = Koinpack_shopping_cart::with([
            'empetybottle'
        ])
        ->whereHas('empetybottle')
        ->where('users_id', Auth::user()->id)
        ->get();

        $total = 0;
        $totaleEmptyBottle = 0;

        foreach ($carts as $cart) {
            $sumQty = $cart->qty * $cart->product->price;
            $total +=$sumQty;
        }
        
        foreach ($emptyBottles as $emptyBottle) {
            $sumQtyBottle = $emptyBottle->qty * $emptyBottle->empetybottle->price;

            $totaleEmptyBottle +=$sumQtyBottle;
        }
        $hasil = $total - $totaleEmptyBottle;

        // dd($total);
        return view('livewire.subtotal-cart-checkout', [
            'hasil'                 =>  $hasil,
            'total'                 =>  $total,
            'totaleEmptyBottle'     =>  $totaleEmptyBottle,
        ]);
        // return view('livewire.subtotal-cart-checkout');
    }

    public function handleUpdatedEmpty()
    {
    }
    
    public function handleUpdated()
    {
    }
}
