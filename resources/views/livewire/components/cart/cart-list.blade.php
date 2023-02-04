<div>
    {{-- Success is as dangerous as failure. --}}
    @foreach ($carts as $cart)
    <div>
        @livewire('components.cart.cart-listing', ['cart' => $cart], key($cart->id + $cart->qty))
    </div>
    @endforeach
</div>