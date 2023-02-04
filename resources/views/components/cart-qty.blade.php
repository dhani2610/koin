{{-- <form wire:submit.prevent="store" class="the-form-of-qty">         --}}
  <div class="buy-product pt-10">
    <div class="box-quantity ">
      <div class="input-quantity mx-auto">
        {{-- <input wire:model="qty" data-id="{{ str_replace("SKU: ", "", $cartitem->product->unique_id)}}" class="font-lg color-brand-3" type="text" value="{{ $cartitem->qty }}"> --}}
        {{-- <input data-id="{{ str_replace("SKU: ", "", $cartitem->product->unique_id)}}" class="font-lg color-brand-3" type="text" value="{{ $cartitem->qty }}"> --}}
        
        <input wire:model="qty" data-id="{{ str_replace("SKU: ", "", $cartitem->product->unique_id)}}" class="font-lg color-brand-3" type="text" value="{{ $qty }}">
        {{-- <input type="text" class="form-control" wire:model.lazy="billingRate" value="1"> --}}

        {{-- <input wire:model.lazy="billingRate" class="font-lg color-brand-3" type="text" value="{{ $cartitem->qty }}"> --}}
        {{-- <input wire:model="billingRate" class="font-lg color-brand-3" type="text" value="{{ $cartitem->qty }}"> --}}
        {{-- <input class="font-lg color-brand-3" type="text" value="{{ $cartitem->qty }}"> --}}
        <span class="minus-cart"></span>
        <span class="plus-cart"></span>
      </div>
    </div>
  </div>
  {{-- <div class="mt-20 box-btn-cart">
    <button type="store" class="btn btn-cart">Update</button>
  </div> --}}
  {{-- </form> --}}