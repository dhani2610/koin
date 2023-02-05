<div class="buy-product pt-10">
    <div class="box-quantity" wire:ignore>
      <div class="input-quantity mx-auto the-form-of-qty">

        {{-- data-x must unique as you want --}}
        <input wire:model="qty" data-x="popup" data-id="{{ str_replace("SKU: ", "", $cartitem->product->unique_id)}}" class="font-lg color-brand-3" type="text" value="{{ $qty }}">
        {{-- {{ $statusUpdate->first()->statusUpdate}} --}}
        
        <span class="minus-cart-icon" onclick="decrQty(this)" data-target="popup"></span>
        <span class="plus-cart-icon" onclick="incrQty(this)" data-target="popup"></span>
      </div>
    </div>
</div>