@extends('layouts.appalner')
@section('title','Account - Alner ')
@section('content')

  <!-- My Account Start -->
  <section class="section-box shop-template mt-30">
    <div class="container box-account-template">
      @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
      @endif
      <!-- <h3>Hello Steven</h3> -->
      <!-- <p class="font-md color-gray-500">From your account dashboard. you can easily check &amp; view your recent orders,<br class="d-none d-lg-block">manage your shipping and billing addresses and edit your password and account details.</p> -->
      <div class="box-tabs mb-100">
        <ul class="nav nav-tabs nav-tabs-account" role="tablist">
          <li><a class="active" href="#tab-setting" data-bs-toggle="tab" role="tab" aria-controls="tab-detail" aria-selected="true" class="">Detail Order</a></li>
          {{-- <li><a href="#tab-order-tracking" data-bs-toggle="tab" role="tab" aria-controls="tab-order-tracking" aria-selected="false" class="">Order Tracking</a></li> --}}
        </ul>
        <div class="border-bottom mt-20 mb-40"></div>
        <div class="tab-content mt-30">
          {{-- <div class="tab-pane fade " id="tab-detail" role="tabpanel" aria-labelledby="tab-detail"> --}}
            <div class="list-notifications">
                @foreach ($orders as $order)
                <div class="box-orders" id="{{ $order->external_id }}">
                  <div class="head-orders">
                    <div class="head-left">
                      <h5 class="mr-20">Total: {{ rupiah($order->price) }}</h5>
                      <span class="font-md color-brand-3 mr-20">Date: {{\Carbon\Carbon::parse($order->created_at)->format('d F y')}}</span>
                      <span class="font-md color-brand-3 mr-20">
                        Order Id:#{{ $order->external_id }}
                      </span>
                      <span class="@if ($order->status == 'PENDING')
                        label-delivery bg-warning
                      @elseif($order->status == 'PAID')
                      label-delivery label-delivered
                      @else
                      label-delivery label-cancel
                      @endif">{{ $order->status }}</span>
                      
                    </div>
                    @if ($order->payment_link)
                      @if ($order->status == 'PENDING')
                      <div class="head-right">
                        <a href="{{ $order->payment_link }}" class="btn btn-buy font-sm-bold w-auto">Payment</a></div>
                      @endif
                    @endif
                  </div>
                  <div class="body-orders">
                    <div class="list-orders">
                      @php
                      // $product_order = json_decode($order->products_id);
                      // $name = explode('-',$product_order);
                      //     dd($name[0]);
                      @endphp
                      @foreach (json_decode($order->products_id) as $order_products)
                      @php
                          $productArr = explode('-',$order_products);
                          // dd($productArr[1]);
                          $product_order = App\Koinpack_product::find($productArr[0]);
                      @endphp
                      <div class="item-orders">
                        <div class="image-orders">
                          
                          {{-- <img src="{{ url('frontend/assets/imgs/page/account/img-1.png') }}" alt="Alner"> --}}
                        <img src="{!!$product_order->image ? Storage::url($product_order->image) : url('backend/assets/img/news/img11.jpg') !!} ">
                        </div>
                        <div class="info-orders">
                          <h5>{{ $product_order->name }}</h5>
                        </div>
                        <div class="quantity-orders">
                          <h5>Quantity: {{ $productArr[1]}}</h5>
                        </div>
                        <div class="price-orders">
                          <h5>{{ rupiah($productArr[2]) }}</h5>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>    
                @endforeach
            {{-- </div> --}}
        </div>
      </div>
    </div>
  </section>
  <!-- My Account End -->

@endsection
