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
                  {{-- @foreach (json_decode($order->products_id) as $order_products) --}}
                  {{-- @php
                      $productArr = explode('-',$order_products);
                      // dd($productArr[1]);
                      $product_order = App\Koinpack_product::find($productArr[0]);
                  @endphp --}}
                  <div class="item-orders">
                    <div class="image-orders">
                      
                      {{-- <img src="{{ url('frontend/assets/imgs/page/account/img-1.png') }}" alt="Alner"> --}}
                    <img src="{{url('backend/assets/img/news/img11.jpg')}} ">
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
                      <h5>Pesanan Anda Berhasil
                        <span style="margin-left: 15px" class="@if ($order->status == 'PENDING')
                          label-delivery bg-warning
                        @elseif($order->status == 'PAID')
                        label-delivery label-delivered
                        @else
                        label-delivery label-cancel
                        @endif">{{ $order->status }}</span>
                      </h5>
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
                  {{-- @endforeach --}}
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

          </div>
      
          <div class="tab-pane fade active show" id="tab-setting" role="tabpanel" aria-labelledby="tab-setting">
            <div class="row">
              <div class="col-lg-6 mb-20">
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
                  <form action="{{ route('my-account.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-lg-12">
                      <div class="form-group">
                        <input class="form-control font-sm" name="name" required type="text" placeholder="Username *" value="{{ $user->name }}">
                      </div>
                    </div>
                  
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
                    
                 
                    <div class="col-lg-12">
                      <div class="form-group mb-0">
                        <textarea class="form-control font-sm" name="address" placeholder="Address *" rows="5" required> {{ $user->customer->address  }}</textarea>
                      </div>
                    </div>
                    {{-- <div class="col-lg-12">
                      <div class="form-group mt-20">
                        <button type="submit" class="btn btn-buy w-auto h54 font-md-bold">
                          Save change
                        </button>
                      </div>
                    </div> --}}
                  </div>
                {{-- </form> --}}
              </div>
                <div class="col-lg-6 mb-20">
                  <div class="row">
                    <div class="col-lg-12 mb-20">
                      <div class="row">
                        <div class="col">
                          
                          <h5 class="font-md-bold color-brand-3 text-sm-start text-center"> </h5>
                        </div>
                        <div class="col  ">
                          {{-- <h5 class="font-md-bold text-sm-start text-center text-warning badge rounded-pill bg-success">
                             <span class="fs-4"></span></h5> --}}
                        </div>
                      </div>
                    </div>
                  <div class="row" style="margin-left: 4%; margin-top:6%"">
                      <img class="img-thumbnail" id="output" src="{!!Auth::user()->image ? Storage::url(Auth::user()->image) : url('backend/assets/img/news/img11.jpg') !!}" width="300" style="max-width: 38%;">
                    
                      <div class="form-group mt-3">
                          <label for="image">Image</label>
                        <div class="input-group">
                          
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" onchange="loadFile(event)" style="max-width: 38%!important;">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                          </div>
                        </div>
                      </div>
                      {{-- <div class="col-lg-12">
                        <div class="form-group mt-20">
                          <button type="submit" class="btn btn-buy w-auto h54 font-md-bold">
                            Save change
                          </button>
                        </div>
                      </div> --}}
                    </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-lg-12">
                  <button type="submit" class="btn btn-buy h54 font-md-bold" style="width: 100%">
                    Save change
                  </button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- My Account End -->

  <script>
    var loadFile = function (event) {
      // alert('ok');
      var ouput = document.getElementById('output');
      ouput.src = URL.createObjectURL(event.target.files[0]);
    };
  </script>
@endsection
