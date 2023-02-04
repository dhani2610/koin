<div class="item-wishlist">

    <div class="wishlist-cb"></div>
    <div class="wishlist-product">
        <div class="product-wishlist">
            <div class="product-image">
                <img src="{!!$cart->empetybottle->image ? Storage::url($cart->empetybottle->image) : url('backend/assets/img/news/img11.jpg') !!} "
                    alt="Alner" class="rounded">
            </div>
            <div class="product-info">
                <h6 class="color-brand-3">{{ $cart->empetybottle->name }}</h6>
            </div>
        </div>
    </div>
    <div class="wishlist-price">
        <h6 class="color-brand-3">{{ number_format($cart->empetybottle->price,0,',','.') }}</h6>
    </div>

    {{-- <livewire:item-cart-checkout-qty :qty="$cart->qty" :cartitem="$cart->empetybottle"></livewire:item-cart-checkout-qty> --}}
    @livewire('components.cart.empty-qty-form', ['cartitem' => $cart, 'qty' => $cart->qty])
    
    <div class="wishlist-action">
        @livewire('components.cart.empty-subtotal', ['cartitem' => $cart])
        {{-- <livewire:sub-cart-checkout-qty :cartitem="$cart"></livewire:sub-cart-checkout-qty> --}}
    </div>
    <div class="wishlist-remove">
        <button wire:click="$emit('deleteCartEmpty', {{ $cart->id }})" class="btn btn-delete"></button>
    </div>
</div>