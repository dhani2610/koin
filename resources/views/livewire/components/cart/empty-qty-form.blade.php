<div class="wishlist-status">
    <div class="box-quantity">
      <div class="input-quantity the-form-of-qty">
        <input wire:model="qty" data-x="foo" data-id="{{ str_replace("SKU: ", "", $cartitem->empetybottle->unique_id)}}" class="font-lg color-brand-3" type="text" value="{{ $qty }}">

        {{-- <input class="font-lg color-brand-3" type="text" value="{{ $cart->qty }}"> --}}
        <span class="minus-cart-icon" onclick="decrQty(this)" data-target="foo"></span>
        <span class="plus-cart-icon" onclick="incrQty(this)" data-target="foo"></span>
      </div>
    </div>
  </div>