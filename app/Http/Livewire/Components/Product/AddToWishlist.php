<?php

namespace App\Http\Livewire\Components\Product;

use App\Koinpack_wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToWishlist extends Component
{
    public $product_id;
    public $isExists = 0;

    public function mount()
    {
        if (Auth::user()) {
            # code...
            $user = Auth::user();
            $user_id = $user->id;
    
            $data = Koinpack_wishlist::where('users_id', $user_id)->where('products_id', $this->product_id)->get();
            if ($data->first()) {
    
                $this->isExists = 1;
            }
        }else {
            return redirect()->route('login');

        }
    }

    public function render()
    {
        return view('livewire.components.product.add-to-wishlist');
    }

    public function add()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $data = Koinpack_wishlist::where('users_id', $user_id)->where('products_id', $this->product_id)->get();
        if (!$data->first()) {

            Koinpack_wishlist::create([
                'users_id' => $user_id,
                'products_id' => $this->product_id
            ]);

            $this->isExists = 1;
            $this->emit('addCartWish');
        }
    }

    public function remove()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $data = Koinpack_wishlist::where('users_id', $user_id)->where('products_id', $this->product_id);
        $data->delete();

        $this->isExists = 0;
        $this->emit('addCartWish');
    }
}
