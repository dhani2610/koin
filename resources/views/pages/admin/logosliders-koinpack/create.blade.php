@extends('layouts.admin')
@section('title','Slider Logo ')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Slider Logo </h1>
      <div class="section-header-breadcrumb">
        
        <div class="breadcrumb-item"><a >Slider Logo </a></div>
        <div class="breadcrumb-item active">Input Slider Logo </div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="card">
        <div class="card-header">
          <h4>Input Slider Logo </h4>
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
                <form action="{{ route('slider-logo.store') }}" method="POST" enctype="multipart/form-data">{{-- untuk menyimpan sebuah data menggunakan functioan 'store' --}}
                  @csrf{{-- setiap buat form pakai @csrf --}}
                  <div class="form-group">
                      <label for="image">Image</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-folder-open"></i></span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" required>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </div>
                  </div>
                    {{-- <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}" required>
                    </div> --}}
                    
                    <button type="submit" class="btn btn-primary btn-block">
                        Create
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