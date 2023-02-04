@extends('layouts.app')
@section('title','Homelivewire ')

@push('prepend-style')
@endpush

@push('addon-style')
@endpush

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Livewire</div>
        <div class="card-body">
          {{-- <livewire:contact-index></livewire:contact-index> utk 7 keatas--}}
          {{-- @livewire('contact-index') utk versi 7 kebawah--}}
          
          <livewire:contact-index></livewire:contact-index>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('prepend-script')
@endpush

@push('addon-script')

@endpush


