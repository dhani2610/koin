@extends('layouts.admin')
@section('title','Product')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Wishlist</h1>
      <div class="section-header-breadcrumb">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Wishlist</a></div>
            
          </div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">This is Example Page</h2>
      <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
      <div class="card">
        <div class="card-header d-sm-flex align-items-center justify-content-between ">
          <h4>Wishlist</h4>
          <a href="{{ route('wishlists.create')}}"
           class="btn btn-sm btn-primary shadow-sm rounded">
           <i class="fas fa-plus fa-sm text-white-50"></i>
           Add Wishlist
            </a>     
            
                 
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped" id="mytable" width="100%" collspacing="0">
                  <thead>
                      <tr>
                        <th class="text-center" style="width: 10%">No</th>
                        <th class="">Name of User</th>
                        <th class="">Product Name </th>
                         <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                          $s=1;                                                   
                      @endphp
                      @forelse ($items as $item)                      
                          <tr>
                              <td class="text-center">#{{$s}}</td>
                              <td>
                                @if ($item->customer_full)
                                    {{ $item->customer_full->name }}
                                @else
                                <span class="text-danger"><i class="fa-solid fa-trash"></i> {{ $item->users_id }}</span>
                                @endif
                              </td>
                              <td>
                                @if ($item->product)
                                    {{ $item->product->name }}
                                @else
                                  <span class="text-danger"><i class="fa-solid fa-trash"></i> {{ $item->products_id }}</span>
                                @endif
                              </td>
                              <td width="13%" class="text-center" >
                                {{-- <a href="{{ route('wishlists.show', $item->id)}}" 
                                    class="btn btn-success my-1">
                                    <i class="fa fa-eye"></i>
                                </a> --}}

                                <a href="{{ route('wishlists.edit', $item->id)}}" 
                                    class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                
                                

                                <form action="{{ route('wishlists.destroy', $item->id) }}"
                                    method="POST" class="d-inline" id="dataPermanen-{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button class="btn btn-danger" onclick="deleteRowPermanen( {{ $item->id }} )" > 
                                <i class="fa fa-trash"></i> 
                                </button>
                                
                                
                                {{-- <form action="{{ route('wishlists.restore')}}"
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
                      <td colspan="4" class="text-center">
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