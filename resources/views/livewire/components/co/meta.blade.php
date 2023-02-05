<div class="row border mt-100">
    <div class="col-lg-8 px-0">
      <div class="mb-4 py-4 px-4">
        <h2>Customer Details</h2>
        <div class="flex flex-column mt-4">
          <div class="flex mb-2">Email</div>
          <div class="flex">
            <input type="text" disabled value="{{ $user->email }}" placeholder="Email" class="form-control text-brand py-2 font-16">
          </div>
        </div>
        <div class="flex flex-column mt-3">
          <div class="flex mb-2">Full Name</div>
          <div class="flex">
            <input type="text" wire:model="name" value="{{ $name }}" placeholder="Name" class="form-control py-2 font-16">
          </div>
        </div>
        <div class="flex flex-column mt-3">
          <div class="flex mb-2">Phone</div>
          <div class="flex">
            <input type="text" wire:model="phone" value="{{ $phone }}" placeholder="Phone" class="form-control text-brand py-2 font-16">
          </div>
        </div>
        <div class="flex flex-column mt-3">
          <div class="flex mb-2">Address</div>
          <div class="flex">
            <input type="text" wire:model="address" value="{{ $address }}" placeholder="Address" class="form-control text-brand py-2 font-16">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 px-0 bg-success">
      <div class="py-4 px-4 height-100" style="background-color: #F1F5F9">
        <div class="py-2 d-flex px-0 align-items-center justify-content-between">
          <input wire:model="vc" type="text" value="{{ $vc }}" placeholder="Enter a voucher" id="voucher" class="form-control text-brand py-2">
          <a class="btn btn-primary cek-vc" onclick="cek()" style="height : 35px;">Cek</a>
        </div>
        <div class="py-2 d-flex px-0 align-items-center justify-content-between">
          <div id="msg-vc"></div>
        </div>
        <div class="py-2 d-flex px-0 align-items-center justify-content-between">
          <textarea wire:model="notes" type="text" placeholder="Notes" class="form-control text-brand py-2">{{ $notes }}</textarea>
        </div>
        {{-- <div class="py-2 d-flex align-items-center justify-content-between">
          <span>Subtotal</span>
          <span>3000</span>
        </div> --}}
        <div class="py-2 d-flex flex-row align-items-center justify-content-between">
          <select name="shipping" wire:model="shipping" class="form-select" required>
            <option value="10">Antar Sendiri</option>
            <option value="8000">Dijemput Koinpack</option>
          </select>
        </div>
        <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between div-nominal hilang">
          <span class="fs-6">Voucher Nominal</span>
          <span class="fs-6 vc-nominal" ></span>
        </div>
        <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between">
          <span class="fs-6">Shipping</span>
          <span class="fs-6">{{ rupiah($shipping) }}</span>
        </div>
        @php
            $totaleEmptyBottlePlusShipping = $totaleEmptyBottle+$shipping;
            $totalEmptyBottle_TotalProduct = $totaleEmptyBottle-$totalProduct;

            $totalTotalProduct_EmptyBottle = $totalProduct-$totaleEmptyBottle;

        @endphp
        
        @if ($totalProduct && $totaleEmptyBottle || $totalProduct && !$totaleEmptyBottle)
          @if ($totalTotalProduct_EmptyBottle > 0)
            @if($totalTotalProduct_EmptyBottle < $shipping)
            <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between">
              <span class="fs-6">Total</span>
              <span class="fs-6">{{ rupiah($total = $totalTotalProduct_EmptyBottle+$shipping) }}</span>
            </div>
            @elseif($totalTotalProduct_EmptyBottle > $shipping)
              <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between">
                <span class="fs-6">Total</span>
                <span class="fs-6">{{ rupiah($total = $totalTotalProduct_EmptyBottle-$shipping) }}</span>
              </div>
            @endif
          @else
            @if($totalEmptyBottle_TotalProduct < $shipping)
              <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between">
                <span class="fs-6">Total</span>
                <span class="fs-6">{{ rupiah($total = $shipping - $totalEmptyBottle_TotalProduct) }}</span>
              </div>  
            
            @else
              <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between">
                <span class="fs-6">Total</span>
                <span class="fs-6">{{ rupiah($total = 0) }}</span>
              </div>
              <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between">
                <span class="fs-6 text-success">Sisa <span class="badge bg-success">{{ rupiah($cashback = $totalEmptyBottle_TotalProduct - $shipping) }}</span> akan dimasukkan ke cashback akun kamu</span>
              </div>
              
            @endif
          @endif
        @elseif (!$totalProduct && $totaleEmptyBottle)
          @if($totaleEmptyBottle < $shipping)
            <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between">
              <span class="fs-6">Total</span>
              <span class="fs-6">{{ rupiah($total = $shipping - $totaleEmptyBottle) }}</span>
            </div>  
          
          @elseif($totaleEmptyBottle > $shipping)
            <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between">
              <span class="fs-6">Total</span>
              <span class="fs-6">{{ rupiah($total = 0) }}</span>
            </div>
            <div class="border-top mt-2 py-3 pt-4 d-flex align-items-center justify-content-between">
              <span class="fs-6 text-success">Sisa <span class="badge bg-success">{{ rupiah($cashback = $totaleEmptyBottle - $shipping) }}</span> akan dimasukkan ke cashback akun kamu</span>
            </div>
          @endif
          
        @endif
     

        <div class="mt-4">
          {{-- {{var_dump($total)}} --}}
        <button wire:click="store({{ $total }}, '{{ $cashback }}')" type="submit" class="btn btn-success width-100  @if (!$totalProduct && !$totaleEmptyBottle) disabled @endif">Checkout</button>
          {{-- <a href="{{ route('checkout') . '?name=' . urlencode($name) . '&cashback=' . urlencode($cashback) . '&phone=' . urlencode($phone) . '&address=' . urlencode($address) . '&notes=' . urlencode($notes) . '&shipping=' . urlencode($shipping) . '&total=' . urlencode($total) . '&vc=' . $vc }}" class="btn btn-success width-100  @if (!$totalProduct && !$totaleEmptyBottle) disabled @endif">Checkout</a> --}}
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script>
  
  
  function cek(){
    $.ajax({
            url: "co",
            type: "get",
            data: {
                "_token": "{{ csrf_token() }}",
                search: $('#voucher').val()
            },
            success: function (data) {
                console.log(data.price);
              $('#msg-vc').html(data.msg);
  
              var bilangan = data.price;
              console.log(data);
     
              if (data.msg == 'Voucher Ditemukan') {
                $('.vc-nominal').html('Rp. '+data.price);
              }else{
                $('.vc-nominal').html('Rp. 0');
  
              }
       
            }
        })
  }
  
  </script>
  