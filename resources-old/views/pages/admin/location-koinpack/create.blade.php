@extends('layouts.admin')
@section('title','Locations')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Locations</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a>Locations</a></div>
        <div class="breadcrumb-item active">Input Locations</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Input Location</h4>
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
                'title'             => old('title'),
                'address'           => old('address'),
                'link'           => old('link'),

                              
            ];
        @endphp
    @else
        @php
            $faker = Faker\Factory::create('id_ID');

            $__defaults = [
                'title'     => $faker->sentence(3),
                'address'     => $faker->address(), 
                'link'     => 'https://maps.app.goo.gl/KoQ53TiTdjzKYJQh6',                

            ];
        @endphp
    @endproduction
          
            <div class="card-body">
                <form action="{{ route('locations.store') }}" method="POST" >
                  @csrf{{-- setiap buat form pakai @csrf --}}
                  
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $__defaults['title'] }}" required>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" rows="7" class="d-block w-100 h-100 form-control">{{ $__defaults['address'] }}</textarea>                        
                  </div>
                  <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" name="link" placeholder="Link" value="{{ $__defaults['link'] }}" required>
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