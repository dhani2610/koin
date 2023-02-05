<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;

class SliderCard extends Component
{
    public $qty = 1;
    public $item;
    public $product;


    public function render()
    {
        return view('livewire.slider-card');
    }

    public function store()
    {
        // dd( $this->qty );
        if (Auth::user()) {
            $cart = Koinpack_shopping_cart::where('users_id', Auth::user()->id)
                    ->where('products_id', $this->product->id)
                    ->get();
            // dd($cart);
            if ($cart->first()) {
                $cart->first()->qty += $this->qty;
                $cart->first()->save();
            } else {
                Koinpack_shopping_cart::create([
                    'users_id'      =>  Auth::user()->id,
                    'products_id'   =>  $this->product->id,
                    'qty'           =>  $this->qty,
                 ]);
            }
        } else {
            return redirect()->route('login');
        }
        // $a='p';
        // $this->emit('refreshSliderCard');
        $this->emit('sliderCardStored');
        $this->emit('updatedQty');
    }
}
