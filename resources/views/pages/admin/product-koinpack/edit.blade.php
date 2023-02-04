@extends('layouts.admin')
@section('title','Products')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Products</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a>Products</a></div>
        <div class="breadcrumb-item active">Edit Products</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Edit Product</h4>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>                            
        @endif
        
          
            <div class="card-body">
                <form action="{{ route('products.update', $item->id) }}" method="POST" enctype="multipart/form-data">{{-- untuk menyimpan sebuah data menggunakan functioan 'store' --}}
                  @csrf{{-- setiap buat form pakai @csrf --}}
                  @method('PUT')
                  
                  <img class="img-thumbnail" id="output" src="{!!$item->image ? Storage::url($item->image) : url('backend/assets/img/news/img11.jpg') !!}" width="300">
                  
                  <div class="form-group">
                      <label for="image">Image</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-folder-open"></i></span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" onchange="loadFile(event)">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="unique_id">Unique Id</label>
                      <input type="text" class="form-control" name="unique_id" placeholder="Unique Id" value="{{ $item->unique_id }}" required>
                  </div>
                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" required>
                      @if ($item->category)
                        <option value="{{$item->category_id}}">-- {{$item->category->name_category}} --</option>
                      @else
                        <option value="">-- Category Removed --</option>
                      @endif
                      
                      @forelse ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name_category}}</option>
                      @empty
                          <option value="">-- Null --</option>
                      @endforelse
                    </select>
                  </div>
                  {{-- <div class="form-group">
                    <div class="row">
                      <div class="col-form-label col-sm-3 pt-0 text-dark">Flavour</div>
                      <div class="col-sm-9">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="flavours" id="gridRadios1" value="1" {{ $item->flavours == 1 ? 'checked':''  }}>
                          <label class="form-check-label" for="gridRadios1">
                          Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="flavours" id="gridRadios2" value="0" {{ $item->flavours == 0 ? 'checked':''  }}>
                          <label class="form-check-label" for="gridRadios2">
                            No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                  <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $item->name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{ $item->brand }}" required>
                  </div>
                  <div class="form-group">
                    <label for="stock_availability">Stock Availability</label>
                    <input type="text" class="form-control" name="stock_availability" placeholder="Stock Availability" value="{{ $item->stock_availability }}" required>
                  </div>
                  <div class="form-group">
                    <label for="product_weight">Product Weight (kg)</label>
                    <input type="text" class="form-control" name="product_weight" placeholder="Product Weight" value="{{ $item->product_weight }}" required>
                  </div>
                  <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control" name="unit" placeholder="Unit" value="{{ $item->unit }}" required>
                  </div>
                  <div class="form-group">
                    <label for="supplier_name">Supplier Name</label>
                    <input type="text" class="form-control" name="supplier_name" placeholder="Supplier Name" value="{{ $item->supplier_name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="supplier_price">Supplier Price</label>
                    <input type="text" class="form-control" name="supplier_price" placeholder="Supplier Price" value="{{ $item->supplier_price }}" required>
                    <div class="form-group">
                      <label for="old_price">Old Price</label>
                      <input type="text" class="form-control" name="old_price" placeholder="Final Price" value="{{ $item->old_price }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="price">Final Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $item->price }}" required>
                  </div>
                  <div class="form-group">
                    <label for="discount">Discount (%)</label>
                    <input type="text" class="form-control" name="discount" placeholder="Discount" value="{{ $item->discount }}" required>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-form-label col-sm-3 pt-0 text-dark">Visibility</div>
                      <div class="col-sm-9">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="visibility" id="gridRadios1" value="1" {{ $item->visibility == 1 ? 'checked':''  }}>
                          <label class="form-check-label" for="gridRadios1">
                          Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="visibility" id="gridRadios2" value="0" {{ $item->visibility == 0 ? 'checked':''  }}>
                          <label class="form-check-label" for="gridRadios2">
                            No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description1">Description 1</label>
                    <textarea name="description1" rows="7" class="d-block w-100 h-100 form-control">{{ $item->description1 }}</textarea>                        
                  </div>
                  <div class="form-group">
                    <label for="description2">Description 2</label>
                    <textarea name="description2" rows="7" class="d-block w-100 h-100 form-control">{{ $item->description2 }}</textarea>                        
                  </div>
                  {{-- <div class="form-group">
                      <label for="info">Info Product</label>
                      <textarea name="info" rows="7" class="d-block w-100 h-100 form-control">{{ $item->info }}</textarea>                        
                  </div> --}}
                  <div class="form-group">
                    <label for="delivery_Info">Delivery Info</label>
                    <textarea name="delivery_Info" rows="7" class="d-block w-100 h-100 form-control">{{ $item->delivery_Info }}</textarea>                        
                  </div>
                  
                  {{-- <div class="form-group">
                    <label for="return_refund">Return Refund</label>
                    <textarea name="return_refund" rows="7" class="d-block w-100 h-100 form-control">{{ $item->return_refund }}</textarea>                        
                  </div>
                  <div class="form-group">
                    <label for="shipping_info">Shipping Info</label>
                    <textarea name="shipping_info" rows="7" class="d-block w-100 h-100 form-control">{{ $item->shipping_info }}</textarea>                        
                  </div> --}}
                  
                    
                  
                    <button type="submit" class="btn btn-primary btn-block">
                      <i class="fa-solid fa-pen-to-square text-white-50"></i> Update
                    </button>
                </form>
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