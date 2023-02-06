@extends('layouts.admin')
@section('title','Utilities')
@push('prepend-style')

@endpush
@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-header">
        <h1>Utilities</h1>
        <div class="section-header-breadcrumb">
          <div class="section-header-breadcrumb">
              <div class="breadcrumb-item "><a >Utilities</a></div>
              <div class="breadcrumb-item active"><a >Customer Support</a></div>
            </div>
        </div>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h4>Customer Support</h4>
              
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table id="mytable" class="table table-striped" style="width:100%">
                  <thead class="">
                      <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">First Name</th>
                          <th class="text-center">Last Name</th>
                          <th class="text-center">Phone</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Message</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody class="">
                    @php
                          $s=1;                                                   
                      @endphp
                    @forelse ($data as $item)
                    <tr>
                        <td class="pt-4 text-right">{{ $s }}</td>
                        <td class="pt-4 text-center">{{ $item->first_name }}</td>
                        <td class="pt-4 text-center">{{ $item->last_name }}</td>
                        <td class="pt-4 text-center">{{ $item->tlp }}</td>
                        <td class="pt-4 text-center">{{ $item->email }}</td>
                        <td class="pt-4 text-center">{{ $item->msg }}</td>
                        <td class="pt-4 text-center">
                          @if ($item->status == 'Dibatalkan')
                              <span class="badge badge-danger">Dibatalkan</span>
                          @elseif ($item->status == 'Pending')
                            <span class="badge badge-warning">Pending</span>
                          @elseif ($item->status == 'Selesai')
                            <span class="badge badge-success">Selesai</span>
                          @elseif ($item->status == '')
                            <span class="badge badge-info">Belum Ada Action</span>
                          @endif
                        </td>
                        <td class="pt-4 text-center">
                          <a href="{{ route('customer-support-change-status', $item->id)}}" 
                            class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        </td>
                        @php
                        $s++; 
                        @endphp
                        @empty
                      <td colspan="8" class="text-center">
                        Empty
                    </td>                
                      @endforelse
                    </tr>
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

@push('prepend-script')
    
@endpush

@push('addon-script')


  
@endpush