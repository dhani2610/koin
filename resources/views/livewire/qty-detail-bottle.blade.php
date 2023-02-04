<form wire:submit.prevent="store" class="the-form-of-qty">
    <div class="box-quantity">
        <div class="input-quantity">
          {{-- <input class="font-xl color-brand-3" type="text" value="1"> --}}
          <input wire:model="qty" data-id="{{ str_replace("SKU: ", "", $product->unique_id)}}" class="font-lg color-brand-3" type="text" value="{{ $qty }}">

          <span class="minus-cart"></span>
          <span class="plus-cart"></span>
        </div>
        <div class="button-buy">
            <button type="submit" class="btn btn-cart">Add To Cart</button>

          {{-- <a class="btn btn-cart" type="submit" >Add to cart</a>      --}}
          <!-- <a class="btn btn-buy" href="shop-checkout.html">Buy now</a> -->
        </div>
    </div>
    
</form>