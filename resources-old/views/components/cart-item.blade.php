<div>
    <div class="dropdown-cart">
        <livewire:dropdown-cart-header :cartitems="$cartitems"></livewire:dropdown-cart-header> 
        
        {{-- @foreach ($cartitems as $cartitem)
          <div class="item-cart mb-20">
            <div class="cart-image">
              <img src="{!!$cartitem->product ? Storage::url($cartitem->product->image) : url('backend/assets/img/news/img11.jpg') !!}" alt="Alner" class="rounded">
            </div>
            <div class="cart-info"><a class="font-sm-bold color-brand-3" href="{{ route('home') }}">{{ $cartitem->product->name }}</a>
              <p><span class="color-brand-2 font-sm-bold">{{ rupiah($cartitem->product->price) }}</span></p>
                  
              <div class="buy-product pt-10">
                <div class="box-quantity ">
                  <div class="input-quantity mx-auto">
                    <input wire:model="qty" class="font-lg color-brand-3" type="text" value="{{ $cartitem->qty }}">
                    <span class="minus-cart"></span>
                    <span class="plus-cart"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @php
            $sumQty = $cartitem->qty * $cartitem->product->price;                         
            $total +=$sumQty;
          @endphp
        @endforeach --}}

        <div class="border-bottom pt-0 mb-15"></div>
        <div class="cart-total">
          <div class="row">
            
            <div class="col-6 text-start"><span class="font-md-bold color-brand-3">Subtotal</span></div>
            <div class="col-6">
                {{-- <span class="font-md-bold color-brand-1" >{{ rupiah($total) }}</span> --}}
                <livewire:total-cart-header :cartitems="$cartitems"></livewire:total-cart-header> 
            </div>
          </div>
          <div class="row">
            <div class="col text-start mt-10">
              <a class="btn btn-buy w-auto" href="{{ route('empety-bottle') }}">Add empty packaging</a>
            </div>
          </div>
          <div class="row mt-15">
            <div class="col-6 text-start"><a class="btn btn-cart w-auto" href="{{ route('cart') }}">Continue to cart</a></div>
          </div>
        </div>
      </div>   
        
    
</div>
