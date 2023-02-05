
    <div class="d-inline-block box-dropdown-cart">
        <div>
            <span class="font-lg icon-list icon-cart">
              <span>Cart</span>
                <livewire:cartcount></livewire:cartcount>
            </span>
          </div>
          
          <div>
            <div class="dropdown-cart overflow-auto" style="max-height: 500px;">
                <livewire:dropdown-cart-header></livewire:dropdown-cart-header> 

                <div class="border-bottom pt-0 mb-15"></div>
                <livewire:dropdown-cart-bottle-header></livewire:dropdown-cart-bottle-header> 

                <div class="border-bottom pt-0 mb-15"></div>
                <div class="cart-total">
                  <livewire:total-cart-header></livewire:total-cart-header> 
                    
                  <div class="row">
                    <div class="col text-start mt-10">
                      <a class="btn btn-buy w-auto" href="{{ route('empety-bottle') }}">Add empty packaging</a>
                    </div>
                  </div>
                  <div class="row mt-15">
                    <livewire:view-cart-header></livewire:view-cart-header> 
                  </div>
                </div>
              </div>   
                
            
        </div>
        
    </div>
