@extends('layouts.admin')
@section('title','Product')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Location</h1>
      <div class="section-header-breadcrumb">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Location</a></div>
            
          </div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">This is Example Page</h2>
      <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
      <div class="card">
        <div class="card-header d-sm-flex align-items-center justify-content-between ">
          <h4>Location</h4>
          <a href="{{ route('locations.create')}}"
           class="btn btn-sm btn-primary shadow-sm rounded">
           <i class="fas fa-plus fa-sm text-white-50"></i>
           Add Location
            </a>     
            
                 
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped" id="mytable" width="100%" collspacing="0">
                  <thead>
                      <tr>
                        <th class="text-center" style="width: 10%">No</th>
                        <th class="">Title</th>
                        <th class="">Address</th>
                        <th class="">Link</th>
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
                                {{ $item->title }}
                              </td>
                              <td>
                                {{-- {{ Str::limit($item->address, 70) }} --}}
                                {{ $item->address }}

                              </td>
                              <td>
                                {{ $item->link }}
                              </td>
                              <td width="13%" class="text-center" >
                                {{-- <a href="{{ route('locations.show', $item->id)}}" 
                                    class="btn btn-success my-1">
                                    <i class="fa fa-eye"></i>
                                </a> --}}

                                <a href="{{ route('locations.edit', $item->id)}}" 
                                    class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                
                                

                                <form action="{{ route('locations.destroy', $item->id) }}"
                                    method="POST" class="d-inline" id="dataPermanen-{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button class="btn btn-danger" onclick="deleteRowPermanen( {{ $item->id }} )" > 
                                <i class="fa fa-trash"></i> 
                                </button>
                                
                                
                                {{-- <form action="{{ route('locations.restore')}}"
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