@extends('layouts.admin')
@section('title','Locations')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Locations</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a>Locations</a></div>
        <div class="breadcrumb-item active">Edit Locations</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Edit Location</h4>
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
                <form action="{{ route('locations.update', $item->id) }}" method="POST">{{-- untuk menyimpan sebuah data menggunakan functioan 'store' --}}
                  @csrf{{-- setiap buat form pakai @csrf --}}
                  @method('PUT')
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}" required>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" rows="7" class="d-block w-100 h-100 form-control">{{ $item->address }}</textarea>                        
                  </div>
                  <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" name="link" placeholder="Link" value="{{ $item->link }}" required>
                  </div>
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
  
@endpush