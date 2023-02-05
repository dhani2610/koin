@extends('layouts.admin')
@section('title','Profile')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile {{ $user->customers_id ? 'Customer' : 'Merchant' }}</h1>
      <div class="section-header-breadcrumb">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a >Profile</a></div>
            
          </div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">This is Example Page</h2>
      <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
      {{-- <div class="card"> --}}
        {{-- <div class="card-header d-sm-flex align-items-center justify-content-between ">
        </div> --}}
        <div class="card-body">
          <div class="row">
            <div class="container-fluid">
              <div class="card profile-widget">
                <div class="profile-widget-header">
                  @if ($user->merchants_id)
                  <img alt="image" src="{!!$user->foto ? Storage::url($user->foto) : url('backend/assets/img/avatar/merchant.png') !!}" class="rounded-circle profile-widget-picture">
                  @else
                  <img alt="image" src="{!!$user->foto ? Storage::url($user->foto) : url('backend/assets/img/avatar/customer.png') !!}" class="rounded-circle profile-widget-picture">
                  @endif
                  
                  <div class="profile-widget-items">
                    <div class="profile-widget-item">
                      <div class="profile-widget-item-label">Reservation Rejected</div>
                      <div class="profile-widget-item-value">{{ $user->reservation_merchant->where('status','rejected')->count() }}</div>
                    </div>
                    <div class="profile-widget-item">
                      <div class="profile-widget-item-label">Reservation Pending</div>
                      <div class="profile-widget-item-value">{{ $user->reservation_merchant->where('status','pending')->count() }}</div>
                    </div>
                    <div class="profile-widget-item">
                      <div class="profile-widget-item-label">Reservation Accepted</div>
                      <div class="profile-widget-item-value">{{ $user->reservation_merchant->where('status','accepted')->count() }}</div>
                    </div>
                  </div>
                </div>
                <div class="profile-widget-description pb-0 ">
                  <div class="profile-widget-name text-capitalize {{ $user->isVerified ? 'text-success' : "text-danger" }} "><i class="fa-solid fa-user-check"></i> {{ $user->name }} 
                    <div class="text-muted d-inline font-weight-normal">
                      @if ($user->merchants_id)
                      <div class="slash">
                      </div>
                        <i class="fas fa-star text-warning"></i> {{ round ($avg, 2) }}
                      </div>
                      @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          {{-- menu Email --}}
          <div class="col-12">
            <table class="table card card-secondary"> 
              <tbody>
                <tr>
                  <th scope="row">Email</th>
                  <td class="text-capitalize">{{ $user->email }}</td>
                </tr>
                <tr>
                  <th scope="row">Phone</th>
                  <td class="text-capitalize">{{ $user->phone }}</td>
                </tr>
                <tr>
                  <th scope="row">Gender</th>
                  <td class="text-capitalize">{{ $user->gender }}</td>
                </tr>
                {{-- <tr>
                  <th scope="row">Day of Birth</th>
                  <td class="text-capitalize">{{ $user->day_of_birth }}</td>
                </tr> --}}

                <tr>
                  <th scope="row">Address</th>
                  <td class="text-capitalize">{{ $user->customer->address ?? ' -' }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="col-4">
            <table class="table card card-secondary"> 
              <tbody class="pb-3">
                <tr class="">
                  <h5 class="text-center bg-white border-bottom shadow-light p-2"><i class="fa-solid fa-heart-circle-check mr-1 text-danger"></i>Wishlists</h5>
                </tr>
                @forelse ($user->wishlist as $item_wishlist)
                <tr>
                  <th>
                    <div class="d-flex align-items-center mt-3">
                      <img src="{{ $item_wishlist->product->image ? Storage::url($item_wishlist->product->image) : url('backend/assets/img/news/img11.jpg') }}" alt="" width="25%" class="img-thumbnail">
                      <div class="ml-2">
                        <div class=""><h6>{{ $item_wishlist->product->name }}</h6></div>
                        <div class="font-weight-light">{{ rupiah($item_wishlist->product->price) }}</div>
                        <div class="font-weight-light">{{ $item_wishlist->product->category->name_category }}</div>
                      </div>
                    </div>
                  </th>
                </tr>
                @empty
                <tr>
                  <th>
                    Empety
                  </th>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>

          <div class="col-4">
            <table class="table card card-secondary"> 
              <tbody class="pb-3">
                <tr class="">
                  <h5 class="text-center bg-white border-bottom shadow-light p-2"><i class="fa-solid fa-cart-shopping mr-1 text-warning"></i>Shopping Carts</h5>
                </tr>
                @forelse ($user->shopping_cart as $shopping_cart)
                <tr>
                  <th>
                    <div class="d-flex align-items-center mt-3">
                      <img src="{{ $shopping_cart->product->image ? Storage::url($shopping_cart->product->image) : url('backend/assets/img/news/img11.jpg') }}" alt="" width="25%" class="img-thumbnail">
                      <div class="ml-2">
                        <div class=""><h6>{{ $shopping_cart->product->name }}</h6></div>
                        <div class="font-weight-light">{{ rupiah($shopping_cart->product->price) }}</div>
                        <div class="font-weight-light">{{ $shopping_cart->product->category->name_category }}</div>
                      </div>
                    </div>
                  </th>
                </tr>
                @empty
                <tr>
                  <th>
                    Empety
                  </th>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>

          <div class="col-4">
            <table class="table card card-secondary"> 
              <tbody class="pb-3">
                <tr class="">
                  <h5 class="text-center bg-white border-bottom shadow-light p-2"><i class="fa-solid fa-clipboard-check mr-1 text-success"></i>Transactions</h5>
                </tr>
                @forelse ($user->wishlist as $item_wishlist)
                <tr>
                  <th>
                    <div class="d-flex align-items-center mt-3">
                      <img src="{{ $item_wishlist->product->image ? Storage::url($item_wishlist->product->image) : url('backend/assets/img/news/img11.jpg') }}" alt="" width="25%" class="img-thumbnail">
                      <div class="ml-2">
                        <div class=""><h6>{{ $item_wishlist->product->name }}</h6></div>
                        <div class="font-weight-light">{{ rupiah($item_wishlist->product->price) }}</div>
                        <div class="font-weight-light">{{ $item_wishlist->product->category->name_category }}</div>
                      </div>
                    </div>
                  </th>
                </tr>
                @empty
                <tr>
                  <th>
                    Empety
                  </th>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>
        </div>
          
      {{-- </div>  --}}
        <div class="card-footer bg-whitesmoke">
          
        </div>
      </div>
    </div>
  </section>
  </div>
@endsection