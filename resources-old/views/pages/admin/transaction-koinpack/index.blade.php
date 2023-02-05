@extends('layouts.admin')
@section('title','Transaction')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Transactions</h1>
      <div class="section-header-breadcrumb">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Transactions</a></div>
            
          </div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">This is Example Page</h2>
      <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
      <div class="card">
        <div class="card-header d-sm-flex align-items-center justify-content-between ">
          <h4>Transactions</h4>
          <a href="{{ route('transactions.create')}}"
           class="btn btn-sm btn-primary shadow-sm rounded">
           <i class="fas fa-plus fa-sm text-white-50"></i>
           Add Transaction
            </a>     
            
                 
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped" id="mytable" width="100%" collspacing="0">
                  <thead>
                      <tr>
                        <th class="text-center" style="width: 10%">No</th>
                        <th class="">Unique Id</th>
                        <th class="">Name User</th>
                        {{-- <th class="">Price</th> --}}
                         <th class="">Status</th>
                         <th class="">Total Price</th>
                         <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                          $s=1;                                                   
                      @endphp
                      @forelse ($items as $item)                      
                          <tr>
                              <td class="text-center">{{$s}}</td>
                              {{-- <td>
                                @if ($item->customer_full)
                                    {{ $item->customer_full->name }}
                                @else
                                <span class="text-danger"><i class="fa-solid fa-trash"></i> {{ $item->users_id }}</span>
                                @endif
                              </td> --}}
                              {{-- <td>
                                @if ($item->product)
                                    {{ $item->product->name }}
                                @else
                                  <span class="text-danger"><i class="fa-solid fa-trash"></i> {{ $item->products_id }}</span>
                                @endif
                              </td> --}}
                              <td class=""><span class="badge badge-info">{{ $item->external_id }}</span></td>
                              <td class=""><span class="">{{ $item->customer_full->name }}</span></td>
                              <td class=""><span class="">{{ $item->status }}</span></td>
                              <td class=""><span class="badge badge-info">{{ $item->price }}</span></td>
                              
                              {{-- <td class="">
                                @if ($item->product)
                                <span class="badge badge-danger">{{ rupiah($item->qty*$item->pr oduct->price) }}</span>
                                @else
                                  <span class="text-danger">-</span>
                                @endif --}}
                                
                              </td>
                              <td width="13%" >
                                {{-- <a href="{{ route('transactions.show', $item->id)}}" 
                                    class="btn btn-success my-1">
                                    <i class="fa fa-eye"></i>
                                </a> --}}

                                <a href="{{ route('transactions.edit', $item->id)}}" 
                                    class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                
                                

                                <form action="{{ route('transactions.destroy', $item->id) }}"
                                    method="POST" class="d-inline" id="dataPermanen-{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button class="btn btn-danger" onclick="deleteRowPermanen( {{ $item->id }} )" > 
                                <i class="fa fa-trash"></i> 
                                </button>
                                
                                
                                {{-- <form action="{{ route('transactions.restore')}}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-secondary"> 
                                    <i class="fa fa-trash-restore"></i> 
                                    </button>
                                </form>  --}}
                              </td>
                          </tr>
                          @php
                              $s++; 
                          @endphp
                          
                      @empty
                      <td colspan="11" class="text-center">
                          Empty
                      </td>                                
                      @endforelse
                  </tbody>
              </table>
          </div>
      </div> 
        <div class="card-footer bg-whitesmoke">
          
        </div>
      </div>
    </div>
  </section>
  </div>

  
@endsection

@push('addon-script')
<script>
  $(document).ready(function () {
  
    fetchstudent();
      
    function fetchstudent() {
        $.ajax({
            type: "GET",
            url: "/fetch-students",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#nomorku').html("");
                $('#nomorku').append(response.countBadge);
                
                $('#cartku-product').html("");
                $.each(response.cartProduct, function (key, item) {
                  $('#cartku-product').append( '<div class="item-cart mb-20">\
                      <div class="cart-image">\
                        <img src="{!!'+item.image+' ? Storage::url("'+item.image+'") : url("backend/assets/img/news/img11.jpg")!!}" alt="Alner">\
                      </div>\
                      <div class="cart-info"><a class="font-sm-bold color-brand-3" href="{{ route('home') }}">'+item.name+'</a>\
                        <p><span class="color-brand-2 font-sm-bold">'+item.price+'</span></p>\
                        <div class="buy-product pt-10">\
                          <div class="box-quantity ">\
                            <div class="input-quantity mx-auto">\
                              <input class="font-lg color-brand-3" type="text" value="'+item.qty+'">\
                              <span class="minus-cart"></span>\
                              <span class="plus-cart"></span>\
                            </div>\
                          </div>\
                        </div>\
                      </div>\
                    </div>');
                });
  
                $('#totalCart').html("");
                $('#totalCart').append(response.total);
            }
        });
    }
  });
  </script>
@endpush
