<?php

namespace App\Http\Livewire\Components\Cartwish;

use App\Koinpack_shopping_cart;
use App\Koinpack_wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartListWish extends Component
{
    protected $listeners = [
        'addCartWish' => 'changecart',
        'deleteCartWish' => 'deletewish',
        'reloadCart' => '$refresh'
    ];

    public function render()
    {
        $carts = Koinpack_wishlist::with([
            'product', 'customer','customer_full'
        ])
        ->whereHas('product')
        ->whereHas('customer_full')
        ->where('users_id', Auth::user()->id)
        ->get();
        // dd($carts->first());
        return view('livewire.components.cartwish.cart-list-wish', [
            'carts' => $carts
        ]);
    }

    public function deletewish($id)
    {
        if ($id) {
            $data = Koinpack_wishlist::find($id);
            $data->delete();
        }

        $this->emitSelf('reloadCart');
        $this->emit('deleteItemCart');
    }

    public function changecart($id)
    {
        if ($id) {
            $data = Koinpack_wishlist::find($id);
            $cartId =Koinpack_shopping_cart::where('users_id',$data->users_id)
                ->where('products_id', $data->products_id)
                ->get();
            // dd($cartId);
            if ($cartId->first()) {
                $cartId->first()->qty +=1;
                $cartId->first()->save();
            } else {
                Koinpack_shopping_cart::create([
                    'users_id'      =>   $data->users_id,
                    'products_id'   =>   $data->products_id,
                    'qty'           =>   1,

                ]);
            }

            $data->delete();
        }

        $this->emitSelf('reloadCart');
        $this->emit('deleteItemCart');
        
    }
}
