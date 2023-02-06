<div class="swiper-slide " role="group"  style="width: 426px; margin-right: 30px;">
    <div class="card-grid-style-3">
      <div class="card-grid-inner">
        <div class="image-box">
          {{-- <a href="{{ route('detail-product', $cat->id) }}"> --}}
          <a href="{{ route('detail-product', $item->id) }}">
            <img src="{!!$item->image ? Storage::url($item->image) : url('backend/assets/img/news/img11.jpg') !!} " alt="Alner">
            {{-- <img src="{{ url ('frontend/assets/imgs/alner/shutterstock_123544366.png') }} " alt="Alner"> --}}
          </a>
        </div>
        <div class="info-right">
              <a class="color-brand-3 font-sm-bold" href="{{ route('detail-product', $item->id) }}">{{$item->name_category}}</a>
      </div>
      </div>
    </div>
    {{-- <span class="label bg-primary">{{$item->name_category}}</span> --}}
  </div>