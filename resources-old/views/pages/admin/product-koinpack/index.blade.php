@extends('layouts.admin')
@section('title','Product')
@section('content')
{{-- pemberian category --}}
{{-- @php
    $faker = Faker\Factory::create('id_ID');
    $converts = App\Koinpack_product::all();
            $no =0;
            foreach ($converts as $convert) {
                $no +=1;
                if ($no < 7) {
                    $convert->category_id = 1;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                elseif ($no < 14) {
                    $convert->category_id = 3;

                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                elseif ($no < 21) {
                    $convert->category_id = 5;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                elseif ($no < 28) {
                    $convert->category_id = 6;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                elseif ($no < 35) {
                    $convert->category_id = 7;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                elseif ($no < 42) {
                    $convert->category_id = 8;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                elseif ($no < 49) {
                    $convert->category_id = 9;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                elseif ($no < 56) {
                    $convert->category_id = 10;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                elseif ($no < 63) {
                    $convert->category_id = 11;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                elseif ($no < 70) {
                    $convert->category_id = 12;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                else {
                    $convert->category_id = 1;
                    $convert->price = $faker->randomNumber(4);
                    $convert->final_price = $faker->randomNumber(4);
                    $convert->discount           = $faker->randomNumber(2);
                    $convert->brand               = $faker->colorName();
                    $convert->description1        = $faker->text(200);
                    $convert->description2        = $faker->text(200);
                    $convert->delivery_Info        = $faker->text(200);
                    $convert->stock_availability  = $faker->randomNumber(2);
                    $convert->supplier_price      = $faker->randomNumber(4);
                    $convert->supplier_name       = $faker->name();
                    $convert->unit                = $convert->unit;
                    $convert->product_weight      = $faker->randomNumber(1);
                    $convert->save();
                }
                

            }
            dd('alhamdulillah');
@endphp --}}
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Products</h1>
      <div class="section-header-breadcrumb">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a>Products</a></div>
            
          </div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">This is Example Page</h2>
      <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
      <div class="card">
        <div class="card-header d-sm-flex align-items-center justify-content-between ">
          <h4>Products</h4>
          <a href="{{ route('products.create')}}"
           class="btn btn-sm btn-primary shadow-sm rounded">
           <i class="fas fa-plus fa-sm text-white-50"></i>
           Add Product
            </a>     
            
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped" id="mytable" width="100%" collspacing="0">
                  <thead>
                      <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Image</th>
                          {{-- <th class="text-center">Unique Id</th> --}}
                          <th class="text-center">Category</th>
                          <th class="text-center">Product Name</th>
                          {{-- <th class="text-center">Info</th> --}}
                          <th class="text-center">Old Price</th>
                          <th class="text-center">Final Price</th>
                          <th class="text-center">Discount</th>
                          {{-- <th class="text-center">Return Refund</th> --}}
                          {{-- <th class="text-center">Shipping Info</th> --}}
                          <th class="text-center">Visibility</th>
                          <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                          $s=1;                                                   
                      @endphp
                      @forelse ($items as $item)                      
                          <tr>
                              <td class="pt-4 text-center">{{$s}}</td>
                              <td>
                                  <img src="{!!$item->image ? Storage::url($item->image) : url('backend/assets/img/news/img11.jpg') !!}" class="box-img mr-1 img-thumbnail" width="50">                                
                              </td>
                              {{-- <td class="pt-4 text-center">{{ $item->unique_id }} </td> --}}
                              <td class="pt-4 text-center">
                                @if ($item->category)
                                {{ $item->category->name_category }}
                                @else
                                  <span class="text-danger"><i class="fa-solid fa-trash"></i> {{ $item->category_id }}</span>
                                @endif 
                              </td>
                              <td class="pt-4 text-center">{{ $item->name }} </td>
                              {{-- <td class="pt-4 text-center">{{ $item->info ? Str::limit($item->info, 10) : '-'  }} </td> --}}
                              <td class="pt-4 text-center">{{ rupiah($item->old_price) }} </td>
                              <td class="pt-4 text-center">{{ rupiah($item->price) }} </td>
                              <td class="pt-4 text-center">{{ $item->discount }}% </td>
                              {{-- <td class="pt-4 text-center">{{ $item->return_refund ? Str::limit($item->return_refund, 10) : '-' }} </td>
                              <td class="pt-4 text-center">{{ $item->shipping_info ? Str::limit($item->shipping_info, 10) : '-' }} </td> --}}
                              <td class="pt-4 text-center">
                                <i class="{{ $item->visibility == 1 ? 'fa-solid fa-circle-check text-success' : 'fa-solid fa-circle-xmark text-danger'}}"></i>
                              </td>
                              <td width="13%" >
                                <a href="{{ route('products.show', $item->id)}}" 
                                    class="btn btn-success my-1">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{ route('products.edit', $item->id)}}" 
                                    class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                
                                

                                <form action="{{ route('products.destroy', $item->id) }}"
                                    method="POST" class="d-inline" id="dataPermanen-{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button class="btn btn-danger" onclick="deleteRowPermanen( {{ $item->id }} )" > 
                                <i class="fa fa-trash"></i> 
                                </button>
                                
                                
                                {{-- <form action="{{ route('products.restore')}}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-secondary"> 
                                    <i class="fa fa-trash-restore"></i> 
                                    </button>
                                </form>  --}}
                              </td>
                          </tr>
                          @php
                              $s++; 
                          @endphp
                          
                      @empty
                      <td colspan="11" class="text-center">
                          Empty
                      </td>                                
                      @endforelse
                  </tbody>
              </table>
          </div>
      </div> 
        <div class="card-footer bg-whitesmoke">
          
        </div>
      </div>
    </div>
  </section>
  </div>

  
@endsection