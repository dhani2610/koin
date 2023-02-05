@extends('layouts.appalner')
@section('title','Cart - Alner ')
@section('content')


<!-- My Cart Start -->
<section class="section-box shop-template">
  <div class="container-fluid mt-50">
    <div class="row justify-content-center mb-100">
      <div class="col-lg-10">
        <div class="container-fluid">
          @livewire('components.co.meta', ['user' => $user, 'customer' => $customer])
        </div>
      </div>

    </div>
    {{-- <div class="row mb-50 mt-100 flex justify-content-end">
      <div class="col-lg-3">
        hallo
      </div>
    </div> --}}
  </div>
</section>
<!-- My Cart End -->

@endsection