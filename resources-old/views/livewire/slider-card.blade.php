<form wire:submit.prevent="store" class="the-form-of-qty">
    <div class="buy-product pt-10">
        <div class="box-quantity ">
            <div class="input-quantity mx-auto">
                {{-- <input wire:model="qty" data-id="{{ $product }}" class="font-lg color-brand-3" type="text" value="{{ $qty }}"> --}}

                {{-- data-x must unique as you want --}}
                <input wire:model="qty" data-x="slider" data-id="{{ str_replace("SKU: ", "", $product->unique_id)}}" class="font-lg color-brand-3" type="text" value="{{ $qty }}">
                
                <span class="minus-cart-icon" onclick="decrQty(this)" data-target="slider"></span>
                <span class="plus-cart-icon" onclick="incrQty(this)" data-target="slider"></span>
            </div>
        </div>
    </div>
    {{-- {{ $product->id }}
    {{ $qty }} --}}
    <div class="mt-20 box-btn-cart">
        <button type="submit" class="btn btn-cart">Add To Cart</button>
    </div>
</form>