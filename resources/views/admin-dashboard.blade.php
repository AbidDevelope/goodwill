<!doctype html>
<html lang="en" class="minimal-theme">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin-Dashboard</title>
      @include('admin.include.header_link')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   </head>
   <body>
      <!--start wrapper-->
      <div class="wrapper">
         @include('admin.include.header')
         @include('admin.include.sidebar')
         <!--start content-->
         <main class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
               <div class="col">
                  <div class="card radius-10">
                     <div class="card-body">
                        <div class="d-flex align-items-center">
                           <div>
                             
                              <p class="mb-0 text-secondary">Total Orders</p>
                              <h1 class="my-1">{{ $totalorders}}</h1>
                           </div>
                           <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i class="bi bi-basket2-fill"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card radius-10">
                     <div class="card-body">
                        <div class="d-flex align-items-center">
                           <div>
                               <p class="mb-0 text-secondary">Total Vendor</p>
                                <h1 class="my-1">{{$totalvendors}}</h1>
                           </div>
                           <div class="widget-icon-large bg-gradient-success text-white ms-auto"><i class="bi bi-currency-exchange"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card radius-10">
                     <div class="card-body">
                        <div class="d-flex align-items-center">
                           <div>
                             <p class="mb-0 text-secondary">Total Customers</p>

                              <h1> {{ $totalCustomers}}</h1> 
                           </div>
                           <div class="widget-icon-large bg-gradient-danger text-white ms-auto"><i class="bi bi-people-fill"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card radius-10">
                     <div class="card-body">
                        <div class="d-flex align-items-center">
                           <div>
                              <p class="mb-0 text-secondary">Bounce Rate</p>
                              <h4 class="my-1">38.15%</h4>
                              <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 12.2% from last week</p>
                           </div>
                           <div class="widget-icon-large bg-gradient-info text-white ms-auto"><i class="bi bi-bar-chart-line-fill"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--end row-->
           
           
            <div class="card radius-10">
               <div class="card-header bg-transparent">
                  <div class="row g-3 align-items-center">
                     <div class="col">
                        <h5 class="mb-0">Recent Orders</h5>
                     </div>
                     <div class="col">
                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                           <div class="dropdown">
                              <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                              </a>
                              <ul class="dropdown-menu">
                                 <li><a class="dropdown-item" href="javascript:;">Action</a>
                                 </li>
                                 <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                 </li>
                                 <li>
                                    <hr class="dropdown-divider">
                                 </li>
                                 <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table align-middle mb-0">
                        <thead class="table-light">
                           <tr>
                              <th>#ID</th>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Date</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>#89742</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3">
                                    <div class="product-box border">
                                       <img src="assets/images/products/11.png" alt="">
                                    </div>
                                    <div class="product-info">
                                       <h6 class="product-name mb-1">Smart Mobile Phone</h6>
                                    </div>
                                 </div>
                              </td>
                              <td>2</td>
                              <td>$214</td>
                              <td>Apr 8, 2021</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>#68570</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3">
                                    <div class="product-box border">
                                       <img src="assets/images/products/07.png" alt="">
                                    </div>
                                    <div class="product-info">
                                       <h6 class="product-name mb-1">Sports Time Watch</h6>
                                    </div>
                                 </div>
                              </td>
                              <td>1</td>
                              <td>$185</td>
                              <td>Apr 9, 2021</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>#38567</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3">
                                    <div class="product-box border">
                                       <img src="assets/images/products/17.png" alt="">
                                    </div>
                                    <div class="product-info">
                                       <h6 class="product-name mb-1">Women Red Heals</h6>
                                    </div>
                                 </div>
                              </td>
                              <td>3</td>
                              <td>$356</td>
                              <td>Apr 10, 2021</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>#48572</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3">
                                    <div class="product-box border">
                                       <img src="assets/images/products/04.png" alt="">
                                    </div>
                                    <div class="product-info">
                                       <h6 class="product-name mb-1">Yellow Winter Jacket</h6>
                                    </div>
                                 </div>
                              </td>
                              <td>1</td>
                              <td>$149</td>
                              <td>Apr 11, 2021</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>#96857</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3">
                                    <div class="product-box border">
                                       <img src="assets/images/products/10.png" alt="">
                                    </div>
                                    <div class="product-info">
                                       <h6 class="product-name mb-1">Orange Micro Headphone</h6>
                                    </div>
                                 </div>
                              </td>
                              <td>2</td>
                              <td>$199</td>
                              <td>Apr 15, 2021</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td>#68527</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3">
                                    <div class="product-box border">
                                       <img src="assets/images/products/05.png" alt="">
                                    </div>
                                    <div class="product-info">
                                       <h6 class="product-name mb-1">Men Sports Shoes Nike</h6>
                                    </div>
                                 </div>
                              </td>
                              <td>1</td>
                              <td>$124</td>
                              <td>Apr 22, 2021</td>
                              <td>
                                 <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </main>
         <!--end page main-->
         <!--start overlay-->
         <div class="overlay nav-toggle-icon"></div>
         <!--end overlay-->
         <!--Start Back To Top Button-->
         <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
         <!--End Back To Top Button-->
         <!--start switcher-->
         <!--end switcher-->
      </div>
      <!--end wrapper-->
      @include('admin.include.footer')
   </body>
</html>