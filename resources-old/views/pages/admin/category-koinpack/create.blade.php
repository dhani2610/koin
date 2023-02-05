@extends('layouts.admin')
@section('title','Categories')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Categories</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a>Categories</a></div>
        <div class="breadcrumb-item active">Input Categories</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Input Category</h4>
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
                'name_category'             => old('name_category'),               
                
            ];
        @endphp
    @else
        @php
            $faker = Faker\Factory::create();

            $__defaults = [
                'name_category'     => $faker->colorName(),
            ];
        @endphp
    @endproduction
          
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">{{-- untuk menyimpan sebuah data menggunakan functioan 'store' --}}
                  @csrf{{-- setiap buat form pakai @csrf --}}
                  
                  <div class="form-group">
                    <label for="name_category">Name Category</label>
                    <input type="text" class="form-control" name="name_category" placeholder="Name Category" value="{{ $__defaults['name_category'] }}" required>
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