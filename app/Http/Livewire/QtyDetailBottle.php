<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class QtyDetailBottle extends Component
{
    public $qty = 1;
    public $item;
    public $product;

    public function render()
    {
        return view('livewire.qty-detail-bottle');
    }

    public function store()
    {
        // dd( $this->qty );
        if (Auth::user()) {
            $cart = Koinpack_shopping_cart::where('users_id',Auth::user()->id)
                    ->where('empetybottles_id',$this->product->id)
                    ->get();
                    // dd($cart);
            if ($cart->first()) {
                $cart->first()->qty += $this->qty;
                $cart->first()->save();

                $this->emit('updatedQty');

            } else {
                Koinpack_shopping_cart::create([
                    'users_id'           =>  Auth::user()->id,
                    'empetybottles_id'   =>  $this->product->id,
                    'qty'                =>  $this->qty,
                 ]);
                $this->emit('updatedQty');

            }

            
        } else {
            return redirect()->route('login');
            
        }
        // $a='p';
        // $this->emit('refreshSliderCard');
        // $this->emit('sliderCardStored');

        
    }
}
