<!doctype html>
<html lang="en" class="minimal-theme">
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <meta charset="utf-8">
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
      <title>Admin Orders</title>
      @include('admin.include.header_link')
      <style type="text/css">
         @media only screen and (max-width: 600px) {
         .form-select {
         margin-left: 0px !important;
         width: 140px;
         }
         }
      </style>
   </head>
   <body>
      <div class="wrapper">
         @include('admin.include.header')   
         @include('admin.include.sidebar')
         <main class="page-content">
            <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                            <span>
                                <i class="fa-solid fa-calendar-days"></i> <b>Wed, {{ $order->created_at }}</b>
                            </span> <br>
                            <small class="text-muted">Order ID: 0{{ $order->id }}</small>
                        </div>
             <div class="card-body">
                    <div class="row mb-50 mt-20 order-info-wrap">
                        <div class="col-md-4">
                            <article class="icontext align-items-start">
                                <span class="icon icon-sm rounded-circle bg-primary-light">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <div class="text">
                                    <h6 class="mb-1">Customer</h6>
                                    <p class="mb-1">
                                    {{ $order->user->name }}<br> <a href="#" class="__cf_email__"
                                            data- ="76171a130e36130e171b061a135815191b">{{ $order->user->email }}</a>
                                        <br> {{ $order->user->mobile }}
                                    </p>
                                    <a href="{{ route('user_profile', $order->id) }}">View profile</a>
                                </div>
                            </article>
                        </div> <!-- col// -->
                        <div class="col-md-4">
                            <article class="icontext align-items-start">
                                <span class="icon icon-sm rounded-circle bg-primary-light">
                                    <i class="fa-solid fa-truck"></i>
                                </span>
                                <div class="text">
                                    <h6 class="mb-1">Order info</h6>
                                    <p class="mb-1">
                                        Shipping: Fargo express <br> Pay method: {{ $order->payment_mode }}<br> Status: new
                                    </p>
                                    <!-- <a href="{{ route('order_information', $order->id) }}">Download info</a> -->
                                </div>
                            </article>
                        </div> <!-- col// -->
                        <div class="col-md-4">
                            <article class="icontext align-items-start">
                                <span class="icon icon-sm rounded-circle bg-primary-light">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <div class="text">
                                    <h6 class="mb-1">Deliver to</h6>
                                    <p class="mb-1">
                                        Address: {{ $addressId->flat_no_building_name }} , {{ $addressId->area_or_street }} , {{ $addressId->city }} , 
                                                 {{ $addressId->city }} , {{ $addressId->pincode }} , {{ $addressId->state }}
                                    </p>
                                </div>
                            </article>
                        </div> <!-- col// -->
                    </div> <!-- row // -->
                    <div class="row">
                        <div class="col-lg-12">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                <span>{{ Session::get('message') }}</span>
                            </div>
                            @endif
                            <div class="table-responsive">
                            
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Sr</td>
                                                <td>Image</td>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Tracking Status</th>
                                                <th class="text-center">Tracking Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($orderItem) > 0)
                                            @foreach ($orderItem as $key => $item)
                                            <tr>
                                               
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <a class="itemside" href="#">
                                                        <div class="left">
                                                            <img src="{{ asset('upload/products/'. $item->product->image) }}" width="40" height="40"
                                                                class="img-xs" alt="Item">
                                                        </div>
                                                    </a>
                                                </td>
                                                <td> {{ $item->product->name }}</td>
                                                <td> {{ $item->product->selling_price }} </td>
                                                <td> {{ $item->quantity }} </td>
                                                <td> {{ $item->price }}</td>
                                                <td> {{ $item->tracking_status }}</td>
                                                <td colspan="8" class="text-center">
                   
                                                    @if($item->tracking_status == 'ordered')
                                                        <a class="btn btn-success active not-allowed" value="confirmed order">Ordered&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a href="{{ url('admin/order/tracking', $item->id) }}" value="packed" name="[packed. tracking_status]" class="btn btn-outline-success">Packed</a>
                                                        <a href="{{ url('admin/product_dispatched', $item->id) }}" value="shipped" name="[shipped. tracking_status]" class="btn btn-outline-success">Shipped</a>
                                                    @endif

                                                    @if($item->tracking_status == 'packed')
                                                        <a class="btn btn-success active not-allowed">Ordered&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a name="status" class="btn btn-success active not-allowed" value="product dispatched">Packed&nbsp;<i class="fa fa-check"></i></a>
                                                        <a href="{{ url('shipped-status', $item->id) }}" value="shipped" name="shipped" class="btn btn-outline-success">Shipped</a>
                                                        @elseif(!$item->tracking_status == 'packed' && $item->tracking_status == 'delivered')
                                                        <a class="btn btn-outline-success">Packed</a>
                                                    @endif
                                                    
                                                    @if($item->tracking_status == 'shipped')
                                                    <a class="btn btn-success active not-allowed" value="confirmed order">Ordered&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                                                    <a class="btn btn-success active not-allowed">Packed&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                                                    <a class="btn btn-outline-success active not-allowed">Shipped&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>   
                                                    @endif

                                                    @if($item->tracking_status == 'delivered')
                                                        <a class="btn btn-success active not-allowed">Ordered&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a class="btn btn-success active not-allowed">Packed&nbsp;<i class="fa fa-check"></i></a>
                                                        <a class="btn btn-success active not-allowed">Shipped&nbsp;<i class="fa fa-check"></i></a>
                                                        <a class="btn btn-outline-success active not-allowed">Delivered&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                                                    @else
                                                    <a href="{{ url('admin/product_delivered', $item->id) }}" value="delivered" name="[delivered. tracking_status]" class="btn btn-outline-success">Delivered</a>
                                                    @endif
                                                   
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="5" class="text-center"><b>No record Found</b></td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td colspan="9">
                                                    <article class="float-end">
                                                        <dl class="dlist">
                                                            <dt>Subtotal:</dt>
                                                            <dd>&#x20B9; {{ $order->subtotal }}</dd>
                                                        </dl>
                                                
                                                        <dl class="dlist">
                                                            <dt>Shipping cost:</dt>
                                                            <dd>&#x20B9; {{ $order->shipping_charges }}</dd>
                                                        </dl>
                                                        <dl class="dlist">
                                                            <dt>Grand total:</dt>
                                                            <dd> <b class="h5">&#x20B9; {{ $order->grand_total }}</b> </dd>
                                                        </dl>
                                                        <dl class="dlist">
                                                            <dt class="text-muted">Status:</dt>
                                                            <dd>
                                                                <span
                                                                    class="badge rounded-pill alert-success text-success">Payment
                                                                    done
                                                                </span>
                                                            </dd>
                                                        </dl>
                                                    </article>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                        
                            </div> <!-- table-responsive// -->
                            <!-- <a class="btn btn-primary" href="{{ route('order/tracking', $order->id) }}">View Order Tracking</a> -->
                        </div> <!-- col// -->
                        <div class="col-lg-1"></div>
                        {{-- <div class="col-lg-4">
                            <div class="box shadow-sm bg-light">
                                <h6 class="mb-15">Payment info</h6>
                                <p>
                                    <img src="assets/imgs/card-brands/2.png" class="border" height="20"> Master Card
                                    **** **** 4768 <br>
                                    Business name: Grand Market LLC <br>
                                    Phone: +1 (800) 555-154-52
                                </p>
                            </div>
                            <div class="h-25 pt-4">
                                <div class="mb-3">
                                    <label>Notes</label>
                                    <textarea class="form-control" name="notes" id="notes"
                                        placeholder="Type some note"></textarea>
                                </div>
                                <button class="btn btn-primary">Save note</button>
                            </div>
                        </div> <!-- col// --> --}}
                    </div>
                </div> <!-- card-body end// -->


         </main>
      </div>
      @include('admin.include.footer')
   </body>
</html>