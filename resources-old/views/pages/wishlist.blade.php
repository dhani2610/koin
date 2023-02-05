@extends('layouts.appalner')
@section('title','Wishlist - Alner ')
@section('content')

<!-- Box Wishlist Start -->
<section class="section-box shop-template mt-50">
    <div class="container">
      <div class="box-wishlist">
        <div class="head-wishlist">
          <div class="item-wishlist">
            <div class="wishlist-cb">
              <!-- <input class="cb-layout cb-all" type="checkbox"> -->
            </div>
            <div class="wishlist-product"><span class="font-md-bold color-brand-3">Product</span></div>
            <div class="wishlist-price"><span class="font-md-bold color-brand-3">Price</span></div>
            <div class="wishlist-status"><span class="font-md-bold color-brand-3">Stock status</span></div>
            <div class="wishlist-action"><span class="font-md-bold color-brand-3">Action</span></div>
            <div class="wishlist-remove"><span class="font-md-bold color-brand-3">Remove</span></div>
          </div>
        </div>
        <div class="content-wishlist">

          @livewire('components.cartwish.cart-list-wish')
          
        </div>
      </div>
    </div>
  </section>
  <!-- Box Wishlist End -->

@endsection
