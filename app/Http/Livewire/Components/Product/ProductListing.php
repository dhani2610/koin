<?php

namespace App\Http\Livewire\Components\Product;

use Livewire\Component;

class ProductListing extends Component
{
    public $item;

    public function render()
    {
        return view('livewire.components.product.product-listing');
    }
}
