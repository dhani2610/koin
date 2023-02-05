@extends('layouts.admin')
@section('title','Product')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Empty Bottles</h1>
      <div class="section-header-breadcrumb">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Empty Bottles</a></div>
            
          </div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">This is Example Page</h2>
      <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
      <div class="card">
        <div class="card-header d-sm-flex align-items-center justify-content-between ">
          <h4>Empty Bottles</h4>
          <a href="{{ route('emptybottle.create')}}"
           class="btn btn-sm btn-primary shadow-sm rounded">
           <i class="fas fa-plus fa-sm text-white-50"></i>
           Add Empty Bottle
            </a>     
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped" id="mytable" width="100%" collspacing="0">
                  <thead>
                      <tr>
                          <th class="text-center">No</th>
                          <th class="">Image</th>
                          {{-- <th class="text-center">Unique Id</th> --}}
                          {{-- <th class="text-center">Category</th> --}}
                          <th class="text-center">Product Name</th>
                          {{-- <th class="text-center">Info</th> --}}
                          {{-- <th class="text-center">Regular Price</th> --}}
                          {{-- <th class="text-center">Final Price</th> --}}
                          <th class="text-center">Discount Price</th>
                          {{-- <th class="text-center">Return Refund</th> --}}
                          {{-- <th class="text-center">Shipping Info</th> --}}
                          <th class="text-center">Visibility</th>
                          <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                          $s=1;                                                   
                      @endphp
                      @forelse ($items as $item)                      
                          <tr>
                              <td class="pt-4 text-center">#{{$s}}</td>
                              <td>
                                  <img src="{!!$item->image ? Storage::url($item->image) : url('backend/assets/img/news/img11.jpg') !!}" class="box-img mr-1 img-thumbnail" width="50">                                
                              </td>
                              {{-- <td class="pt-4 text-center">{{ $item->unique_id }} </td> --}}
                              {{-- <td class="pt-4 text-center">
                                @if ($item->category)
                                {{ $item->category->name_category }}
                                @else
                                  <span class="text-danger"><i class="fa-solid fa-trash"></i> {{ $item->category_id }}</span>
                                @endif 
                              </td> --}}
                              <td class="pt-4 text-center">{{ $item->name }} </td>
                              {{-- <td class="pt-4 text-center">{{ $item->info ? Str::limit($item->info, 10) : '-'  }} </td> --}}
                              {{-- <td class="pt-4 text-center">{{ rupiah($item->price) }} </td> --}}
                              <td class="pt-4 text-center">{{ rupiah($item->price) }} </td>
                              {{-- <td class="pt-4 text-center">{{ $item->discount }}% </td> --}}
                              {{-- <td class="pt-4 text-center">{{ $item->return_refund ? Str::limit($item->return_refund, 10) : '-' }} </td>
                              <td class="pt-4 text-center">{{ $item->shipping_info ? Str::limit($item->shipping_info, 10) : '-' }} </td> --}}
                              <td class="pt-4 text-center">
                                <i class="{{ $item->visibility == 1 ? 'fa-solid fa-circle-check text-success' : 'fa-solid fa-circle-xmark text-danger'}}"></i>
                              </td>
                              <td width="13%" >
                                <a href="{{ route('emptybottle.show', $item->id)}}" 
                                    class="btn btn-success my-1">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{ route('emptybottle.edit', $item->id)}}" 
                                    class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                
                                

                                <form action="{{ route('emptybottle.destroy', $item->id) }}"
                                    method="POST" class="d-inline" id="dataPermanen-{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button class="btn btn-danger" onclick="deleteRowPermanen( {{ $item->id }} )" > 
                                <i class="fa fa-trash"></i> 
                                </button>
                                
                                
                                {{-- <form action="{{ route('emptybottle.restore')}}"
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