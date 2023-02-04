{{-- {{ var_dump($cartitem->qty) }} --}}
{{-- {{ var_dump($cartitem->empetybottle) }} --}}
<h6 class="color-brand-3">{{ number_format($cartitem->empetybottle->price * $cartitem->qty,0,',','.') }}</h6>