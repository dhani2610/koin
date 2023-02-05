@extends('layouts.admin')
@section('title','Products')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Products</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a>Products</a></div>
        <div class="breadcrumb-item active">Detail Products</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Detail Product</h4>
        </div>
          
        <div class="card-body">
          <div class="card">
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Image</label>
              </div>
              <div class="col">
                <img src="{!!$item->image ? Storage::url($item->image) : url('backend/assets/img/news/img11.jpg') !!}" class="img-thumbnail mr-1 border-bottom" width="200">                                
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Unique Id</label>
              </div>
              <div class="col">
                <p>{{ $item->unique_id }}</p>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Category</label>
              </div>
              <div class="col">
                <span class="badge badge-primary">
                  @if ($item->category)
                    {{ $item->category->name_category }}
                  @else
                    <span class="text-danger"><i class="fa-solid fa-trash"></i> {{ $item->category_id }}</span>
                  @endif 
                </span>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Visibility</label>
              </div>
              <div class="col">
                <i class="{{ $item->visibility == 1 ? 'fa-solid fa-circle-check text-success' : 'fa-solid fa-circle-xmark text-danger'}}"></i>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Product Name</label>
              </div>
              <div class="col">
                <p>{{ $item->name }}</p>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Brand</label>
              </div>
              <div class="col">
                <p>{{ $item->brand }}</p>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Stock Availability</label>
              </div>
              <div class="col">
                <p>{{ $item->stock_availability }}</p>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Product Weight (kg)</label>
              </div>
              <div class="col">
                <p>{{ $item->product_weight }}</p>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Unit</label>
              </div>
              <div class="col">
                <p>{{ $item->unit }}</p>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Supplier Name</label>
              </div>
              <div class="col">
                <p>{{ $item->supplier_name }}</p>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Supplier Price</label>
              </div>
              <div class="col">
                <p>{{ $item->supplier_price }}</p>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Old Price</label>
              </div>
              <div class="col">
                <p>{{ $item->old_price }}</p>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Final Price</label>
              </div>
              <div class="col">
                <p>{{ $item->price }}</p>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Discount</label>
              </div>
              <div class="col">
                <p>{{ $item->discount}}%</p>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Description 1</label>
              </div>
              <div class="col border-left border-success">
                <p class="">{{ $item->description1 ?: '-' }}</p>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Description 2</label>
              </div>
              <div class="col border-left border-success">
                <p>{{ $item->description1 ?: '-' }}</p>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Delivery Info</label>
              </div>
              <div class="col border-left border-success">
                <p>{{ $item->delivery_Info   ?: '-' }}</p>
              </div>
            </div>
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
  {{-- <script>
    var loadFile = function (event) {
      // alert('ok');
      var ouput = document.getElementById('output');
      ouput.src = URL.createObjectURL(event.target.files[0]);
    };
  </script> --}}
@endpush