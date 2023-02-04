<div class="row mt-20">
    @foreach ($products as $item)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
        @livewire('components.product.product-listing', ['item' => $item], key($item->id))
    </div>
    @endforeach
</div>
