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
          <li><a class="active" href="#tab-setting" data-bs-toggle="tab" role="tab" aria-controls="tab-setting" aria-selected="true" class="">Setting</a></li>
          <li><a  href="#tab-notification" data-bs-toggle="tab" role="tab" aria-controls="tab-notification" aria-selected="false">Notification</a></li>
          <li><a href="#tab-wishlist" data-bs-toggle="tab" role="tab" aria-controls="tab-wishlist" aria-selected="false" class="">Wishlist</a></li>
          <li><a href="#tab-orders" data-bs-toggle="tab" role="tab" aria-controls="tab-orders" aria-selected="false" class="">Orders</a></li>
          {{-- <li><a href="#tab-order-tracking" data-bs-toggle="tab" role="tab" aria-controls="tab-order-tracking" aria-selected="false" class="">Order Tracking</a></li> --}}
        </ul>
        <div class="border-bottom mt-20 mb-40"></div>
        <div class="tab-content mt-30">
          <div class="tab-pane fade " id="tab-notification" role="tabpanel" aria-labelledby="tab-notification">
            <div class="list-notifications">
              @foreach ($orders as $order)
            <div class="box-orders" id="{{ $order->external_id }}">
         
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
                      @if ($order->status == 'PENDING')
                      <h5>Pesanan Anda Sedang Diproses
                        <span style="margin-left: 15px" class="@if ($order->status == 'PENDING')
                          label-delivery bg-warning
                        @elseif($order->status == 'PAID')
                        label-delivery label-delivered
                        @else
                        label-delivery label-cancel
                        @endif">{{ $order->status }}</span>
                      </h5>
                      <p>Pesanan #{{ $order->external_id }} sedang di prosess</p>
                      @elseif ($order->status == 'PAID')
                      <h5>Pesanan Anda Berhasil</h5>
                      <p>Pesanan #{{ $order->external_id }} sudah Diproses</p>
                      @endif
                    </div>
                    <div class="quantity-orders">
                      {{-- <h5>Quantity: {{ $productArr[1]}}</h5> --}}
                    </div>
                    <div class="price-orders">
                      {{-- <h5>{{ rupiah($productArr[2]) }}</h5> --}}
                      {{-- {{ var_dump($order->external_id) }} --}}
                      <a href="{{ route('my-detail-order',$order->external_id) }}" class="btn btn-success" >View Detail</a>
                      {{-- <a href="{{ $order->payment_link }}" class="btn btn-buy font-sm-bold w-auto">View Detail</a></div> --}}
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>    
            @endforeach
            </div>
            {{-- <nav>
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
            </nav> --}}
          </div>
          <div class="tab-pane fade" id="tab-wishlist" role="tabpanel" aria-labelledby="tab-wishlist">
            <div class="box-wishlist">
              <div class="head-wishlist">
                <div class="item-wishlist">
                  <div class="wishlist-cb">
                    {{-- <input class="cb-layout cb-all" type="checkbox"> --}}
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
          <div class="tab-pane fade " id="tab-orders" role="tabpanel" aria-labelledby="tab-orders">
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
                  @foreach (json_decode($order->products_id) as $order_products)
                  @php
                      $productArr = explode('-',$order_products);
                      // dd($productArr[1]);
                      $product_order = App\Koinpack_product::find($productArr[0]);
                  @endphp
                  @if ($product_order)
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
                    {{-- <div class="price-orders">
                      <h5>{{ rupiah($productArr[1]) }}</h5>
                    </div> --}}
                  </div>
                  @endif
                  @endforeach
                </div>
                
                <div class="list-orders mt-3">
                  {{-- @foreach (json_decode($order->emptyBottles_id) as $order_emptyBottle)
                  @php
                      $bottletArr = explode('-',$order_emptyBottle);
                      $bottle_order = App\Koinpack_emptybottle::find($bottletArr[0]);
                      // dd($bottle_order);
                  @endphp
                  @if ($bottle_order)
                  <div class="item-orders">
                    <div class="image-orders">
                    <img src="{!!$bottle_order->image ? Storage::url($bottle_order->image) : url('backend/assets/img/news/img11.jpg') !!} ">
                    </div>
                    <div class="info-orders">
                      <h5>{{ $bottle_order->name }}</h5>
                    </div>
                    <div class="quantity-orders">
                      <h5>Quantity: {{ $bottletArr[1]}}</h5>
                    </div>
             
                  </div>
                  @endif
                  @endforeach --}}
                </div>
              </div>
            </div>    
            @endforeach
            
            {{-- <nav>
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
            </nav> --}}
          </div>
          {{-- <div class="tab-pane fade" id="tab-order-tracking" role="tabpanel" aria-labelledby="tab-order-tracking">
            <p class="font-md color-gray-600">To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on<br class="d-none d-lg-block">your receipt and in the confirmation email you should have received.</p>
            <div class="row mt-30">
              <div class="col-lg-6">
                <div class="form-tracking">
                  <form action="#" method="get">
                    <div class="d-flex">
                      <div class="form-group box-input">
                        <input class="form-control" type="text" placeholder="FDSFWRFAF13585">
                      </div>
                      <div class="form-group box-button">
                        <button class="btn btn-buy font-md-bold" type="submit">Tracking Now</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="border-bottom mb-20 mt-20"></div>
            <h3 class="mb-10">Order Status:<span class="color-success">International shipping</span></h3>
            <h6 class="color-gray-500">Estimated Delivery Date: 27 August - 29 August</h6>
            <div class="table-responsive">
              <div class="list-steps">
                <div class="item-step">
                  <div class="rounded-step">
                    <div class="icon-step step-1 active"></div>
                    <h6 class="mb-5">Order Placed</h6>
                    <p class="font-md color-gray-500">15 August 2022</p>
                  </div>
                </div>
                <div class="item-step">
                  <div class="rounded-step">
                    <div class="icon-step step-2 active"></div>
                    <h6 class="mb-5">In Producttion</h6>
                    <p class="font-md color-gray-500">16 August 2022</p>
                  </div>
                </div>
                <div class="item-step">
                  <div class="rounded-step">
                    <div class="icon-step step-3 active"></div>
                    <h6 class="mb-5">International shipping</h6>
                    <p class="font-md color-gray-500">17 August 2022</p>
                  </div>
                </div>
                <div class="item-step">
                  <div class="rounded-step">
                    <div class="icon-step step-4"></div>
                    <h6 class="mb-5">Shipping Final Mile</h6>
                    <p class="font-md color-gray-500">18 August 2022</p>
                  </div>
                </div>
                <div class="item-step">
                  <div class="rounded-step">
                    <div class="icon-step step-5"></div>
                    <h6 class="mb-5">Delivered</h6>
                    <p class="font-md color-gray-500">19 August 2022</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="list-features">
              <ul>
                <li>09:10 25 August 2022: Delivery in progress</li>
                <li>08:25 25 August 2022: The order has arrived at warehouse 05-YBI Marvel LM Hub</li>
                <li>05:44 25 August 2022: Order has been shipped</li>
                <li>04:51 25 August 2022: The order has arrived at Marvel SOC warehouse</li>
                <li>20:54 18 August 2022: Order has been shipped</li>
                <li>18:21 17 August 2022: The order has arrived at Marvel SOC warehouse</li>
                <li>17:09 17 August 2022: Order has been shipped</li>
                <li>15:23 17 August 2022: The order has arrived at warehouse 20-HNI Marvel 2 SOC</li>
                <li>12:42 16 August 2022: Successful pick up</li>
                <li>10:44 15 August 2022: The sender is preparing the goods</li>
              </ul>
            </div>
            <h3>Package Location</h3>
            <div class="map-account">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193548.25784139088!2d-74.12251055507726!3d40.71380001554004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2zVGjDoG5oIHBo4buRIE5ldyBZb3JrLCBUaeG7g3UgYmFuZyBOZXcgWW9yaywgSG9hIEvhu7M!5e0!3m2!1svi!2s!4v1664974174994!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <p class="color-gray-500 mb-20">Maecenas porttitor augue sit amet nibh venenatis bibendum. Morbi lorem elit, fringilla quis libero vitae, tincidunt commodo purus. Quisque diam nisi, tincidunt sed vehicula nec, fermentum vitae lectus. Curabitur sit amet sagittis libero. Pellentesque cursus turpis at ipsum luctus tempor.</p>
              </div>
              <div class="col-lg-6">
                <p class="color-gray-500 mb-20">Ut auctor varius nisl, scelerisque dictum justo maximus ut. Fusce rhoncus, augue sed molestie consectetur, leo felis ultricies erat, nec lobortis enim dui eu justo. Pellentesque aliquam hendrerit venenatis. Integer efficitur bibendum lectus sed sollicitudin. Suspendisse faucibus posuere euismod.</p>
              </div>
            </div>
          </div> --}}
          <div class="tab-pane fade active show" id="tab-setting" role="tabpanel" aria-labelledby="tab-setting">
            <div class="row">
              <div class="col-lg-6 mb-20">
                {{-- <livewire:contact-information ></livewire:contact-information>             --}}
                <div class="row">
                  <div class="col-lg-12 mb-20">
                    <div class="row">
                      <div class="col">
                        
                        <h5 class="font-md-bold color-brand-3 text-sm-start text-center"> My Profile</h5>
                      </div>
                      <div class="col  ">
                        <h5 class="font-md-bold text-sm-start text-center text-warning badge rounded-pill bg-success">
                          Cashback Koinpack <span class="fs-4">{{ rupiah($user->cashback) }}</span></h5>
                      </div>
                    </div>
                  </div>
                  <form action="{{ route('my-account.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-lg-12">
                      <div class="form-group">
                        <input class="form-control font-sm" name="name" required type="text" placeholder="Username *" value="{{ $user->name }}">
                      </div>
                    </div>
                    {{-- <div class="col-lg-12">
                      <div class="form-group">
                        <input class="form-control font-sm" type="text" placeholder="Username *">
                      </div>
                    </div> --}}
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input class="form-control font-sm" type="text" name="phone" placeholder="Phone Number *" value="{{ $user->phone }}" required>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input class="form-control font-sm" type="text" name="email" placeholder="Email *" value="{{ $user->email }}" required>
                      </div>
                    </div>
                    
                    
                    <!--<div class="col-lg-12">
                      <div class="form-group">
                        <input class="form-control font-sm" type="text" placeholder="Address *">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input class="form-control font-sm" type="text" placeholder="Address 2*">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <select class="form-control font-sm select-style1 color-gray-700">
                          <option value="">Select an option...</option>
                          <option value="1">Option 1</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control font-sm" type="text" placeholder="City*">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input class="form-control font-sm" type="text" placeholder="PostCode / ZIP*">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control font-sm" type="text" placeholder="Company name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control font-sm" type="text" placeholder="Phone*">
                      </div>
                    </div> -->
                    <div class="col-lg-12">
                      <div class="form-group mb-0">
                        <textarea class="form-control font-sm" name="address" placeholder="Address *" rows="5" required> {{ $user->customer->address  }}</textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group mt-20">
                        <button type="submit" class="btn btn-buy w-auto h54 font-md-bold">
                          Save change
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- <div class="col-lg-1 mb-20"></div>
              <div class="col-lg-5 mb-20">
                <div class="mt-40">
                  <h4 class="mb-10">Steven Job</h4>
                  <div class="mb-10">
                    <p class="font-sm color-brand-3 font-medium">Home Address:</p><span class="font-sm color-gray-500 font-medium">205 North Michigan Avenue, Suite 810 Chicago, 60601, USA</span>
                  </div>
                  <div class="mb-10">
                    <p class="font-sm color-brand-3 font-medium">Delivery address:</p><span class="font-sm color-gray-500 font-medium">205 North Michigan Avenue, Suite 810 Chicago, 60601, USA</span>
                  </div>
                  <div class="mb-10">
                    <p class="font-sm color-brand-3 font-medium">Phone Number:</p><span class="font-sm color-gray-500 font-medium">(+01) 234 567 89 - (+01) 688 866 99</span>
                  </div>
                  <div class="mb-10 mt-15"><a class="btn btn-cart w-auto">Set as Default</a></div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- My Account End -->

@endsection
