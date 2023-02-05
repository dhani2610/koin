<div>
    @foreach ($carts as $cart)
    <div>
        @livewire('components.cartwish.cart-listing-wish', 
            [
                'cart' => $cart
            ],
            key($cart->id)
            )
    </div>
    @endforeach
</div>
