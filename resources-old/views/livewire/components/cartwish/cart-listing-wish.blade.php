<div class="item-wishlist">
  <div class="wishlist-cb">
    <!-- <input class="cb-layout cb-select" type="checkbox"> -->
  </div>
  <div class="wishlist-product">
    <div class="product-wishlist">
      <div class="product-image"><a href="#">
        <img src="{!!$cart->product->image ? Storage::url($cart->product->image) : url('backend/assets/img/news/img11.jpg') !!} "
        
      </a>
      </div>
      <div class="product-info"><a href="#">
          <h6 class="color-brand-3">{{ $cart->product->name }}</h6></a>
        <!-- <div class="rating"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><span class="font-xs color-gray-500"> (65)</span></div> -->
      </div>
    </div>
  </div>
  <div class="wishlist-price">
    <h4 class="color-brand-3">{{ rupiah($cart->product->price) }}</h4>
  </div>
  <div class="wishlist-status"><span class="btn btn-gray font-md-bold color-brand-3">In Stock</span></div>
  <div class="wishlist-action"><button wire:click="$emit('addCartWish', {{ $cart->id }})" class="btn btn-cart font-sm-bold" href="#">Add to Cart</button></div>
  <div class="wishlist-remove"><button wire:click="$emit('deleteCartWish', {{ $cart->id }})" class="btn btn-delete" href="#"></button></div>
</div>