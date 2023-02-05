@extends('layouts.appalner')
@section('title','Cleaning Supplies - Alner ')
@section('content')

<div class="section-box shop-template mt-30">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 order-first order-lg-last">
        <h2>Return Packaging</h2>
        <div class="box-filters mt-0 pb-5 border-bottom">
          <div class="row">
            <div class="text-lg-end text-center">
            </div>
          </div>
        </div>

        <!-- Card Show All Start -->
        <div class="row mt-20">
          @foreach ($items as $item)
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
            @include('components.sliderbottle', ['items' => $items])
          </div>
          @endforeach

        </div>
        
        <!-- Card Show All Start -->

      </div>

      <!-- Categories Start -->
      @include('includes.categori3')

      <!-- Categories End -->
    </div>
  </div>
</div>

@endsection