<div class="box-slider-range mt-20 mb-15">
    <div class="row mb-20">
      <div class="col-sm-12">
        <div wire:ignore id="slider-range"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12" wire:ignore>
        <label class="lb-slider font-sm color-gray-500">Price Range:</label>
        <span class="min-value-money font-sm color-gray-1000"></span>
        <label class="lb-slider font-sm font-medium color-gray-1000"></label>
        <span class="max-value-money font-sm font-medium color-gray-1000"></span>
      </div>
      <div class="col-lg-12">
        <input wire:model="min" class="form-control min-value" type="hidden" name="min-value" value="{{ $min }}">
        <input wire:model="max" id="filter-maximum" class="form-control max-value" type="hidden" name="max-value" value="{{ $max }}">
      </div>
    </div>
  </div>
  