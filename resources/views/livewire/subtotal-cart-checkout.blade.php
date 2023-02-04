<div>
  <div class="border-bottom mb-10">
    <div class="row">
      <div class="col-5"><span class="font-sm-bold color-gray-500">Subtotal Products</span></div>
      <div class="col-7 text-end">
        <h6>{{ rupiah($total) }}</h6>
      </div>
    </div>
  </div>
  <div class="border-bottom mb-10">
    <div class="row">
      <div class="col-5"><span class="font-sm-bold color-gray-500">Subtotal Empty packaging</span></div>
      <div class="col-7 text-end">
        <h6>{{ rupiah($totaleEmptyBottle) }}</h6>
      </div>
    </div>
  </div>
  {{-- <div class="border-bottom mb-10">
    <div class="row justify-content-between">
      <div class="col-6">
        <span class="font-sm-bold color-gray-500">Shipping</span>
      </div>
      <div class="col-3">
        <select name="city" wire:model="city" class="form-select" required>
                    <option value="500">Dijemput Koinpack : Rp. 500</option>
                    <option value="400">Antar Sendiri : Rp. 400</option>
        </select>
      </div>
    </div>
  </div> --}}
  {{-- <div class="border-bottom mb-10">
    <div class="row">
      <div class="col-6"><span class="font-sm-bold color-gray-500">Shipping</span></div>
      <div class="col-6 text-end">
        <h6>	Free</h6>
      </div>
    </div>
  </div>
  <div class="border-bottom mb-10">
    <div class="row">
      <div class="col-5"><span class="font-sm-bold color-gray-500">Estimate for</span></div>
      <div class="col-7 text-end">
        <h6>West Java</h6>
      </div>
    </div>
  </div> --}}
  <div class="mb-10">
    <div class="row">
      <div class="col-3"><span class="font-sm-bold color-gray-500">Total</span></div>
      <div class="col-9 text-end">
        <h6>{{ rupiah($hasil) }}</h6>
      </div>
    </div>
    <div class="row">
      <div class="col text-start mt-10">
        <!-- <a class="btn btn-success w-auto" href="shop-checkout.html">Tambah Kemasan Kosong</a> -->
        <div class="box-button"><a class="btn btn-buy" href="{{ route('empety-bottle') }} ">Add empty packaging</a></div>
      </div>
    </div>
  </div>
  <div class="box-button">
    <a class="btn btn-buy" href="{{ route('co') }}">Proceed To CheckOut</a>
  </div>
</div>
