<?php

namespace App\Http\Livewire\Components\Product;

use App\Koinpack_product;
use Livewire\Component;

class ProductListHomekitchen extends Component
{
    public $min = 10;
    public $max = 1700000;

    protected $listeners = [
        'slider' => 'slide',
        'refreshProducts' => 'render'
    ];

    public function render()
    {
        $products = Koinpack_product::with('category')
            ->whereHas('category')
            ->where('category_id',8)
            ->where('price', '>=', $this->min)
            ->where('price', '<=', $this->max)
            ->get();

        return view('livewire.components.product.product-list-homekitchen', ['products' => $products]);
    }

    public function slide($minimum, $maximum)
    {
        $this->min = $minimum;
        $this->max = $maximum;
        $this->emitSelf('refreshProducts');
    }
}
