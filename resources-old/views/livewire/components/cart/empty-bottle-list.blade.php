<div>
    @foreach ($carts as $cart)
    <div>
        {{-- {{ var_dump($cart->empetybottle) }} --}}
        @livewire('components.cart.empty-bottle-listing', ['cart' => $cart], key($cart->id + $cart->qty))
    </div>
    @endforeach
</div>
