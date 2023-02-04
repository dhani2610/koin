

      <div class="card-grid-style-3">
        <div class="card-grid-inner">
          <div class="image-box">
            <!-- <span class="label bg-primary">Best Deal</span> -->
            <a href="{{ route('detail-empty-bottle',$item->id) }}">
              <img src="{!!$item->image ? Storage::url($item->image) : url('backend/assets/img/news/img11.jpg') !!} " alt="Alner">
              {{-- <img src="{{ url('frontend/assets/imgs/page/homepage1/imgsp3.png') }}" alt="Alner"> --}}
            </a>
          </div>
          <div class="info-right">
            <a class="color-brand-3 font-sm-bold" href="{{ route('detail-empty-bottle',$item->id) }}">{{ $item->name }}</a>                      
            <div class="price-info">
              <strong class="font-lg-bold color-brand-3 price-main">{{ rupiah($item->price) }}</strong>
            </div>
            @livewire('slider-card-product', [
                'product'    => $item,
            ])
          </div>
        </div>
      </div>