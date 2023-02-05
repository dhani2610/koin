<div>
  @foreach ($cartitems as $cartitem)
@php
    // dd('a');
@endphp
    <div class="item-cart mb-20">
      <div class="cart-image">
        @if ($cartitem->empetybottle)
            @if ($cartitem->empetybottle->image)
              <img src="{!! Storage::url($cartitem->empetybottle->image) !!}" alt="Alner" class="rounded">    
            @else
              <img src="{!! url('backend/assets/img/news/img11.jpg') !!}" alt="Alner" class="rounded">            
            @endif
        @else
        <img src="{!! url('backend/assets/img/news/img11.jpg') !!}" alt="Alner" class="rounded">        
        @endif
      </div>
      <div class="cart-info"><a class="font-sm-bold color-brand-3" href="{{ route('home') }}">{{ $cartitem->empetybottle->name }}</a>
        <p><span class="color-brand-2 font-sm-bold">{{ rupiah($cartitem->empetybottle->price) }}</span></p>
        
      
        <livewire:dropdown-cart-bottle-header-count wire:key="{{ $cartitem->empetybottles_id	 }}" :cartitem="$cartitem">
        </livewire:dropdown-cart-bottle-header-count>   
           
    
      </div>
    </div>
    
  @endforeach
</div>
