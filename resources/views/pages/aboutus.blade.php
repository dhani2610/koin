@extends('layouts.appalner')
@section('title','About Us - Alner ')
@section('content')

<section class="section-box shop-template mt-30">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h3>About Us</h3>
        <h6 class="color-gray-500 mb-10">Our Story</h6>
        <div class="row mt-20">
          <div class="col-lg-6">
            <p class="fs-5 lh-base color-gray-700 mb-20">Alner is the new face of Koinpack. Alner provides your daily essentials in returnable and reusable packaging that can be used up to 20 times, eliminating the needs of single-use packaging at the source.</p>
            <p class="fs-5 lh-base color-gray-700 mb-20">We collaborate with brands to enable refillable versions of their conventional single-use products to activate a circular reuse ecosystem offering hundreds of products. The aim is to make reuse as convenient and accessible as single use.</p>
            <!-- <p class="font-sm font-medium color-gray-700 mb-15">Tempus iaculis urna id volutpat lacus laoreet. Id neque aliquam vestibulum morbi blandit. Lacinia quis vel eros donec ac odio tempor orci. Lectus sit amet est placerat in egestas erat imperdiet. Nunc congue nisi vitae suscipit. Sed adipiscing diam donec adipiscing tristique risus.</p> -->
            
          </div>
          <div class="col-lg-6"><img src="{{ url('frontend/assets/imgs/alner/aboutus.jpg') }}" alt="Alner" class="rounded-3"></div>
        </div>
        <div class="box-contact-support pt-80 pb-50 pl-50 pr-50 background-gray-50 mt-50 mb-90">
          <div class="row">
            <div class="col-lg-4 mb-30 text-center text-lg-start">
              <img src="{{ url('frontend/assets/imgs/alner/trucksize.svg') }}" alt="Alner"  class="pe-1" width="20%">
              <h6 class="mb-15">Get your favorite daily need products in our reusable packaging!</h6>
              <p class="font-md color-gray-700">Purchase you product needs via this webstore, pay conveniently using virtual accounts or bank transfers, and we will deliver the products to your home next day.</p>
            </div>
            <div class="col-lg-4 mb-30 text-center text-lg-start">
              <img src="{{ url('frontend/assets/imgs/alner/reys.png') }}" alt="Alner"  class="pe-1" width="20%">
              <h6 class="mb-15">Enjoy the products!</h6>
              <p class="font-md color-gray-700 mb-5">Finish the products, repurchase and exchange the empty packaging with the pre-filled ones during the next purchase. Return the empty packaging to our courier during the next delivery.</p>
            </div>
            <div class="col-lg-4 mb-30 text-center text-lg-start">
              <img src="{{ url('frontend/assets/imgs/alner/layers.svg') }}" alt="Alner"  class="pe-1" width="20%">
              <h6 class="mb-15">Leave the rest to us!</h6>
              <p class="font-md color-gray-700 mb-5">Alner will clean and sanitize the returned packaging in our facility, refill, and sell them again to the market. This way, we have prevented single-use packaging together! <br><br >Alner will recycle packaging that has reached its end-of-life cycle, ensuring the system is closed loop.</p>
            </div>
          </div>
        </div>

        <!-- Shop Deals Start-->
        <div class="banner-ads text-center mb-100" style="background-image: url('{{ url('frontend/assets/imgs/alner/banner7.jpg') }}'); background-size:cover; background-repeat: no-repeat; background-position: center center;">
          <h2 class="color-gray-1100 font-46 mb-5">Save every day!</h2>
          <p class="font-bold font-17 color-gray-1100">Help lower the cost of your shopping cart<br class="d-none d-lg-block">  with our daily specials</p>
          <div class="mt-20"><a class="btn btn-brand-2 btn-arrow-right mb-20" href="shop-grid.html">Shop Now</a></div>
        </div>
        <!-- Shop Deals End -->
      </div>
    </div>
  </div>
  <!-- Subscribe & Save Start -->
  <section class="section-box box-newsletter  " style="background-image: url({{ url('frontend/assets/imgs/alner/subscribe1.jpg') }});box-shadow: inset 0 0 0 2000px rgba(13, 13, 13, 0.599); background-size:cover; background-repeat: no-repeat; background-position: center center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h5 class="text-white mb-5">Subscrible &amp; Save</h5>
          <span class="d-inline"><h1 class="text-white">40% <span class="fs-5 align-text-top">off</span></h1></span>             
          <h3 class=" text-white mb-10">Your Next Order</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="box-form-newsletter mw-newsletter mt-15 d-inline-block">
            <form class="form-newsletter">
              <input class="input-newsletter font-xs" value="" placeholder="Your email Address">
              <button class="btn btn-brand-2">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Subscribe & Save End -->
</section>

@endsection
