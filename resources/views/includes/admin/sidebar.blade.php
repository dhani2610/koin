<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard-koinpack') }}" >
        <img src="{{ url('backend/assets/img/Alner_Logo.png') }}" alt="logo" width="100" class="shadow-sm">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard-koinpack') }}"><span class="text-warning">A</span><span class="text-primary">F</span></a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item {{ (Request::segment(2) == '') ? 'active' : '' }}">
          <a href="{{ route('dashboard-koinpack') }}" class=""><i class="fa-solid fa-house-chimney mx-auto"></i><span class="ml-3">Dashboard</span></a>
        </li>

        <li class="menu-header">Transaction</li>
        <li class="{{ (Request::segment(2) === 'transactions')||request()->is('admin/transactions/*/edit') ? 'active' : ''  }}">
          <a href="{{ route('transactions.index') }}" class=""><i class="fa-solid fa-calculator mx-auto"></i></i><span class="ml-3">Transactions</span></a>
        </li>
        {{-- <li class="{{ (Request::segment(2) === 'shopping')||request()->is('admin/shopping/*/edit') ? 'active' : ''  }}">
          <a href="{{ route('shopping.index') }}" class=""><i class="fa-solid fa-cart-shopping mx-auto"></i></i><span class="ml-3">Shopping Cart</span></a>
        </li> --}}

        <li class="menu-header">products</li>
        <li class="{{ (Request::segment(2) === 'products')||request()->is('admin/products/*/edit') ? 'active' : ''  }}">
          <a href="{{ route('products.index') }}" class=""><i class="fa-solid fa-store mx-auto"></i><span class="ml-3">Products</span></a>
        </li>
        <li class="{{ (Request::segment(2) === 'emptybottle')||request()->is('admin/emptybottle/*/edit') ? 'active' : ''  }}">
          <a href="{{ route('emptybottle.index') }}" class=""><i class="fa-solid fa-wine-bottle mx-auto"></i><span class="ml-3">Empty Bottles</span></a>
        </li>
        <li class="{{ (Request::segment(2) === 'categories')||request()->is('admin/categories/*/edit') ? 'active' : ''  }}">
          <a href="{{ route('categories.index') }}" class=""><i class="fa-solid fa-layer-group mx-auto"></i><span class="ml-3">Categories</span></a>
        </li>
        {{-- <li class="{{ (Request::segment(2) === 'wishlists')||request()->is('admin/wishlists/*/edit') ? 'active' : ''  }}">
          <a href="{{ route('wishlists.index') }}" class=""><i class="fa-solid fa-heart-circle-check mx-auto"></i><span class="ml-3">Wishlists</span></a>
        </li> --}}
        <li class="{{ (Request::segment(2) === 'customers')||request()->is('admin/customers/*/edit') ? 'active' : ''  }}">
          <a href="{{ route('customers.index') }}" class=""><i class="fa-solid fa-users mx-auto"></i><span class="ml-3">Customers</span></a>
        </li>
        <li class="nav-item {{ (Request::segment(2) === 'vouchers')||request()->is('admin/vouchers/*/edit') ? 'active' : '' }}">
          <a href="{{ route('vouchers.index')}}" class=""><i class="fa fa-ticket mx-auto" aria-hidden="true"></i><span class="ml-3">Voucher</span></a>
        </li>
        <li class="nav-item {{ (Request::segment(2) === 'slider-logo')||request()->is('admin/slider-logo/*/edit') ? 'active' : '' }}">
          <a href="{{ route('slider-logo.index')}}" class=""><i class="fa-solid fa-sliders mx-auto"></i><span class="ml-3">Slider Logo</span></a>
        </li>

        <li class="menu-header">UTILITIES</li>
        <li class="{{ (Request::segment(2) === 'customer-support-admin')||request()->is('customer-support-admin') ? 'active' : ''  }}">
          <a href="{{ route('customer-support-admin') }}" class=""><i class="fa-solid fas fa-headset mx-auto"></i><span class="ml-3">Customer Support</span></a>
        </li>
        <li class="{{ (Request::segment(2) === 'locations')||request()->is('admin/locations/*/edit') ? 'active' : ''  }}">
          <a href="{{ route('locations.index') }}" class=""><i class="fa-solid fa-map-location-dot mx-auto"></i><span class="ml-3">Locations Partners</span></a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-paper-plane"></i> <span>Push Notifications</span></a>
          <ul class="dropdown-menu">
            <li class="{{ (Request::segment(2) === 'send-notification') ? 'active' : '' }}">
              <a href="{{ route('send-notification') }}">Send Notification</a>
            </li>
            <li class="{{ (Request::segment(2) === 'historynotification') ? 'active' : '' }}">
              <a href="{{ route('historynotification') }}">History</a>
            </li>
          </ul>
        </li>
        <li class="{{ (Request::segment(2) === 'content')||request()->is('admin/content/*/edit') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('content.index')}}"><i class="fas fa-chalkboard"></i> <span>Contents</span></a>
        </li> --}}
        <li class="{{ (Request::segment(2) === 'settings') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('settings.index')}}"><i class="fas fa-cog"></i> <span>Settings</span></a>
        </li>
      </ul>
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      </div>
  </aside>
</div>