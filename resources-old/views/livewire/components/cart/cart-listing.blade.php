<div class="item-wishlist">

    <div class="wishlist-cb"></div>
    <div class="wishlist-product">
        <div class="product-wishlist">
            <div class="product-image">
                <img src="{!!$cart->product->image ? Storage::url($cart->product->image) : url('backend/assets/img/news/img11.jpg') !!} "
                    alt="Alner" class="rounded">
            </div>
            <div class="product-info">
                <h6 class="color-brand-3">{{ $cart->product->name }}</h6>
            </div>
        </div>
    </div>
    <div class="wishlist-price">
        <h6 class="color-brand-3">{{ number_format($cart->product->price,0,',','.') }}</h6>
    </div>

    <livewire:item-cart-checkout-qty :qty="$cart->qty" :cartitem="$cart"></livewire:item-cart-checkout-qty>

    <div class="wishlist-action">
        <livewire:sub-cart-checkout-qty :cartitem="$cart"></livewire:sub-cart-checkout-qty>
    </div>
    <div class="wishlist-remove">
        <button wire:click="$emit('deleteCart', {{ $cart->id }})" class="btn btn-delete"></button>
    </div>
</div>