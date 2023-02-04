@extends('layouts.appalner')
@section('title','Home - Alner ')

@push('prepend-style')
@endpush

@push('addon-style')
@endpush

@section('content')
<!-- hero start -->
  <section class="section-box d-block">
    <div class="banner-hero banner-home5 pt-0 pb-0">
      <div class="box-swiper">
        <div class="swiper-container swiper-group-1">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="banner-slide" style="background: url({{ url ('frontend/assets/imgs/alner/banner7.webp') }} ) no-repeat top center;">
                <div class="banner-desc">
                  
                    <!-- <label class="lbl-newarrival">new arrival</label> -->
                    <h4 class="">Easy, Convenient, and Sustainable.</h4>
                    <h1 class="color-gray-1000 mb-10 text-shadow">Your daily needs. <br>Less waste.</h1>
                    <h4 class="mb-40">Save Big on Your Favorite Brands</h4>
                    <a class="btn btn-gray-1000 btn-shop-now ">Shop Now</a>                     
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="banner-slide" style="background: url({{ url ('frontend/assets/imgs/alner/banner8.webp') }} ) no-repeat top center;">
                <div class="banner-desc">
                  
                    <!-- <label class="lbl-newarrival">new arrival</label> -->
                    <h4 class="">Easy, Convenient, and Sustainable.</h4>
                    <h1 class="color-gray-1000 mb-10 text-shadow">Your daily needs. <br>Less waste.</h1>
                    <h4 class="mb-40">Save Big on Your Favorite Brands</h4>
                    <a class="btn btn-gray-1000 btn-shop-now ">Shop Now</a>
                  
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="banner-slide" style="background: url({{ url ('frontend/assets/imgs/alner/banner9.webp') }} ) no-repeat top center;">
                <div class="banner-desc">
                  
                    <!-- <label class="lbl-newarrival">new arrival</label> -->
                    <h4 class="">Easy, Convenient, and Sustainable.</h4>
                    <h1 class="color-gray-1000 mb-10 text-shadow">Your daily needs. <br>Less waste.</h1>
                    <h4 class="mb-40">Save Big on Your Favorite Brands</h4>
                    <a class="btn btn-gray-1000 btn-shop-now">Shop Now</a>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination swiper-pagination-1"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- hero end -->

<!-- Home Delevery Start -->
  <section class="section-box mt-50">
    <div class="container">
      <ul class="list-col-5 d-md-flex justify-content-center">
        <li class="border-end">
          <div class="item-list border-none">
            <div class="icon-left"><img src="{{ url ('frontend/assets/imgs/template/truck.svg') }} " width="100%" alt="Alner"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Home Delivery</h5>
              <p class="font-sm color-gray-500">To Your Door</p>
            </div>
          </div>
        </li>
        <li class="border-end">
          <div class="item-list border-none">
            <div class="icon-left"><img src="{{ url ('frontend/assets/imgs/template/shopping-bag.svg') }} " width="100%" alt="Alner" style="fill: #04cc7c !important;"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">
                Shop at Stores</h5>
              <p class="font-sm color-gray-500">Check Out Locations</p>
            </div>
          </div>
        </li>
        <li class="border-end">
          <div class="item-list border-none">
            <div class="icon-left"><img src="{{ url ('frontend/assets/imgs/template/support.png') }} " width="100%" alt="Alner"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Available for You</h5>
              <p class="font-sm color-gray-500">Online Support 24/7</p>
            </div>
          </div>
        </li>
        <li class="">
          <div class="item-list border-none">
            <div class="icon-left"><img src="{{ url ('frontend/assets/imgs/template/smartphone.svg') }} " width="100%" alt="Alner"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Join Mitra Alner</h5>
              <p class="font-sm color-gray-500">Sign Up Now</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <!-- Home Delevery End -->

  <!-- Best Deal Start -->
  <section class="section-box mt-30">
    <div class="container">
      <div class="head-main bd-gray-200">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <ul class="nav nav-tabs text-start" role="tablist">
              <li class="pl-0"><a class="pl-0 active" href="#tab-1-featured" data-bs-toggle="tab" role="tab" aria-controls="tab-1-featured" aria-selected="true" data-index="1">
                  <h4>Best Deal</h4></a>
                </li>
            </ul>
          </div>
        </div>
      </div>
           
      {{-- @include('components.slider', ['items' => $items]) --}}
      @include('components.slider', ['items' => $items->where('category_id',11)])

      
    </div>
    <div class="container my-5">
      <button class="btn btn-success my-40 rounded-pill mx-auto d-flex">Shop Best Deals</button>
    </div>
  </section>
  <!-- Best Deal End -->
  
  <!-- It’s Wine O'Clock! start -->
  <section class="section-box mt-50">
    <div class="container">
      <div class="row">  
        <div class="col-lg-8 mb-20" style="background-image: url('{{ url ('frontend/assets/imgs/alner/banner2.jpg') }} '); background-size:cover; background-repeat: no-repeat; background-position: center center; ">        
              <div class="banner-small-home10 ">
                <div class="row">
                  <div class="col ">
                    <div class="info-banner mt-40 ms-4">
                      <h5 class="color-gray-1000 mb-20">It’s Wine O'Clock!</h5>
                      <h3 class="color-gray-1000 mb-5">Great Deals on</h3>
                    </div>
                  </div>
                  <div class="col">
                    <img src="{{ url ('frontend/assets/imgs/alner/limited.png') }} " alt="" class="ms-5" width="50%" style="margin-top: -40px;">
                  </div>
                </div>
                <div class="row">
                  <div class="col ms-4">
                    <span class="">
                      <h1 class="color-gray-1000 mb-10">Selected Wines</h1>
                      <p>I'm a paragraph. Click here to add your own text <br> and edit me. Let your users get to know you.</p>
                      <div class="mt-30"><a class="btn btn-brand-2 rounded-pill" href="shop-grid.html">Shop now</a></div>
                    </span>
                  </div>
                </div>
                <!-- <div class="box-img-banner"> <img class="img1" src="{{ url ('frontend/assets/imgs/alner/banner2.jpg') }} " alt="Alner"></div> -->
              </div>
        </div>
        <div class="col-lg-4 mb-20" >
          <div class="banner-small-home10 " style="background-image: url('{{ url ('frontend/assets/imgs/alner/banner3.jpg') }} '); background-size:cover; background-repeat: no-repeat; background-position: center center;">
            <div class="info-banner mt-40">
              <h5 class="color-gray-1000">Deal of the Week</h5>
              <span class="d-inline"><h1 class="color-gray-1000">40% <span class="fs-5 align-text-top">off</span></h1></span>
              <h4 class="color-gray-1000">Cleaning Supplies</h4>
              <!-- <h3 class="color-gray-500 mb-0">Summer 2022</h3> -->
              <div class="mt-30"><a class="btn btn-brand-2 rounded-pill" href="shop-grid.html">Shop now</a></div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- It’s Wine O'Clock! end -->


  <!-- Most Popular Categories start -->
  <section class="section-box mt-30">
    <div class="container">
      <div class="head-main bd-gray-200">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <ul class="nav nav-tabs text-start" role="tablist">
              <li class="pl-0"><a class="pl-0 active" href="#tab-1-featured" data-bs-toggle="tab" role="tab" aria-controls="tab-1-featured" aria-selected="true" data-index="1">
                  <h4>Most Popular Categories</h4></a>
                </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="box-swiper slider-shop-2">
        <div class="swiper-container swiper-group-3 swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
          <div class="swiper-wrapper pt-5" id="swiper-wrapper-6c7074be1e1e8238" aria-live="off" style="transform: translate3d(-1824px, 0px, 0px); transition-duration: 0ms;">
            
            @foreach ($items->where('category_id',12) as $item)
              @include('components.slider-most-popular', ['items' => $items->where('category_id',12)])
                
            @endforeach

          </div>
          <div class="swiper-pagination swiper-pagination-1 swiper-pagination-clickable swiper-pagination-bullets">
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
            <!-- <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span>
            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 3"></span> -->
          </div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        <div class="swiper-button-next swiper-button-next-group-3" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-6c7074be1e1e8238"></div>
        <div class="swiper-button-prev swiper-button-prev-group-3" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-6c7074be1e1e8238"></div>
      </div>
    </div>
    <div class="container my-5">
      <button class="btn btn-success my-40 rounded-pill mx-auto d-flex">Shop Most Popular</button>
    </div>
  </section>
  <!-- Most Popular Categories end -->

  <!-- Save Time & Money Start-->
  <section class="section-box mt-30 ">
    <div class="container-fluid">
      <div class="">
        <div class="row banner-ads pb-30">
          <div class="col d-none d-md-flex justify-content-end">
            <img src="{{ url ('frontend/assets/imgs/alner/Artboard.png') }} " alt="" width="40%" class=" rounded-3">
          </div>
          <div class="col">
            <h5 class="text-white mb-5">Save Time & Money</h5>
            <h2 class="text-white font-46 mb-5">Shop With Us</h2>
            <h2 class="text-white font-46 mb-5">on the Go</h2>
            <p class="font-bold font-17 color-white">Your weekly shopping routine, at your <br> door in just a click</p>
            <div class="mt-20">
              <a class="" href="#">
               <img src="{{ url ('frontend/assets/imgs/template/appstore.png') }} " alt="Alner" class="rounded-3">
              </a>
              <a href="#">
                <img src="{{ url ('frontend/assets/imgs/template/google-play.png') }} " alt="Alner" class="rounded-3">
              </a>
            <!-- <a class="btn btn-brand-2 btn-arrow-right" href="shop-grid.html">Shop Now</a> -->
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Save Time & Money End-->

  <!-- Featured start -->
  <section class="section-box mt-30">
    <div class="container">
      <div class="head-main bd-gray-200">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <ul class="nav nav-tabs text-start" role="tablist">
              <li class="pl-0"><a class="pl-0 active" href="#tab-1-featured" data-bs-toggle="tab" role="tab" aria-controls="tab-1-featured" aria-selected="true" data-index="1">
                  <h4>Featured</h4></a>
                </li>
            </ul>
          </div>
        </div>
      </div>
      @include('components.slider', ['items' => $items->where('category_id',10)])
      
    </div>
    <div class="container my-5">
      <button class="btn btn-success my-40 rounded-pill mx-auto d-flex">Shop Most Popular</button>
    </div>
  </section>
  <!-- Featured end -->


  <!-- Subscribe & Save Start -->
  <section class="section-box box-newsletter  " style="background-image: url({{ url ('frontend/assets/imgs/alner/subscribe1.jpg') }} );box-shadow: inset 0 0 0 2000px rgba(13, 13, 13, 0.599); background-size:cover; background-repeat: no-repeat; background-position: center center;">
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

  <!-- Partners Start -->
  <div class="section-box mt-30">
    <div class="section-box px-5 mb-30">
      <!-- <div class="container"> -->
        <div class="list-brands list-none-border">
          <div class="box-swiper">
            <div class="swiper-container swiper-group-10 swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
              <div class="swiper-wrapper" id="swiper-wrapper-7b4c858889dcef0a" aria-live="off" style="transform: translate3d(-284px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="18 / 30" data-swiper-slide-index="7" style="width: 79.6667px; margin-right: 15px;"><a href="shop-grid.html"><img src="{{ url ('frontend/assets/imgs/slider/logo/panasonic.svg') }} " alt="Alner"></a></div><div class="swiper-slide swiper-slide-duplicate" role="group" aria-label="19 / 30" data-swiper-slide-index="8" style="width: 79.6667px; margin-right: 15px;"><a href="shop-grid.html"><img src="{{ url ('frontend/assets/imgs/slider/logo/vaio.svg') }} " alt="Alner"></a></div><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" role="group" aria-label="20 / 30" data-swiper-slide-index="4" style="width: 79.6667px; margin-right: 15px;"><a href="shop-grid.html"><img src="{{ url ('frontend/assets/imgs/slider/logo/sharp.svg') }} " alt="Alner"></a></div>
                @foreach ($slider_logos as $slider_logo)
                <div class="swiper-slide " role="group" aria-label="11 / 30" data-swiper-slide-index="0" style="width: 79.6667px; margin-right: 15px;">
                  <a>
                    <img src="{!!$slider_logo->image ? Storage::url($slider_logo->image) : url('backend/assets/img/news/img11.jpg') !!}" alt="Alner">                                                    
                    
                  </a>
                </div>
                @endforeach
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
          </div>
        </div>
      <!-- </div> -->
    </div>
  </div>
  <!-- Partners End -->

  <!-- Testimonial Start -->
  <section class="section-box bg-color-info ">
    <div class="container-fluid ">
      <div id="carouselExampleCaptions" class="carousel slide my-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner py-3">
          <div class="carousel-item active">
            <div class=" mx-md-5 py-md-2 " style="margin-bottom: 100px; margin-top: 100px;">
               
            </div>
            <div class="carousel-caption d-block">
              <h6 class="mb-10">
                <span class="border-bottom py-2">
                  <span class="">Alexa Young, CA</span>
                </span>
              </h6>
              <h3 class="d-none d-md-block">“Testimonials provide a sense of what it's like to work with you or use your products. Change the text and add your own."</h3>
              <p class="d-md-none d-block">“Testimonials provide a sense of what it's like to work with you or use your products. Change the text and add your own."</p>    
            </div>
          </div>
          <div class="carousel-item">
            <div class=" mx-md-5 py-md-2 " style="margin-bottom: 100px; margin-top: 100px;">
               
            </div>
            <div class="carousel-caption d-block">
              <h6 class="mb-10">
                <span class="border-bottom py-2">
                  <span class="">Morgan James, NY</span>
                </span>
              </h6>
              <h3 class="d-none d-md-block">"Testimonials are a great way to share positive feedback you have received and encourage others to work with you. Add your own here.”</h3>
              <p class="d-md-none d-block">"Testimonials are a great way to share positive feedback you have received and encourage others to work with you. Add your own here.”</p>    
            </div>
          </div>
          <div class="carousel-item">
            <div class=" mx-md-5 py-md-2 " style="margin-bottom: 100px; margin-top: 100px;">
               
            </div>
            <div class="carousel-caption d-block ">
              <h6 class="mb-10 ">
                <span class="border-bottom py-2">
                  <span class="">Lisa Driver, MI</span>
                </span>
              </h6>
              <h3 class="d-none d-md-block">“Have customers review you and share what they had to say. Click to edit and add their testimonial.”</h3>
              <p class="d-md-none d-block">“Have customers review you and share what they had to say. Click to edit and add their testimonial.”</p>                  
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>
  <!-- Testimonial End -->

@endsection

@push('prepend-script')
@endpush

@push('addon-script')

@endpush


