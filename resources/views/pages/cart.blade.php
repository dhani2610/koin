@extends('layouts.appalner')
@section('title','Cart - Alner ')
@section('content')

  <!-- My Cart Start -->
  <section class="section-box shop-template">
    <div class="container-fluid mt-50">
      
      <div class="row">
        <div class="col-lg-6">
          <div class="box-carts">
            <div class="head-wishlist">
              <div class="item-wishlist">
                <div class="wishlist-cb">
                  <!-- <input class="cb-layout cb-all" type="checkbox"> -->
                </div>
                <div class="wishlist-product"><span class="font-md-bold color-brand-3">Product</span></div>
                <div class="wishlist-price"><span class="font-md-bold color-brand-3">Unit Price</span></div>
                <div class="wishlist-status"><span class="font-md-bold color-brand-3">Quantity</span></div>
                <div class="wishlist-action"><span class="font-md-bold color-brand-3">Subtotal</span></div>
                <div class="wishlist-remove"><span class="font-md-bold color-brand-3">Remove</span></div>
              </div>
            </div>
            <div class="content-wishlist mb-20">
                {{-- <livewire:item-cart-checkout></livewire:item-cart-checkout> --}}
                @livewire('components.cart.cart-list')
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="box-carts">
            <div class="head-wishlist">
              <div class="item-wishlist">
                <div class="wishlist-cb">
                  <!-- <input class="cb-layout cb-all" type="checkbox"> -->
                </div>
                <div class="wishlist-product"><span class="font-md-bold color-brand-3">Empty Bottles</span></div>
                <div class="wishlist-price"><span class="font-md-bold color-brand-3">Unit Price</span></div>
                <div class="wishlist-status"><span class="font-md-bold color-brand-3">Quantity</span></div>
                <div class="wishlist-action"><span class="font-md-bold color-brand-3">Subtotal</span></div>
                <div class="wishlist-remove"><span class="font-md-bold color-brand-3">Remove</span></div>
              </div>
            </div>
            <div class="content-wishlist mb-20">
              
              @livewire('components.cart.empty-bottle-list')              
            </div>
            
          </div>
        </div>
      </div>
      <div class="row flex justify-content-center">
        <div class="col-lg-12">
          <div class="summary-cart">
            <livewire:subtotal-cart-checkout></livewire:subtotal-cart-checkout>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- My Cart End -->

@endsection
