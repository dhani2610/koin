@extends('layouts.admin')
@section('title','Shopping Carts')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Shopping Carts</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a>Shopping Carts</a></div>
        <div class="breadcrumb-item active">Input Shopping Carts</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Input Shopping Cart</h4>
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
                <form action="{{ route('shopping.store') }}" method="POST" >
                  @csrf{{-- setiap buat form pakai @csrf --}}
                  
                  <div class="form-group">
                    <label for="users_id">User</label>
                    <select name="users_id" class="form-control" required>
                        @foreach ($users as $user)
                          @if ($user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="products_id">Product</label>
                    <select name="products_id" class="form-control" required>
                        @foreach ($products as $product)
                          @if ($product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="number" class="form-control" name="qty" placeholder="Qty" value="{{ old('qty') }}" required>
                  </div>
                  
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
  
@endpush