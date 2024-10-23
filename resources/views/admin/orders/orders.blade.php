

<!doctype html>

<html lang="en" class="minimal-theme">

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

<title>goodwillonlinestores-orders</title>

@include('admin.include.header_link')



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<style>

#customers {

  font-family: Arial, Helvetica, sans-serif;

  border-collapse: collapse;

  width: 100%;

}



#customers td, #customers th {

  border: 1px solid #ddd;

  padding: 8px;

}



#customers tr:nth-child(even){background-color: #f2f2f2;}



#customers tr:hover {background-color: #ddd;}



#customers th {

  padding-top: px;

  padding-bottom: 12px;

  text-align: center;

  background-color: #808080;

  color: white;

}

#customers td {

  padding-top: 20px;

  padding-bottom: 12px;

  text-align: center;

  font-size:20px;

 



}

</style>

</head>

<body>

<!--start wrapper-->

  <div class="wrapper">

  @include('admin.include.header')

  @include('admin.include.sidebar')

  <!--start content-->

  <main class="page-content">

           



           <div class="card">

             <div class="card-header py-3"> 

               <div class="row g-3 align-items-center">

                 <div class="col-12 col-lg-4 col-md-6 me-auto">

                   <h5 class="mb-1">Tue, {{ $order->created_at }}</h5>

                   <p class="mb-0">Order ID : {{ $order->id }}</p>

                 </div>

                 <div class="col-12 col-lg-3 col-6 col-md-3">

                   <select class="form-select">

                     <option>Change Status</option>

                     <option>Awaiting Payment</option>

                     <option>Confirmed</option>

                     <option>Shipped</option>

                     <option>Delivered</option>

                   </select>

                 </div>

                 <div class="col-12 col-lg-3 col-6 col-md-3">

                    <button type="button" class="btn btn-primary">Save</button>

                    <button type="button" class="btn btn-secondary"><i class="bi bi-printer-fill"></i> Print</button>

                 </div>

               </div>

              </div>

             <div class="card-body">

                 <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">

                    <div class="col">

                      <div class="card border shadow-none radius-10">

                        <div class="card-body">

                         <div class="d-flex align-items-center gap-3">

                           <div class="icon-box bg-light-primary border-0">

                             <i class="bi bi-person text-primary"></i>

                           </div>

                           <div class="info">

                              <h6 class="mb-2">Customer</h6>

                              <p class="mb-1">{{ $order->name }}</p>

                              <p class="mb-1">{{ $order->email }}</p>

                              <p class="mb-1">{{ $order->mobile }}</p>

                           </div>

                        </div>

                        </div>

                      </div>

                    </div>

                    <div class="col">

                     <div class="card border shadow-none radius-10">

                       <div class="card-body">

                         <div class="d-flex align-items-center gap-3">

                           <div class="icon-box bg-light-success border-0">

                             <i class="bi bi-truck text-success"></i>

                           </div>

                           <div class="info">

                              <h6 class="mb-2">Order info</h6>

                              <p class="mb-1"><strong>Shipping</strong> : Red Express</p>

                              <p class="mb-1"><strong>Pay Method</strong> : {{ $order->payment_mode }}</p>

                              <p class="mb-1"><strong>Status</strong> : {{ $order->status }}</p>

                           </div>

                        </div>

                        </div>

                       </div>

                    </div>

                   <div class="col">

                     <div class="card border shadow-none radius-10">

                       <div class="card-body">

                         <div class="d-flex align-items-center gap-3">

                           <div class="icon-box bg-light-danger border-0">

                             <i class="bi bi-geo-alt text-danger"></i>

                           </div>

                           <div class="info">

                             <h6 class="mb-2">Deliver to</h6>

                             <p class="mb-1"><strong>City</strong> : {{ $order->city }}</p>

                             <p class="mb-1"><strong>Address</strong> : {{ $shipping->shipping_address }}</p>

                           </div>

                         </div>

                       </div>

                      </div>

                 </div>

               </div><!--end row-->



               <div class="row">

                   <div class="col-12 col-lg-8">

                      <div class="card border shadow-none radius-10">

                        <div class="card-body">

                            <div class="table-responsive">

                              <table class="table align-middle mb-0">

                                <thead class="table-light">

                                  <tr>

                                    <th>Product</th>

                                    <th>Unit Price</th>

                                    <th>Quantity</th>

                                    <th>Total</th>

                                  </tr>

                                </thead>

                                <tbody>

                                @foreach($orderItem as $item)
                                <tr>
                                  <td>
                                    <div class="orderlist">
                                      <a class="d-flex align-items-center gap-2" href="javascript:;">
                                        <div class="product-box">
                                            <img src="{{ asset('public/vendor/products/'. $item->product_image) }}" alt="" width="40" height="40">
                                        </div>

                                        <div>
                                            <P class="mb-0 product-title">{{ $item->product_name }}</P>
                                        </div>
                                      </a>
                                    </div>
                                  </td>

                                  <td>{{ $item->product_price }}</td>

                                  <td>{{ $item->quantity }}</td>

                                  <td>{{ $item->product_price }}</td>

                                </tr>
                                @endforeach

                                </tbody>

                              </table>

                            </div>

                        </div>

                      </div>

                   </div>

                   <div class="col-12 col-lg-4">

                     <div class="card border shadow-none bg-light radius-10">

                       <div class="card-body">

                           <div class="d-flex align-items-center mb-4">

                              <div>

                                 <h5 class="mb-0">Order Summary</h5>

                              </div>

                              <div class="ms-auto">

                                <button type="button" class="btn alert-success radius-30 px-4">Confirmed</button>

                             </div>

                           </div>

                             <div class="d-flex align-items-center mb-3">

                               <div>

                                 <p class="mb-0">Subtotal</p>

                               </div>

                               <div class="ms-auto">

                                 <h5 class="mb-0">$198.00</h5>

                             </div>

                           </div>

                           <div class="d-flex align-items-center mb-3">

                             <div>

                               <p class="mb-0">Shipping Price</p>

                             </div>

                             <div class="ms-auto">

                               <h5 class="mb-0">$0.00</h5>

                           </div>

                         </div>

                           <div class="d-flex align-items-center mb-3">

                             <div>

                               <p class="mb-0">Taxes</p>

                             </div>

                             <div class="ms-auto">

                               <h5 class="mb-0">$24.00</h5>

                           </div>

                         </div>

                         <div class="d-flex align-items-center mb-3">

                           <div>

                             <p class="mb-0">Payment Fee</p>

                           </div>

                           <div class="ms-auto">

                             <h5 class="mb-0">$14.00</h5>

                         </div>

                       </div>

                         <div class="d-flex align-items-center mb-3">

                           <div>

                             <p class="mb-0">Discount</p>

                           </div>

                           <div class="ms-auto">

                             <h5 class="mb-0 text-danger">-$36.00</h5>

                         </div>

                       </div>

                       </div>

                     </div>



                     <div class="card border shadow-none bg-warning radius-10">

                       <div class="card-body">

                           <h5>Payment info</h5>

                            <div class="d-flex align-items-center gap-3">

                               <div class="fs-1">

                                 <i class="bi bi-credit-card-2-back-fill"></i>

                               </div>

                               <div class="">

                                 <p class="mb-0 fs-6">Master Card **** **** 8956 </p>

                               </div>

                            </div>

                           <p>Business name: Template Market LLP <br>

                              Phone: +91-9910XXXXXX

                           </p>

                       </div>

                     </div>





                  </div>

               </div><!--end row-->



             </div>

           </div>



       </main>

       <!--end page main-->  

  </div>

  <!--end wrapper-->

@include('admin.include.footer')



</body>



</html>