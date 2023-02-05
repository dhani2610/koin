@extends('layouts.admin')
@section('title','Products')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Products</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a>Products</a></div>
        <div class="breadcrumb-item active">Input Products</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Input Product</h4>
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
        {{-- Generate fake data if not in production --}}
        @production
        @php
            $__defaults = [
                'name'             => old('name'),
                'unique_id'        => old('unique_id'),
                'category'         => old('category'),
                'flavours'         => old('flavours'),
                'image'            => old('image'),
                'info'             => old('info'),
                'price'            => old('price'),
                'return_refund'    => old('return_refund'),
                'shipping_info'    => old('shipping_info'),

                
                
            ];
        @endphp
    @else
        @php
            $faker = Faker\Factory::create('id_ID');

            $__defaults = [
                'name'     => $faker->colorName(),
                // 'email'    => $faker->unique()->safeEmail(),
                // 'phone'    => $faker->e164PhoneNumber(),
                // 'password' => 123456789,
                'unique_id'           => 'SKU: '.$faker->randomNumber(5, true),
                // 'category'         => $faker->words(1, true),
                // 'flavours'         => 1,
                'image'               => $faker->imageUrl(360, 360, 'animals', true, 'cats'),
                'price'               => $faker->randomNumber(4),
                'old_price'         => $faker->randomNumber(4),
                // 'info'             => $faker->text(200),
                // 'return_refund'    => $faker->text(200),
                // 'shipping_info'    => $faker->text(200),
                'discount'            => $faker->randomNumber(2),
                'brand'               => $faker->colorName(),
                'description1'        => $faker->text(200),
                'description2'        => $faker->text(200),
                'delivery_Info'        => $faker->text(200),
                'stock_availability'  => $faker->randomNumber(2),
                'supplier_price'      => $faker->randomNumber(4),
                'supplier_name'       => $faker->name(),
                'unit'                => 'pcs',
                'product_weight'      => $faker->randomNumber(1),
                
            ];
        @endphp
    @endproduction
          
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">{{-- untuk menyimpan sebuah data menggunakan functioan 'store' --}}
                  @csrf{{-- setiap buat form pakai @csrf --}}
                  
                  <img class="img-thumbnail" id="output" src="{{ url('backend/assets/img/news/img11.jpg') }}" alt="Responsive image" width="300">
                  {{-- <img class="img-thumbnail" id="output"> --}}
                  <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-folder-open"></i></span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" onchange="loadFile(event)" >
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="unique_id">Unique Id</label>
                      <input type="text" class="form-control" name="unique_id" placeholder="Unique Id" value="{{ $__defaults['unique_id'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                          @if ($category)
                            <option value="{{$category->id}}">{{$category->name_category}}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                  {{-- <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" name="category" placeholder="Category" value="{{ $__defaults['category'] }}" required>
                  </div> --}}
                  {{-- <div class="form-group">
                    <div class="row">
                      <div class="col-form-label col-sm-3 pt-0 text-dark">Flavour</div>
                      <div class="col-sm-9">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="flavours" id="gridRadios1" value="1" >
                          <label class="form-check-label" for="gridRadios1">
                          Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="flavours" id="gridRadios2" value="0" checked>
                          <label class="form-check-label" for="gridRadios2">
                            No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                  <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $__defaults['name'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{ $__defaults['brand'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="stock_availability">Stock Availability</label>
                    <input type="text" class="form-control" name="stock_availability" placeholder="Stock Availability" value="{{ $__defaults['stock_availability'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="product_weight">Product Weight (kg)</label>
                    <input type="text" class="form-control" name="product_weight" placeholder="Product Weight" value="{{ $__defaults['product_weight'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control" name="unit" placeholder="Unit" value="{{ $__defaults['unit'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="supplier_name">Supplier Name</label>
                    <input type="text" class="form-control" name="supplier_name" placeholder="Supplier Name" value="{{ $__defaults['supplier_name'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="supplier_price">Supplier Price</label>
                    <input type="text" class="form-control" name="supplier_price" placeholder="Supplier Price" value="{{ $__defaults['supplier_price'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="old_price">Old Price</label>
                    <input type="text" class="form-control" name="old_price" placeholder="Old Price" value="{{ $__defaults['old_price'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="price">Final Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $__defaults['price'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="discount">Discount (%)</label>
                    <input type="text" class="form-control" name="discount" placeholder="Discount" value="{{ $__defaults['discount'] }}" required>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-form-label col-sm-3 pt-0 text-dark">Visibility</div>
                      <div class="col-sm-9">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="visibility" id="gridRadios1" value="1" >
                          <label class="form-check-label" for="gridRadios1">
                          Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="visibility" id="gridRadios2" value="0" checked>
                          <label class="form-check-label" for="gridRadios2">
                            No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description1">Description 1</label>
                    <textarea name="description1" rows="7" class="d-block w-100 h-100 form-control">{{ $__defaults['description1'] }}</textarea>                        
                  </div>
                  <div class="form-group">
                    <label for="description2">Description 2</label>
                    <textarea name="description2" rows="7" class="d-block w-100 h-100 form-control">{{ $__defaults['description2'] }}</textarea>                        
                  </div>  
                  {{-- <div class="form-group">
                      <label for="info">Info Product</label>
                      <textarea name="info" rows="7" class="d-block w-100 h-100 form-control">{{ $__defaults['info'] }}</textarea>                        
                  </div> --}}
                  <div class="form-group">
                    <label for="delivery_Info">Delivery Info</label>
                    <textarea name="delivery_Info" rows="7" class="d-block w-100 h-100 form-control">{{ $__defaults['delivery_Info'] }}</textarea>                        
                  </div>
                  {{-- <div class="form-group">
                    <label for="return_refund">Return Refund</label>
                    <textarea name="return_refund" rows="7" class="d-block w-100 h-100 form-control">{{ $__defaults['return_refund'] }}</textarea>                        
                  </div>
                  <div class="form-group">
                    <label for="shipping_info">Shipping Info</label>
                    <textarea name="shipping_info" rows="7" class="d-block w-100 h-100 form-control">{{ $__defaults['shipping_info'] }}</textarea>                        
                  </div> --}}
                  <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa-solid fa-pencil text-white-50"></i> Create
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