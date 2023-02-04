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
                <span class="badge badge-primary">{{ $item->category }}</span>
              </div>
            </div>

            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Flavours</label>
              </div>
              <div class="col">
                <i class="{{ $item->flavours == 1 ? 'fa-solid fa-circle-check text-success' : 'fa-solid fa-circle-xmark text-danger'}}"></i>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Name</label>
              </div>
              <div class="col">
                <p>{{ $item->name }}</p>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Price</label>
              </div>
              <div class="col">
                <p>{{ $item->price }}</p>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Info</label>
              </div>
              <div class="col">
                <textarea rows="7" class="d-block w-100 h-100 form-control" disabled>{{ $item->info ?: '-' }}</textarea>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Return Refund</label>
              </div>
              <div class="col">
                <textarea rows="7" class="d-block w-100 h-100 form-control" disabled>{{ $item->return_refund ?: '-' }}</textarea>
              </div>
            </div>
    
            <div class="row px-4 mb-3">
              <div class="col-2">
               <label>Shipping Info</label>
              </div>
              <div class="col">
                <textarea rows="7" class="d-block w-100 h-100 form-control" disabled>{{ $item->shipping_info ?: '-' }}</textarea>
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
  <script>
    var loadFile = function (event) {
      // alert('ok');
      var ouput = document.getElementById('output');
      ouput.src = URL.createObjectURL(event.target.files[0]);
    };
  </script>
@endpush