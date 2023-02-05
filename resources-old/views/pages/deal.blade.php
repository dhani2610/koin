@extends('layouts.appalner')
@section('title','Deal - Alner ')
@section('content')

<div class="section-box shop-template mt-30">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 order-first order-lg-last">
        <h2>Deals</h2>
        <!-- <div class="banner-ads-top mb-30">
          <a href="shop-single-product-3.html">
            <img src="{{ url('frontend/assets/imgs/page/shop/banner.png') }}" alt="Alner">
          </a>
        </div> -->
        <div class="box-filters mt-0 pb-5 border-bottom">
          <div class="row">
            <!-- <div class="col-xl-2 col-lg-3 mb-10 text-lg-start text-center">
              <a class="btn btn-filter font-sm color-brand-3 font-medium" href="#ModalFiltersForm" data-bs-toggle="modal">All Fillters</a>
            </div> -->
            <div class="text-lg-end text-center">
            <!-- <div class="col-xl-10 col-lg-9 mb-10 text-lg-end text-center"> -->
              <!-- <span class="font-sm color-gray-900 font-medium border-1-right span">Showing 1&ndash;16 of 17 results</span> -->
              {{-- <div class="d-inline-block ">
                <span class="font-sm color-gray-500 font-medium">Sort by:   
                </span>
                <div class="dropdown dropdown-sort">
                  <button class="btn dropdown-toggle font-sm color-gray-900 font-medium" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false">Newest</button>
                  <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort" style="margin: 0px;">
                    <li><a class="dropdown-item active" href="#">Newest</a></li>
                    <li><a class="dropdown-item" href="#">Price (low to high)</a></li>
                    <li><a class="dropdown-item" href="#">Price (high to low)</a></li>
                    <li><a class="dropdown-item" href="#">Name A-Z</a></li>
                    <li><a class="dropdown-item" href="#">Name Z-A</a></li>
                  </ul>
                </div>
              </div> --}}
              <!-- <div class="d-inline-block"><span class="font-sm color-gray-500 font-medium">Show</span>
                <div class="dropdown dropdown-sort border-1-right">
                  <button class="btn dropdown-toggle font-sm color-gray-900 font-medium" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>30 items</span></button>
                  <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                    <li><a class="dropdown-item active" href="#">30 items</a></li>
                    <li><a class="dropdown-item" href="#">50 items</a></li>
                    <li><a class="dropdown-item" href="#">100 items</a></li>
                  </ul>
                </div>
              </div> -->
              <!-- <div class="d-inline-block"><a class="view-type-grid mr-5 active" href="shop-grid.html"></a><a class="view-type-list" href="shop-list.html"></a></div> -->
            </div>
          </div>
        </div>

        <!-- Card Show All Start -->
        @livewire('components.product.product-list-deal')

        <!-- <nav>
          <ul class="pagination">
            <li class="page-item"><a class="page-link page-prev" href="#"></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link active" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link page-next" href="#"></a></li>
          </ul>
        </nav> -->
        <!-- Card Show All Start -->

      </div>

      <!-- Categories Start -->
      @include('includes.categori')
      <!-- Categories End -->
    </div>
  </div>
</div>
<div class="modal fade" id="ModalQuickview" tabindex="-1" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-xl">
    <div class="modal-content apply-job-form">
      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body p-30">
        <div class="row">
          <div class="col-lg-6">
            <div class="gallery-image">
              <div class="galleries-2">
                <div class="detail-gallery">
                  <div class="product-image-slider-2">
                    <figure class="border-radius-10"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-1.jpg') }}" alt="product image"></figure>
                    <figure class="border-radius-10"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-2.jpg') }}" alt="product image"></figure>
                    <figure class="border-radius-10"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-3.jpg') }}" alt="product image"></figure>
                    <figure class="border-radius-10"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-4.jpg') }}" alt="product image"></figure>
                    <figure class="border-radius-10"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-5.jpg') }}" alt="product image"></figure>
                    <figure class="border-radius-10"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-6.jpg') }}" alt="product image"></figure>
                    <figure class="border-radius-10"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-7.jpg') }}" alt="product image"></figure>
                  </div>
                </div>
                <div class="slider-nav-thumbnails-2">
                  <div>
                    <div class="item-thumb"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-1.jpg') }}" alt="product image"></div>
                  </div>
                  <div>
                    <div class="item-thumb"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-2.jpg') }}" alt="product image"></div>
                  </div>
                  <div>
                    <div class="item-thumb"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-3.jpg') }}" alt="product image"></div>
                  </div>
                  <div>
                    <div class="item-thumb"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-4.jpg') }}" alt="product image"></div>
                  </div>
                  <div>
                    <div class="item-thumb"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-5.jpg') }}" alt="product image"></div>
                  </div>
                  <div>
                    <div class="item-thumb"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-6.jpg') }}" alt="product image"></div>
                  </div>
                  <div>
                    <div class="item-thumb"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-7.jpg') }}" alt="product image"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-tags">
              <div class="d-inline-block mr-25"><span class="font-sm font-medium color-gray-900">Category:</span><a class="link" href="#">Smartphones</a></div>
              <div class="d-inline-block"><span class="font-sm font-medium color-gray-900">Tags:</span><a class="link" href="#">Blue</a>,<a class="link" href="#">Smartphone</a></div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="product-info">
              <h5 class="mb-15">SAMSUNG Galaxy S22 Ultra, 8K Camera & Video, Brightest Display Screen, S Pen Pro</h5>
              <div class="info-by"><span class="bytext color-gray-500 font-xs font-medium">by</span><a class="byAUthor color-gray-900 font-xs font-medium" href="shop-vendor-list.html"> Ecom Tech</a>
                <div class="rating d-inline-block"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><img src="{{ url('frontend/assets/imgs/template/icons/star.svg') }}" alt="Alner"><span class="font-xs color-gray-500 font-medium"> (65 reviews)</span></div>
              </div>
              <div class="border-bottom pt-10 mb-20"></div>
              <div class="box-product-price">
                <h3 class="color-brand-3 price-main d-inline-block mr-10">$2856.3</h3><span class="color-gray-500 price-line font-xl line-througt">$3225.6</span>
              </div>
              <div class="product-description mt-10 color-gray-900">
                <ul class="list-dot">
                  <li>8k super steady video</li>
                  <li>Nightography plus portait mode</li>
                  <li>50mp photo resolution plus bright display</li>
                  <li>Adaptive color contrast</li>
                  <li>premium design & craftmanship</li>
                  <li>Long lasting battery plus fast charging</li>
                </ul>
              </div>
              <div class="box-product-color mt-10">
                <p class="font-sm color-gray-900">Color:<span class="color-brand-2 nameColor">Pink Gold</span></p>
                <ul class="list-colors">
                  <li class="disabled"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-1.jpg') }}" alt="Alner" title="Pink"></li>
                  <li><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-2.jpg') }}" alt="Alner" title="Gold"></li>
                  <li><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-3.jpg') }}" alt="Alner" title="Pink Gold"></li>
                  <li><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-4.jpg') }}" alt="Alner" title="Silver"></li>
                  <li class="active"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-5.jpg') }}" alt="Alner" title="Pink Gold"></li>
                  <li class="disabled"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-6.jpg') }}" alt="Alner" title="Black"></li>
                  <li class="disabled"><img src="{{ url('frontend/assets/imgs/page/product/img-gallery-7.jpg') }}" alt="Alner" title="Red"></li>
                </ul>
              </div>
              <div class="box-product-style-size mt-10">
                <div class="row">
                  <div class="col-lg-12 mb-10">
                    <p class="font-sm color-gray-900">Style:<span class="color-brand-2 nameStyle">S22</span></p>
                    <ul class="list-styles">
                      <li class="disabled" title="S22 Ultra">S22 Ultra</li>
                      <li class="active" title="S22">S22</li>
                      <li title="S22 + Standing Cover">S22 + Standing Cover</li>
                    </ul>
                  </div>
                  <div class="col-lg-12 mb-10">
                    <p class="font-sm color-gray-900">Size:<span class="color-brand-2 nameSize">512GB</span></p>
                    <ul class="list-sizes">
                      <li class="disabled" title="1GB">1GB</li>
                      <li class="active" title="512 GB">512 GB</li>
                      <li title="256 GB">256 GB</li>
                      <li title="128 GB">128 GB</li>
                      <li class="disabled" title="64GB">64GB</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="buy-product mt-5">
                <p class="font-sm mb-10">Quantity</p>
                <div class="box-quantity">
                  <div class="input-quantity">
                    <input class="font-xl color-brand-3" type="text" value="1"><span class="minus-cart"></span><span class="plus-cart"></span>
                  </div>
                  <div class="button-buy"><a class="btn btn-cart" href="shop-cart.html">Add to cart</a><a class="btn btn-buy" href="shop-checkout.html">Buy now</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
