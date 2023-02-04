<form wire:submit.prevent="store" class="the-form-of-qty">
    <div class="row">
      <div class="col-lg-12 mb-20">
        <h5 class="font-md-bold color-brand-3 text-sm-start text-center">Contact information</h5>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="Fullname *">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="Username *">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="Phone Number *">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="Email *">
        </div>
      </div>
      
      
      <!--<div class="col-lg-12">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="Address *">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="Address 2*">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <select class="form-control font-sm select-style1 color-gray-700">
            <option value="">Select an option...</option>
            <option value="1">Option 1</option>
          </select>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="City*">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="PostCode / ZIP*">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="Company name">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <input class="form-control font-sm" type="text" placeholder="Phone*">
        </div>
      </div> -->
      <div class="col-lg-12">
        <div class="form-group mb-0">
          <textarea class="form-control font-sm" placeholder="Address *" rows="5"></textarea>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group mt-20">
          {{-- <input class="btn btn-buy w-auto h54 font-md-bold" value="Save change"> --}}
          <button type="submit" class="btn btn-sm btn-primary">Update</button>

        </div>
      </div>
    </div>
  </form>