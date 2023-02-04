<div>
  @foreach ($cartitems as $cartitem)

    <div class="item-cart mb-20">
      <div class="cart-image">
        @if ($cartitem->product)
            @if ($cartitem->product->image)
              <img src="{!! Storage::url($cartitem->product->image) !!}" alt="Alner" class="rounded">    
            @else
              <img src="{!! url('backend/assets/img/news/img11.jpg') !!}" alt="Alner" class="rounded">            
            @endif
        @else
        <img src="{!! url('backend/assets/img/news/img11.jpg') !!}" alt="Alner" class="rounded">        
        @endif
      </div>
      <div class="cart-info"><a class="font-sm-bold color-brand-3" href="{{ route('home') }}">{{ $cartitem->product->name }}</a>
        <p><span class="color-brand-2 font-sm-bold">{{ rupiah($cartitem->product->price) }}</span></p>
        
        <livewire:dropdown-cart-header-count wire:key="{{ $cartitem->products_id }}" :cartitem="$cartitem">
        </livewire:dropdown-cart-header-count>   
           
    
      </div>
    </div>
    
  @endforeach
</div>
