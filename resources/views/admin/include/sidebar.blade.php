<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
   <div class="sidebar-header">
      <div class="logo_img-sl"style="width: 75px; height: 68px; margin: 0;justify-content: center;
    display: flex;">
         <img src="{{asset('public/admin/assets/images/gw_logo.png')}}" class="logo-icon" alt="logo icon"style="object-fit: fill; width: 67px;">
      </div>
      <!-- <div>
         <h4 class="logo-text">Logo</h4>
         
         </div> -->
      <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
      </div>
   </div>
   <!--navigation-->
   <ul class="metismenu" id="menu">
      <li>
         <a href="{{url('admin_dashboard')}}" >
            <div class="parent-icon"><i class="bi bi-house-door"></i>
            </div>
            <div class="menu-title">Admin Dashboard</div>
         </a>
      </li>
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-award"></i>
            </div>
            <div class="menu-title">Categories Manager</div>
         </a>
         <ul>
            <!-- <li> <a href="{{url('add_cagegories')}}"><i class="bi bi-arrow-right-short"></i>Add Categories</a> -->
            <li> <a href="{{url('show_category')}}"><i class="bi bi-arrow-right-short"></i> Categories</a>
            <li>
               <a href="{{url('show_subcategory')}}"><i class="bi bi-arrow-right-short"></i>SubCategories</a>
               <!-- <li> <a href="{{url('add_subcagegorie')}}"><i class="bi bi-arrow-right-short"></i>Add SubCategories</a> -->
         </ul>
      </li>
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bi bi-award"></i>
            </div>
            <div class="menu-title">Brand</div>
         </a>
         <ul>
          <li> <a href="{{url('brand')}}"><i class="bi bi-arrow-right-short"></i> Add Brand</a> 
         </ul>
      </li>
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-tasks" aria-hidden="true"></i>
            </div>
            <div class="menu-title">Product</div>
         </a>
         <ul>
            <li> <a href="{{url('add_product')}}"><i class="bi bi-arrow-right-short"></i>Add Product</a>
            </li>
            <li> <a href="{{url('product_list')}}"><i class="bi bi-arrow-right-short"></i>Products List </a>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-list" aria-hidden="true"></i>
            </div>
            <div class="menu-title">Orders</div>
         </a>
         <ul>
            <li> <a href="{{ route('orders_list')}}"><i class="bi bi-arrow-right-short"></i>All Orders</a>
            </li>
           <li> <a href="{{url('admin_orders')}}"><i class="bi bi-arrow-right-short"></i>Admin Orders</a>
            </li> 
         </ul>
      </li>
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa fa-upload" aria-hidden="true"></i>
            </div>
            <div class="menu-title">Banners</div>
         </a>
         <ul>
            <li> <a href="{{url('slider_banner')}}"><i class="bi bi-arrow-right-short"></i>Slider Banner</a>
            </li>
            <li> <a href="{{ route('stick') }}"><i class="bi bi-arrow-right-short"></i>Stick Banner</a>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-users"></i>
            </div>
            <div class="menu-title">Vendor</div>
         </a>
         <ul>
            <li> <a href="{{url('vendor_list')}}"><i class="bi bi-arrow-right-short"></i>Vendor  List</a>
            </li>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-users"></i>
            </div>
            <div class="menu-title">Users</div>
         </a>
         <ul>
            <li> <a href="{{url('address_list')}}"><i class="bi bi-arrow-right-short"></i>All User</a>
            </li>
         </ul>
         <ul>
            <li> <a href="{{url('address_list')}}"><i class="bi bi-arrow-right-short"></i>Address List</a>
            </li>
         </ul>
      </li>
   </ul>
   <!--end navigation-->
</aside>
<!--end sidebar -->