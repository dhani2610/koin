<?php

namespace App\Http\Livewire;

use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewCartHeader extends Component
{
    public function render()
    {
        return view('livewire.view-cart-header');
    }

    // public function getCarts()
    // {
    //     // $this->statusUpdate = true; //menjadi triger, letaknya di pengkondisian index (line 11)
    //     // $carts = Koinpack_shopping_cart::with([
    //     //             'product', 'customer','customer_full'
    //     //         ])
    //     //         ->whereHas('product')
    //     //         ->whereHas('customer_full')
    //     //         ->where('users_id',Auth::user()->id)
    //     //         ->get();
    //     // $contact = Contact::find($id);
    //     $this->emit('getCarts');//ada variable yg di pass
    //     //utk kasus ini, dipassing ke listener contactUpdate.php

    // }
}
