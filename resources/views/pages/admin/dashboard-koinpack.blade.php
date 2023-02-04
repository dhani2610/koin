@extends('layouts.admin')
@section('title','Home - Dashboard')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title text-primary">&nbsp;
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count"><i class="fa-solid fa-user-tie fa-sm"></i>14</div>
                <div class="card-stats-item-label">Partners</div>
              </div>
              <div class="card-stats-item ">
                <div class="card-stats-item-count"><i class="fa-solid fa-users fa-sm"></i> 15</div>
                <div class="card-stats-item-label">Customers</div>
              </div>
              <div class="card-stats-item ">
                <div class="card-stats-item-count"><i class="fa-solid fa-users-line fa-sm"></i> 16</div>
                <div class="card-stats-item-label">Total Users</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fa-solid fa-arrows-rotate text-white"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Bottle Exchange</h4>
            </div>
            <div class="card-body">90
              {{-- {{ $reservation_Rejected_only->count() }} --}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="balance-chart" height="80"></canvas>
          </div>
          <div class="">
            <div class="card-icon shadow-primary bg-primary">
              <i class="fa-solid fa-box-open text-white"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Goods Inventory</h4>
              </div>
              <div class="card-body">80
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12"> 
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="sales-chart" height="80"></canvas>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fa-solid fa-wine-bottle text-white"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Bottle Inventory</h4>
            </div>
            <div class="card-body">78
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-header">
            <a href="" style="text-decoration: none;"><h4>Transactions {{ now()->year }}</h4></a>
          </div>
          <div class="card-body">
            <canvas id="myChartTransaction" height="158"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <a href="" style="text-decoration: none;"><h4>Tracking Order {{ now()->year }}</h4></a>
          </div>  
          <div class="card-body">
            <div class="row">
              <div class="col-sm-2">
                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                  <li class="media">
                    <i class="fa-regular fa-id-card mt-3 fa-2xl" style="color: #C79110"></i>
                    <div class="media-body ml-3">
                      <div class="media-title">Registered</div>
                      <div class="text-small text-muted">101
                      </div>
                    </div>
                  </li>
                  <li class="media">
                    <i class="fa-solid fa-spinner mt-3 fa-2xl" style="color: #C79110"></i>
                    <div class="media-body ml-3">
                      <div class="media-title">Pending</div>
                      <div class="text-small text-muted">20
                      </div>
                    </div>
                  </li>
                  <li class="media">
                    <i class="fa-solid fa-paper-plane mt-3 fa-2xl" style="color: #C79110"></i>
                    <div class="media-body ml-3">
                      <div class="media-title">Sent</div>
                      <div class="text-small text-muted">34
                      </div>
                    </div>
                  </li>
                  <li class="media">
                    <i class="fa-solid fa-check mt-3 fa-2xl" style="color: #C79110" ></i>
                    <div class="media-body ml-3">
                      <div class="media-title">Dones</div>
                      <div class="text-small text-muted">
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>List Transacton</h4>
            <div class="card-header-action">
              <a href="" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive table-invoice">
              <table class="table table-striped">
                <tr class="text-capitalize">
                  <th>Category</th>
                  <th>Name</th>
                  <th>Partners</th>
                </tr>
                
                <tr class="text-capitalize">
                    <td colspan="5" class="text-center">
                      Empty
                    </td> 
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Total Goods Inventory</h4>
            <div class="card-header-action">
              <a href="" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive table-invoice">
              <table class="table table-striped">
                <tr class="text-capitalize">
                  <th>Coupon Code</th>
                  <th>Name</th>
                  <th>Partners</th>
                  {{-- <th>Action</th> --}}
                </tr>
                    <td colspan="5" class="text-center">
                      Empty
                    </td> 
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    {{-- Vouchers Start --}}
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Vouchers</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="vouchers-carousel">
              {{-- @foreach ($item_vouchers as $item_voucher) --}}
              <div>
                <div class="product-item pb-3">
                  <div class="product-image">
                    <a href="">
                      <img alt="image" src="{!!url('backend/assets/img/news/img13.jpg')!!}" class="img-fluid">                                                  
                      
                    </a>
                  </div>
                  <div class="product-details">
                    <div class="product-name">Voucher1</div>
                    
                    <div class="text-muted text-small">ASDFDDD</div>
                    
                  </div>
                </div>
              </div>
              {{-- @endforeach --}}
            </div>
          </div>
        </div>
      </div>
      
    </div>
    {{-- Vouchers End --}}

  </section>
</div>
@endsection
