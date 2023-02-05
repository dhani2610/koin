<div>
    @foreach ($carts as $cart)
        
    <div class="item-wishlist">
        <div class="wishlist-cb">
          <!-- <input class="cb-layout cb-select" type="checkbox"> -->
        </div>
        <div class="wishlist-product">
          <div class="product-wishlist">
            {{-- <div class="product-image"><a href="shop-single-product.html"><img src="{{ url('frontend/assets/imgs/page/product/img-sub.png') }}" alt="Alner"></a></div>
                 <div class="product-info"><a href="shop-single-product.html"> --}}
            <div class="product-image">
                <img src="{!!$cart->product->image ? Storage::url($cart->product->image) : url('backend/assets/img/news/img11.jpg') !!} " alt="Alner" class="rounded">
            </div>
            <div class="product-info">
                <h6 class="color-brand-3">{{ $cart->product->name }}</h6></a>
              <!-- <div class="rating"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><span class="font-xs color-gray-500"> (65)</span></div> -->
            </div>
          </div>
        </div>
        <div class="wishlist-price">
          <h6 class="color-brand-3">{{ number_format($cart->product->price,0,',','.') }}</h6>
        </div>

          <livewire:item-cart-checkout-qty :cartitem="$cart" ></livewire:item-cart-checkout-qty>
        
        <div class="wishlist-action">

          <livewire:sub-cart-checkout-qty :cartitem="$cart" ></livewire:sub-cart-checkout-qty>

        </div>
        <div class="wishlist-remove">
          <button wire:click="destroy( {{ $cart->id }})" class="btn btn-delete"></button>
          {{-- <a wire:click="destroy( {{ $cart->id }})"  class="btn btn-delete"></a> --}}
        </div>
    </div>

    @endforeach
</div>
