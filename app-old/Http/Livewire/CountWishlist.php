<?php

namespace App\Http\Livewire;

use App\Koinpack_wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CountWishlist extends Component
{
    protected $listeners = [
        'addCartWish' => '$refresh',
        // 'reloadCart' => '$refresh'
        'deleteItemCart' => 'countwish',
    ];

    public function render()
    {
        $count = Koinpack_wishlist::with([
            'product', 'customer', 'customer_full'
        ])
            ->whereHas('product')
            ->whereHas('customer_full')
            ->where('users_id', Auth::user()->id)
            ->get()
            ->count();
        return view('livewire.count-wishlist', [
            'count' =>  $count
        ]);
    }

    public function countwish()
    {
        // dd('a');
    }
}
