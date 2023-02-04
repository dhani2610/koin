<?php

namespace App\Http\Livewire\Components\Cart;

use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartList extends Component
{
    protected $listeners = [
        'deleteCart' => 'delete',
        'reloadCartWish' => '$refresh'
    ];

    public function render()
    {
        $carts = Koinpack_shopping_cart::with([
            'product', 'customer', 'customer_full'
        ])
            ->whereHas('product')
            ->whereHas('customer_full')
            ->where('users_id', Auth::user()->id)
            ->get();
        return view('livewire.components.cart.cart-list', ['carts' => $carts]);
    }

    public function delete($id)
    {
        if ($id) {
            $data = Koinpack_shopping_cart::find($id);
            $data->delete();
        }

        $this->emitSelf('reloadCartWish');
        $this->emit('deleteItemCart');
    }
}
