<div class="dropdown-cart">
  @forelse ($carts->unique('products_id') as $cart)
    @php
      $sumQty = $carts->where('products_id',$cart->products_id)->sum('qty');
    @endphp
    <div class="item-cart mb-20">
      <div class="cart-image">
        <img src="{!!$cart->product->image ? Storage::url($cart->product->image) : url('backend/assets/img/news/img11.jpg') !!} " alt="Alner">                      
      </div>
      <div class="cart-info"><a class="font-sm-bold color-brand-3" href="{{ route('home') }}">{{ $cart->product->name }}</a>
        <p><span class="color-brand-2 font-sm-bold">{{ rupiah($cart->product->price) }}</span></p>
        <div class="buy-product pt-10">
          <div class="box-quantity ">
            <div class="input-quantity mx-auto">
              <input class="font-lg color-brand-3" type="text" value="{{ $sumQty }}">
              <span class="minus-cart"></span>
              <span class="plus-cart"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    @php
      // $countIdCart = $carts->where('products_id',$cart->products_id)->count();
      $kali = $sumQty * $cart->product->price;                    
      $total +=$kali;
    @endphp
  @empty
      Kosong
  @endforelse
  <div class="border-bottom pt-0 mb-15"></div>
  <div class="cart-total">
    <div class="row">
      
      <div class="col-6 text-start"><span class="font-md-bold color-brand-3">Subtotal</span></div>
      <div class="col-6"><span class="font-md-bold color-brand-1">{{ rupiah($total) }}</span></div>
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

{{-- card best deal --}}
<div class="swiper-slide " role="group" aria-label="7 / 10" data-swiper-slide-index="3" style="width: 426px; margin-right: 30px;">
  <div class="card-grid-style-3">
    <div class="card-grid-inner">
      <div class="image-box">
        <span class="label bg-primary">Best Deal</span>
        <a href="{{ route('detail-product') }}">
          <img src="{!!url('backend/assets/img/news/img11.jpg') !!} " alt="Alner">
        </a>
      </div>
      <div class="info-right">
        <a class="color-brand-3 font-sm-bold" href="{{ route('detail-product') }}">name</a>                      
        <div class="price-info">
          <strong class="font-lg-bold color-brand-3 price-main">price</strong>
        </div>
        <div class="buy-product pt-10">
          <div class="box-quantity ">
            <div class="input-quantity mx-auto">
              <input class="font-lg color-brand-3 jumlahQty" type="text" value="3">
              <span class="minus-cart"></span>
              <span class="plus-cart"></span>
            </div>
          </div>
        </div>
        <div class="mt-20 box-btn-cart">
          <a class="btn btn-cart add_student" href="">Add To Cart</a>
        </div>
      </div>
    </div>
  </div>
</div>