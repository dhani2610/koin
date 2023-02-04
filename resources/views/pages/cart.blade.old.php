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
                {{-- <div class="wishlist-action"><span class="font-md-bold color-brand-3">Subtotal</span></div> --}}
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
      <div class="row mb-50">
        <div class="col">
          {{-- <a class="btn btn-buy w-auto arrow-back " href="{{ url()->previous() }}">Continue shopping</a> --}}
          <div class="box-cart-right p-20">
            <h5 class="font-md-bold mb-10">Apply Coupon</h5><span class="font-sm-bold mb-5 d-inline-block color-gray-500">Using A Promo Code?</span>
            <div class="form-group d-flex">
              <input class="form-control mr-15" placeholder="Enter Your Coupon">
              <button class="btn btn-buy w-auto">Apply</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="box-cart-left">
            <h5 class="font-md-bold mb-10">Add Note</h5>
            <span class="font-sm-bold mb-5 d-inline-block color-gray-500">Instructions? Special requests? Add them here.</span>
            <!-- <span class="font-sm-bold d-inline-block color-brand-3">5%</span> -->
            <div class="form-group">
                <textarea class="form-control w-100 h-100" name="" id="" cols="100" rows="10"></textarea>                          
                <!-- <input class="form-control" placeholder="Instructions? Special requests? Add them here."> -->                      
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="summary-cart">
            <div class="border-bottom mb-10">
              <div class="row">
                <div class="col-6"><span class="font-sm-bold color-gray-500">Subtotal</span></div>
                <div class="col-6 text-end">
                  <h6>300.000</h6>
                </div>
              </div>
            </div>
            <div class="border-bottom mb-10">
              <div class="row">
                <div class="col-6"><span class="font-sm-bold color-gray-500">Shipping</span></div>
                <div class="col-6 text-end">
                  <h6>	Free</h6>
                </div>
              </div>
            </div>
            <div class="border-bottom mb-10">
              <div class="row">
                <div class="col-5"><span class="font-sm-bold color-gray-500">Estimate for</span></div>
                <div class="col-7 text-end">
                  <h6>West Java</h6>
                </div>
              </div>
            </div>
            <div class="mb-10">
              <livewire:subtotal-cart-checkout></livewire:subtotal-cart-checkout>
              
              <div class="row">
                <div class="col text-start mt-10">
                  <!-- <a class="btn btn-success w-auto" href="shop-checkout.html">Tambah Kemasan Kosong</a> -->
                  <div class="box-button"><a class="btn btn-buy" href="{{ route('empety-bottle') }} ">Add empty packaging</a></div>
                </div>
              </div>
            </div>
            <div class="box-button">
              <a class="btn btn-buy" href="{{ route('checkout') }}">Proceed To CheckOut</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- My Cart End -->

@endsection
