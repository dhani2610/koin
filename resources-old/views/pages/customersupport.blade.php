@extends('layouts.appalner')
@section('title','Customer Support - Alner ')
@section('content')

  <!-- Customer Support Start -->
  <section class="section-box shop-template mt-50">
    <div class="container">
      <div class="box-contact">
        <div class="row">
          <div class="col-lg-6">
            <div class="contact-form">
              <h3 class="color-brand-3 mt-60">Customer Support</h3>
              <h5>We're Here to Help!</h5>
              <p class="font-sm color-gray-700 mb-30">Fill out the form with any quarry on your mind<br> and we'll get back to you as soon as possible</p>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="First name">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="Last name">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control" type="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control" type="tel" placeholder="Phone number">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Message" rows="5"></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="btn btn-buy w-auto" type="submit" value="Send message">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class=""  >
              <img src="{{ url('frontend/assets/imgs/alner/keranjang.jpg') }}" alt="" class="border-radius">
            </div>

            <!-- <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d325467.51371614134!2d-73.98947743776016!3d40.72209526768085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e0!4m0!4m0!5e0!3m2!1svi!2s!4v1664373110059!5m2!1svi!2s" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> -->
          </div>

        </div>
      </div>
      <section id="visit">
        <div class="box-contact-address pt-80 pb-50">
          <div class="row">
            <div class="col mb-30">
              <h3 class="mb-5">Mitra Yang Tergabung Bersama Kami</h3>
              <p class="font-sm color-gray-700 mb-30">Kunjungi Mitra Alner Terdekat Dibawah Ini</p>
            </div>
            <div class="row">
              @forelse ($locations as $location)
              <div class="col p-3">
                <img class="d-flex mx-auto mb-2" src="{{ url('frontend/assets/imgs/alner/map-pin.svg') }}" alt="Alner"></a></li>            
                <a href="{{ $location->link }}" style="color: #425A8B">
                <span class="text-center">
                    <div class="mb-30">
                      <h4>{{ $location->title}}</h4>
                      <p class="font-sm color-gray-700">{{ $location->address}}</p>
                    </div>
                  </span>
                </a>
              </div>
              @empty
                  
              @endforelse
              
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
  <!-- Customer Support End -->

@endsection
