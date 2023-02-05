<div class="card-grid-style-3">
    <div class="card-grid-inner">
        <div class="image-box">
            <span class="label bg-primary">Best Deal</span>
            <a href="{{ route('detail-product', $item->id) }}">
                <img src="{!!$item->image ? Storage::url($item->image) : url('backend/assets/img/news/img11.jpg') !!} " alt="Alner">
            </a>
        </div>
        <div class="info-right">
            <a class="color-brand-3 font-sm-bold" href="{{ route('detail-product', $item->id) }}">{{ $item->name }}</a>
            <div class="price-info">
                <strong class="font-lg-bold color-brand-3 price-main">{{ rupiah($item->price) }}</strong>
            </div>
            {{-- <livewire:slider-card :product="str_replace('SKU: ', '', $item->unique_id), :item="$item"></livewire:slider-card> --}}
            @livewire('slider-card', [
                // 'product' => str_replace("SKU: ", "", $item->unique_id),
                'product'    => $item,
            ])
            {{-- passing variable 'product', membuang "SKU: " pada value $item->unique_id --}}
        </div>
    </div>
</div>