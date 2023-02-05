<!-- Categories Start -->
<div class="col-lg-3 order-last order-lg-first">
    <div class="sidebar-border mb-0">
      <div class="sidebar-head">
        <h6 class="color-gray-900">Categories</h6>
      </div>
      <div class="sidebar-content">
        <ul class="list-nav-arrow">
          <li><a href="" class="">All</a></li>
          <li><a href="#">Deals</a></li>
          <li><a href="#">Most Popular</a></li>
          <li><a href="#">Rice</a></li>
          <li><a href="#">Fruit</a></li>
          <li><a href="#">Meat & Poultry</a></li>
          <li><a href="#">Fish & Seafood</a></li>
          <li><a href="#">Dairy & Eggs</a></li>
          <li><a href="#">Bakery</a></li>
          <li><a href="#">Pastas & Grains</a></li>
          <li><a href="#">Cereals & Snacks</a></li>
          <li><a href="#">Tea</a></li>
          <li><a href="#">Coffee</a></li>
          <li><a href="#">Soft Drinks</a></li>
          <li><a href="#">Home & Kitchen</a></li>
          <li><a href="#">Cleaning Supplies</a></li>
          <li><a href="#">Personal Hygiene</a></li>
          <li><a href="#">Babies</a></li>
        </ul>
        <!-- <div>
          <div class="collapse" id="moreMenu">
            <ul class="list-nav-arrow">
              <li><a href="shop-grid.html">Home theater<span class="number">98</span></a></li>
              <li><a href="shop-grid.html">Cameras & drones<span class="number">124</span></a></li>
              <li><a href="shop-grid.html">PC gaming<span class="number">56</span></a></li>
              <li><a href="shop-grid.html">Smart home<span class="number">87</span></a></li>
              <li><a href="shop-grid.html">Networking<span class="number">36</span></a></li>
            </ul>
          </div>
          <a class="link-see-more mt-5" data-bs-toggle="collapse" href="#moreMenu" role="button" aria-expanded="false" aria-controls="moreMenu">See More</a>
        </div> -->
      </div>
    </div>
    <div class="sidebar-border mb-40">
      <div class="sidebar-head">
        <h6 class="color-gray-900">Products Filter</h6>
      </div>
      <div class="sidebar-content">
        <h6 class="color-gray-900 mt-10 mb-10">Price</h6>
        {{-- <div class="box-slider-range mt-20 mb-15">
          <div class="row mb-20">
            <div class="col-sm-12">
              <div id="slider-range"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <label class="lb-slider font-sm color-gray-500">Price Range:</label>
              <span class="min-value-money font-sm color-gray-1000"></span>
              <label class="lb-slider font-sm font-medium color-gray-1000"></label>-
              <span class="max-value-money font-sm font-medium color-gray-1000"></span>
            </div>
            <div class="col-lg-12">
              <input class="form-control min-value" type="hidden" name="min-value" value="">
              <input on="alert('change')" class="form-control max-value" type="hidden" name="max-value" value="">
            </div>
          </div>
        </div> --}}
        @livewire('components.product.product-slider-filter')
        {{-- <h6 class="color-gray-900 mt-20 mb-10">Flavours</h6>
        <ul class="list-checkbox">
          <li>
            <label class="cb-container">
              <input type="checkbox" checked="checked">
              <span class="text-small">Apple</span><span class="checkmark"></span>
            </label>
            <!-- <span class="number-item">12</span> -->
          </li>
          <li>
            <label class="cb-container">
              <input type="checkbox">
              <span class="text-small">Grapes & Pears</span><span class="checkmark"></span>
            </label>
          </li>
          <li>
            <label class="cb-container">
              <input type="checkbox">
              <span class="text-small">Mango & Strawberries</span><span class="checkmark"></span>
            </label>
          </li>
        </ul> --}}
      </div>
    </div>
  </div>
  <!-- Categories End -->