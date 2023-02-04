@extends('layouts.admin')
@section('title','Categories')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Categories</h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a>Categories</a></div>
        <div class="breadcrumb-item active">Edit Categories</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Edit Category</h4>
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
                <form action="{{ route('categories.update', $item->id) }}" method="POST" enctype="multipart/form-data">{{-- untuk menyimpan sebuah data menggunakan functioan 'store' --}}
                  @csrf{{-- setiap buat form pakai @csrf --}}
                  @method('PUT')
                  
                  <div class="form-group">
                    <label for="name_category">Name Category</label>
                    <input type="text" class="form-control" name="name_category" placeholder="Name Category" value="{{ $item->name_category }}" required>
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