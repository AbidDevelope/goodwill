  {{-- Headerlink Include --}}
  @include('vendor.include.headerlink')
  {{-- Headerlink Include --}}
  <!-- ===== start sidebar =========-->

  <aside class="navbar-aside" id="offcanvas_aside">
      <div class="aside-top">
          <a href="{{ route('vendor/dashboard') }}" class="brand-wrap">
              <img src="{{ asset('public/vendor/assets/images/theme/logo.png') }}" class="logo" alt="Evara Dashboard">
          </a>
          <div>
              <button class="btn btn-icon btn-aside-minimize"> <i class="fa-solid fa-bars"></i> </button>
          </div>
      </div>
      <nav>
          <ul class="menu-aside">
              <li class="menu-item active">
                  <a class="menu-link" href="{{ route('vendor/dashboard') }}"> <i class="fa fa-home"
                          aria-hidden="true"></i>
                      <span class="text">Dashboard</span>
                  </a>
              </li>
              <li class="menu-item has-submenu">
                  <a class="menu-link" href="page-products-list.html"> <i class="fa fa-shopping-bag"
                          aria-hidden="true"></i>
                      <span class="text">Category</span>
                  </a>
                  <div class="submenu">
                      <a href="{{ route('vendor/category') }}">Add Category </a>
                      <a href="{{ route('vendor/subcategory') }}">Sub Category </a>
                  </div>
              </li>
              <li class="menu-item has-submenu">
                  <a class="menu-link" href="page-products-list.html"> <i class="fa fa-list-alt" aria-hidden="true"></i>
                      <span class="text">Products</span>
                  </a>
                  <div class="submenu">
                      <a href="{{ route('vendor/product') }}">Add Product </a>
                      <a href="{{ route('vendor/product_list') }}">Product List</a>

                  </div>
              </li>
              <li class="menu-item has-submenu">
                <a class="menu-link" href=""> <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span class="text">Brands</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('brand') }}">Add Brand </a>
                </div>
              </li>
              <li class="menu-item has-submenu">
                <a class="menu-link" href="page-orders-1.html"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="text">Orders</span>
                </a>
                <div class="submenu">
                    <a href="{{ route('order/list') }}">Order list </a>
                    <!-- <a href="{{ route('order/invoice') }}">Invoice</a> -->
                </div>
            </li>
          </ul>
      </nav>
  </aside>
  <!-- ===== end sidebar =========-->