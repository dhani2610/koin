<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TotalCartHeader extends Component
{
    // public $cartitems;

    protected $listeners = [
        'updatedQty' => 'handleUpdated',
        'deleteItemCart' => '$refresh',
        'updatedQtyEmpty' => 'handleEmptyUpdated',
        'deleteItemEmptyCart' => '$refresh',
        
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
        return view('livewire.total-cart-header', [
                'total'                 =>  $total,
                'totaleEmptyBottle'     =>  $totaleEmptyBottle,
            ]);
    }

    public function handleUpdated()
    {
        // dd('a');
    }
    public function handleEmptyUpdated()
    {
        # code...
    }
}
