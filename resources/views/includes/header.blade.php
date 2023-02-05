{{-- <div id="preloader-active">
  <div class="preloader d-flex align-items-center justify-content-center">
    <div class="preloader-inner position-relative">
      <!-- <img class="" src="{{ url('frontend/assets/imgs/alner/Alner_Logo.png') }}" alt="Alner"> -->

      <!-- <div class="text-center"><img class="mb-10" src="{{ url('frontend/assets/imgs/template/favicon.svg') }}" alt="Alner"> -->
        <div class="preloader-dots"></div>
      </div>
    </div>
  </div>
</div> --}}
<div class="topbar top-brand-2">
  <div class="container-topbar">
    <div class="menu-topbar-left d-none d-xl-block">
      <ul class="nav-small">
        <li><a class="font-xs {{ (Request::segment(1) == 'about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">About Us</a></li>
        <li><a class="font-xs" href="{{ route('customer-support') }}">Customer Support</a></li>
      </ul>
    </div>
    <div class="info-topbar text-center d-none d-xl-block">
      <span class="font-xs color-brand-3">Get 20% off your first order. <a href="" class="text-white text-decoration-underline">Subscribe</a>
      </span>
    </div>
    <div class="menu-topbar-right">
      <div class="dropdown dropdown-language">
        <button class="btn dropdown-toggle" id="dropdownPage" type="button" data-bs-toggle="dropdown" aria-expanded="true" data-bs-display="static"><span class="dropdown-right font-xs color-brand-3"><img src="{{ url('frontend/assets/imgs/template/en.svg') }}" alt="Alner"> English</span></button>
        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownPage" data-bs-popper="static">
          <li>
            <a class="dropdown-item" href="#">
              <img src="{{ url('frontend/assets/imgs/template/flag-en.svg') }}" alt="Alner"> English
            </a>
          </li>
          <li><a class="dropdown-item" href="#">
            <span class="d-flex align-items-center">
              <img src="{{ url('frontend/assets/imgs/template/flag-id.png') }}" alt="Alner"  class="pe-1" style="width: 20px;">
              Indonesia
            </span>
            </a>
          </li>
        </ul>
      </div>
     
      {{-- @guest
      <span class="ms-sm-5 ms-1">
        <a href="{{ route('login') }}">
          <svg width="25" height="25" xmlns="">
            <image href="{{ url('frontend/assets/imgs/template/account-white.svg') }}"/>
          </svg>
          <span class="text-white d-none d-sm-inline">Log In</span>
        </a>
      </span>
      @endguest
      @auth
      <span class="ms-sm-5 ms-1">
        @if (Auth::user()->roles == 'ADMIN')
        <a href="{{ route('dashboard-adfood') }}">
        @else
        <a href="{{ route('my-account') }}">
        @endif
        
          <svg width="25" height="25" xmlns="">
            <image href="{{ url('frontend/assets/imgs/template/account-white.svg') }}"/>
          </svg>
          <span class="text-white d-none d-sm-inline">Account</span>
        </a>
      </span>
      @endauth --}}
    </div>
  </div>
</div>
<header class="header header-container sticky-bar">
  <div class="container-fluid header-custom-color">
    <div class="container ">
      <div class="main-header">
        <div class="header-left ">
          <div class="header-logo">
            <a href="{{ route('home') }}">
              <img class="" alt="Alner" src="{{ url('frontend/assets/imgs/alner/Alner_Logo.png') }}" width="100%">
              <div class="text-white font-bold d-none d-lg-block" style="margin-top: -10px; font-size: small;">
                New Face of Koinpack
              </div>
            </a>
          </div>
          <div class="header-search ms-md-5 ms-xl-auto d-none d-lg-inline" style="position: relative;">
            <div class="input-group">
              <input type="text" id="inputSearchUser" class="form-control px-3" placeholder="Search a product e.g. milk" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-radius: 20px;">
              {{-- <button class="btn btn-outline-secondary border-white btn-light" type="button" id="button-addon2" style="border-radius: 0 20px 20px 0;">
                <img src="{{ url('frontend/assets/imgs/template/search.svg') }}" alt="Alner"></a></li>
              </button> --}}
            </div>
            <div class="list-group mt-1 mx-2 overflow-auto" style="position: absolute; z-index: 99999; display: none; max-height: 200px; width: 96%;" id="searchResultUser">
              {{-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                <div class="d-flex justify-content-between">
                  <small>And some small prinasdfasdfsdfasdfasfaasdfasdfasdfasdfsfasdft.</small>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between">
                  <small class="text-muted">And some muted small print.</small>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between">
                  <small class="text-muted">And some muted small print.</small>
                </div>
              </a> --}}
            </div>
          </div>
          
          <div class="header-nav d-block d-lg-none">
            <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
          </div>

          <div class="header-shop ms-auto">
            <div class="d-inline-block me-2">
              <a href="{{ url('customer-support/#visit') }}">
                <span class="font-lg icon-list icon-place" style="width: 24px; height: 24px;">
                  <span style="opacity: 0">Account</span>
                </span>
              </a>
            </div>

            <div class="d-inline-block box-dropdown-cart">
              @guest
              <a href="{{ route('login') }}">              
                <span class="font-lg icon-list icon-account">
                </span>
              </a>
              @endguest
              
              @auth
              @if (Auth::user()->roles == 'ADMIN')
              <a href="{{ route('dashboard-koinpack') }}">
                <span class="font-lg icon-list icon-account">
                  {{-- <span>Account</span> --}}
                </span>
              </a>
              
              @else
              
              <span class="font-lg icon-list icon-account" style="width: 24px; height: 24px;">
                <span style="opacity: 0">Account</span>
              </span>
              
              <div class="dropdown-account">
                <ul>
                  <li><a href="{{ route('my-account.index') }}">My Account</a></li>
                  {{-- <li><a href="page-account.html">Order Tracking</a></li>
                  <li><a href="page-account.html">My Orders</a></li>
                  <li><a href="page-account.html">My Wishlist</a></li>
                  <li><a href="page-account.html">Setting</a></li> --}}
                  <li><a href="{{ route('logout-user') }}" >Sign out</a></li>
                </ul>
              </div>
              @endif
              @endauth
            </div>

            @auth
            @if (Auth::user()->roles == 'USER')
            <a class="font-lg icon-list icon-hearth-white" href="{{ route('wishlist') }}">
              <span>Wishlist</span>
            <livewire:count-wishlist ></livewire:count-wishlist>            

              {{-- <span class="number-item font-xs">5</span> --}}
            </a>
            {{-- <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-cart"><span>Cart</span><span class="number-item font-xs">{{ $countAllCart = $carts->unique('products_id')->count() }}</span></span> --}}
            
            {{-- <livewire:cart-header ></livewire:cart-header>             --}}
            @include('components.cart-header')

            @endif
            @endauth
            <!-- <a class="font-lg icon-list icon-compare" href="{{ route('home') }}">
              <span>Compare</span>
            </a> -->
          </div>
        </div>
      </div>
    </div>
    <div class="container pb-10 d-inline d-lg-none" id="search-bottom" style="position: relative;">
      <div class="header-search ms-auto">
        <div class="input-group">
          <input type="text" id="inputSearchUserMobile" class="form-control px-3" placeholder="Search a product e.g. milk" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-radius: 20px;">
          {{-- <button class="btn btn-outline-secondary border-white btn-light" type="button" id="button-addon2" style="border-radius: 0 20px 20px 0;">
            <img src="{{ url('frontend/assets/imgs/template/search.svg') }}" alt="Alner"></a></li>
          </button> --}}
        </div>
        <div class="list-group mt-1 mx-2 overflow-auto" style="position: absolute; z-index: 999; width: 400px; display: none; max-height: 200px; " id="searchResultUserMobile">
          {{-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
            <div class="d-flex  justify-content-between">
              <small>And some small print.</small>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex  justify-content-between">
              <small class="text-muted">And some muted small print.</small>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex  justify-content-between">
              <small class="text-muted">And some muted small print.</small>
            </div>
          </a>--}}
        </div> 
      </div>
    </div>
  </div>
  <div class="header-bottom d-none d-lg-block">
    <div class="container ">
      <div class="header-nav d-inline-block ">
        <nav class="nav-main-menu d-block ">
          <span class="d-md-flex justify-content-center">
            <ul class="main-menu">
              <li class=""><a class="{{ (Request::segment(1) == '') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
              </li>
              <li class=""> <a class="{{ (Request::segment(1) == 'about-us') ? 'active' : '' }}" href="{{ route('about-us') }}" >About Us</a>
              </li>
              <li class=""> <a href="{{ route('shop-all') }}" class="{{ (Request::segment(1) == 'shop-all') ? 'active' : '' }}" >Shop All</a></li>
              <li class=""> <a href="{{ route('deal') }}" class="{{ (Request::segment(1) == 'deal') ? 'active' : '' }}">Deals</a></li>
              <li class="has-children"><a class="{{ (Request::segment(1) == 'rice') || (Request::segment(1) == 'fruit') || (Request::segment(1) == 'meat-poultry') || (Request::segment(1) == 'fish-seafood') ? 'active' : '' }}">Food</a>
                <ul class="sub-menu two-col">
                  <li><a href="{{ route('rice') }}" class="{{ (Request::segment(1) == 'rice') ? 'active' : '' }}">Rice</a></li>
                  <li><a href="{{ route('fruit') }}" class="{{ (Request::segment(1) == 'fruit') ? 'active' : '' }}">Fruit</a></li>
                  <li><a href="{{ route('meat-poultry') }}" class="{{ (Request::segment(1) == 'meat-poultry') ? 'active' : '' }}">Meat Poultry</a></li>
                  <li><a href="{{ route('fish-seafood') }}" class="{{ (Request::segment(1) == 'fish-seafood') ? 'active' : '' }}">Fish & Seafood</a></li>                      
                </ul>
              </li>
              <li class="has-children"><a class="{{ (Request::segment(1) == 'home-kitchen') || (Request::segment(1) == 'cleaning-supplies') ? 'active' : '' }}">Household</a>
                <ul class="sub-menu">
                  <li><a href="{{ route('home-kitchen') }}" class="{{ (Request::segment(1) == 'home-kitchen') ? 'active' : '' }}">Home & Kitchen</a></li>
                  <li><a href="{{ route('cleaning-supplies') }}" class="{{ (Request::segment(1) == 'cleaning-supplies') ? 'active' : '' }}">Cleaning Supplies</a></li>
                </ul>
              </li>
              <li class="has-children"><a class="{{ (Request::segment(1) == 'personal-hygiene') || (Request::segment(1) == 'babies') ? 'active' : '' }}">Personal Care</a>
                <ul class="sub-menu">
                  <li><a href="{{ route('personal-hygiene') }}" class="{{ (Request::segment(1) == 'personal-hygiene') ? 'active' : '' }}">Personal Hygiene</a></li>
                  <li><a href="{{ route('babies') }}" class="{{ (Request::segment(1) == 'babies') ? 'active' : '' }}">Babies</a></li>
                </ul>
              </li>
              <li><a href="{{ route('most-popular') }}" class="{{ (Request::segment(1) == 'most-popular') ? 'active' : '' }}">Most Popular</a></li>
              <li><a href="{{ route('empety-bottle') }}" class="{{ (Request::segment(1) == 'empety-bottle') ? 'active' : '' }}">Return Packaging</a></li>
            </ul>
          </span>
        </nav>
      </div>
    </div>
  </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
  <div class="mobile-header-wrapper-inner">
    <div class="mobile-header-content-area">
      <div class="mobile-logo"><a class="d-flex"><img alt="Alner" src="{{ url('frontend/assets/imgs/alner/Alner_Logo.png') }}"></a></div>
      <div class="perfect-scroll">
        <div class="mobile-menu-wrap mobile-header-border">
          <nav class="mt-15">
            <ul class="mobile-menu font-heading">
              <li class=""><a class="{{ (Request::segment(1) == '') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>                    
              </li>
              <li class=""> <a class="{{ (Request::segment(1) == 'about-us') ? 'active' : '' }}" href="{{ route('about-us') }}" >About Us</a>
              </li>
              <li class=""> <a href="{{ route('shop-all') }}" class="{{ (Request::segment(1) == 'shop-all') ? 'active' : '' }}" >Shop All</a></li>
              <li class=""> <a href="{{ route('deal') }}" class="{{ (Request::segment(1) == 'deal') ? 'active' : '' }}">Deals</a></li>
              <li class="has-children"><a class="{{ (Request::segment(1) == 'rice') || (Request::segment(1) == 'fruit') || (Request::segment(1) == 'meat-poultry') || (Request::segment(1) == 'fish-seafood') ? 'active' : '' }}">Food</a>
                <ul class="sub-menu">
                  <li><a href="{{ route('rice') }}" class="{{ (Request::segment(1) == 'rice') ? 'active' : '' }}">Rice</a></li>
                  <li><a href="{{ route('fruit') }}" class="{{ (Request::segment(1) == 'fruit') ? 'active' : '' }}">Fruit</a></li>
                  <li><a href="{{ route('meat-poultry') }}" class="{{ (Request::segment(1) == 'meat-poultry') ? 'active' : '' }}">Meat Poultry</a></li>
                  <li><a href="{{ route('fish-seafood') }}" class="{{ (Request::segment(1) == 'fish-seafood') ? 'active' : '' }}">Fish & Seafood</a></li>                      
                </ul>
              </li>
              <li class="has-children"><a class="{{ (Request::segment(1) == 'home-kitchen') || (Request::segment(1) == 'cleaning-supplies') ? 'active' : '' }}">Household</a>
                <ul class="sub-menu">
                  <li><a href="{{ route('home-kitchen') }}" class="{{ (Request::segment(1) == 'home-kitchen') ? 'active' : '' }}">Home & Kitchen</a></li>
                  <li><a href="{{ route('cleaning-supplies') }}" class="{{ (Request::segment(1) == 'cleaning-supplies') ? 'active' : '' }}">Cleaning Supplies</a></li>
                </ul>
              </li>
              <li class="has-children"><a class="{{ (Request::segment(1) == 'personal-hygiene') || (Request::segment(1) == 'babies') ? 'active' : '' }}">Personal Care</a>
                <ul class="sub-menu">
                  <li><a href="{{ route('personal-hygiene') }}" class="{{ (Request::segment(1) == 'personal-hygiene') ? 'active' : '' }}">Personal Hygiene</a></li>
                  <li><a href="{{ route('babies') }}" class="{{ (Request::segment(1) == 'babies') ? 'active' : '' }}">Babies</a></li>
                </ul>
              </li>
              <li><a href="{{ route('most-popular') }}" class="{{ (Request::segment(1) == 'most-popular') ? 'active' : '' }}">Most Popular</a></li>
              <li><a href="{{ route('empety-bottle') }}" class="{{ (Request::segment(1) == 'empety-bottle') ? 'active' : '' }}">Return Packaging</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

@push('addon-script')

@endpush