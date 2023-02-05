<?php

namespace App\Http\Livewire\Components\Cart;

use Illuminate\Support\Facades\Auth;
use App\Koinpack_shopping_cart;
use Livewire\Component;

class EmptyBottleList extends Component
{
    protected $listeners = [
        'deleteCartEmpty' => 'delete',
        'reloadCartEmpty' => '$refresh'
    ];

    public function render()
    {
        $user = Auth::user();
        $carts = [];


        if ($user) {
            $id = $user->id;
            $carts = Koinpack_shopping_cart::with([
                'empetybottle'
            ])
                ->where('users_id', Auth::user()->id)
                ->whereNotNull('empetybottles_id')
                ->get();
        }

        return view('livewire.components.cart.empty-bottle-list', ['carts' => $carts]);
    }

    public function delete($id)
    {
        if ($id) {
            $data = Koinpack_shopping_cart::find($id);
            $data->delete();
        }

        $this->emitSelf('reloadCartEmpty');
        $this->emit('deleteItemEmptyCart');

    }
}
