@extends('layouts.appalner')
@section('title','Detail - Alner ')
@section('content')

  <!-- Detail Start -->
  <section class="section-box shop-template mt-60">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="gallery-image">
            <div class="galleries">
              <div class="detail-gallery">
                <!-- <label class="label">-17%</label> -->
                <div class="product-image-slider">
                  <figure class="border-radius-10"><img src="{!!$item->image ? Storage::url($item->image) : url('backend/assets/img/news/img11.jpg') !!} " alt="product image"></figure>                     
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <h3 class="color-brand-3 mb-25">{{ $item->name }}</h3>
          <!-- <span class="bytext">by</span> -->
          <!-- <a class="byAUthor" href="shop-vendor-single.html"> Ecom Tech</a> -->
          <!-- <div class="rating mt-5"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><span class="font-xs color-gray-500"> (65)</span></div> -->
          <div class="border-bottom pt-20 mb-40"></div>
          <div class="box-product-price">
            <h3 class="color-brand-3 price-main d-inline-block mr-10">{{ rupiah($item->price) }}</h3><span class="color-gray-500 price-line font-xl line-througt">Rp 28.563</span>
          </div>
          <div class="info-product mt-20 font-md color-gray-900">{{ $item->unique_id }}</div>            
          <div class="buy-product mt-20">
            <p class="font-sm mb-20">Quantity</p>

            @livewire('qty-detail', [
                'product'    => $item,
            ])
            
          </div>
          <div class="border-bottom pt-30 mb-20"></div>
          @livewire('components.product.add-to-wishlist', ['product_id' => $item->id])             
        </div>
      </div>
      <div class="border-bottom pt-30 mb-10"></div>
    </div>
  </section>
  <!-- Detail End -->
  
  <!-- Description Start -->
  <section class="section-box shop-template">
    <div class="container">
      <div class="pt-30 mb-10">
        <ul class="nav nav-tabs nav-tabs-product" role="tablist">
          <li><a class="active" href="#tab-productinfo" data-bs-toggle="tab" role="tab" aria-controls="tab-productinfo" aria-selected="true">Product Info</a></li>
          <li><a href="#tab-return" data-bs-toggle="tab" role="tab" aria-controls="tab-return" aria-selected="true">Return & Info Refund Policy</a></li>
          <li><a href="#tab-shipping" data-bs-toggle="tab" role="tab" aria-controls="tab-shipping" aria-selected="true">Shipping Info</a></li>
        </ul>
        <div class="tab-content">
          @if ($item->description1)
          <div class="tab-pane fade active show" id="tab-productinfo" role="tabpanel" aria-labelledby="tab-productinfo">
            <div class="display-text-short">
              <p>{{ $item->description1 }}</p>
            </div>
          </div>   
          @endif

          @if ($item->description2)
          <div class="tab-pane fade" id="tab-return" role="tabpanel" aria-labelledby="tab-return">                
              <div class="display-text-short">
                <p>{{ $item->description2 }}</p>
              </div>
          </div>
          @endif

          @if ($item->delivery_Info)
          <div class="tab-pane fade" id="tab-shipping" role="tabpanel" aria-labelledby="tab-shipping">
            <div class="display-text-short">
              <p>{{ $item->delivery_Info }}</p>                  
            </div>
          </div>
          @endif
          
        </div>
      </div>
    </div>
  </section>
  <!-- Description End -->

@endsection
