@extends('layouts.admin')
@section('title','Transactions')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Transactions</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a>Transactions</a></div>
        <div class="breadcrumb-item active">Input Transactions</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Input Transaction</h4>
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
                <form action="{{ route('transactions.store') }}" method="POST" >
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

                  {{-- <div class="form-group">
                    <label for="products_id">Product</label>
                    <select name="products_id" class="form-control" required>
                        @foreach ($products as $product)
                          @if ($product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                          @endif
                        @endforeach
                    </select>
                  </div> --}}
                  {{-- <div class="form-group">
                    <label for="external_id">Unique Id</label>
                    <input type="text" class="form-control" name="external_id" placeholder="Unique Id" value="{{ old('external_id') }}">
                  </div> --}}
                  <div class="form-group">
                    <label for="price">Total Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Total Price" value="{{ old('price') }}" required>
                  </div>
                  {{-- <div class="form-group">
                    <label for="">Status</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-gradient-success">
                          <span>
                            <i class="fas fa-user-check"></i>
                          </span>
                        </span>
                      </div>
                      <select name="status" class="form-control" required>
                        <option value="1" selected>Pending</option>
                        <option value="0">Success</option>
                      </select>
                    </div>
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
  
@endpush