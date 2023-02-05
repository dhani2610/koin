<?php

namespace App\Http\Livewire\Components\Product;

use Livewire\Component;

class ProductSliderFilter extends Component
{
    public $min = 1000;
    public $max = 100000;

    public function updatedMin()
    {
        // $this->emit('slider', $this->min, $this->max);
    }

    public function updatedMax()
    {
        $this->emit('slider', $this->min, $this->max);
    }

    public function render()
    {
        return view('livewire.components.product.product-slider-filter');
    }
}
