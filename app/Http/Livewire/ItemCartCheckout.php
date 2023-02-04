<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ItemCartCheckout extends Component
{
    // public $priceCart;

    // public $qty;

    // public $carts;


    protected $listeners = [
        // 'getCarts' => 'showCarts'
        'refresh-me' => '$refresh'

    ];

    public function mount()
    {
    }

    public function render()
    {
        if (Auth::user()) {
            $carts = Koinpack_shopping_cart::with([
                'product', 'customer','customer_full'
            ])
            ->whereHas('product')
            ->whereHas('customer_full')
            ->where('users_id', Auth::user()->id)
            ->get();
            return view('livewire.item-cart-checkout', [
                'carts'    =>  $carts,
            ]);
        } else {
            return route('home');
        }

        return view('livewire.item-cart-checkout');
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Koinpack_shopping_cart::find($id);
            $data->delete();
            $this->emitSelf('refresh-me');

            // $this->emit('updatedQty');
            // return redirect()->back();
            // session()->flash('message', 'Contact was deleted!');
        }
    }
}
