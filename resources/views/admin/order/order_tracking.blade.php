<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Order Tracking</title>

    @include('vendor.include.headerlink')
</head>

<body>
    <div class="screen-overlay"></div>
    <!-- ===== start sidebar =========-->

    @include('vendor.include.sidebar')

    <!-- ===== end sidebar =========-->


    <main class="main-wrap">
        <!-- ===== start  header =========-->
        @include('vendor.include.header')
        <!-- ===== end header =========-->
        <section class="content-main">
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">Order Tracking</h2>
                    <p>Details for Order ID: {{ $order->id }}</p>
                </div>
            </div>
            <div class="card">
                <header class="card-header">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                            <span>
                                <i class="material-icons md-calendar_today"></i> <b>{{ $order->created_at }}</b>
                            </span> <br>
                            <small class="text-muted">Order ID: {{ $order->id }}</small> <br>
                            <small class="text-muted">Your order has been {{ $orderItem->status }}</small>
                        </div>
                        <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                            <a class="btn btn-primary" href="#">Screenshot</a>
                            <a class="btn btn-secondary print ms-2" href="#"><i class="fa-solid fa-print"></i>Print</a>
                        </div>
                    </div>
                </header> <!-- card-header end// -->
                <div class="card-body">
                    <div class="order-tracking mb-100">
                        <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
                            
                            @if($orderItem->tracking_status == 'ordered')
                                <div class="step completed" id="confirmedOrder">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                    </div>
                                    <h4 class="step-title">Confirmed Order</h4>
                                    <small class="text-muted text-sm">15 March 2022</small> 
                                </div>
                                <div class="step" id="productDispatched">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Packed</h4>
                                    <small class="text-muted text-sm">18 March 2022</small> 
                                </div>
                                <div class="step" id="productDispatched">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-truck"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Shipped</h4>
                                     <small class="text-muted text-sm">18 March 2022</small> 
                                </div>
                                @elseif(!$orderItem->tracking_status == 'ordered' || $orderItem->tracking_status == 'delivered')
                                <div class="step completed" id="confirmedOrder">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                    </div>
                                    <h4 class="step-title">Confirmed Order</h4>
                                    <small class="text-muted text-sm">15 March 2022</small> 
                                </div>
                            @endif    

                            @if($orderItem->tracking_status == 'packed')
                                <div class="step completed" id="confirmedOrder">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                    </div>
                                    <h4 class="step-title">Confirmed Order</h4>
                                     <small class="text-muted text-sm">15 March 2022</small> 
                                </div>
                                <div class="step completed" id="productDispatched">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Packed</h4>
                                     <small class="text-muted text-sm">18 March 2022</small> 
                                </div>
                                <div class="step" id="productDispatched">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-truck"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Shipped</h4>
                                     <small class="text-muted text-sm">18 March 2022</small> 
                                </div>
                            @endif

                            @if($orderItem->tracking_status == 'shipped')
                                <div class="step completed" id="confirmedOrder">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                    </div>
                                    <h4 class="step-title">Confirmed Order</h4>
                                    <small class="text-muted text-sm">15 March 2022</small> 
                                </div>
                                <div class="step completed" id="productDispatched">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Packed</h4>
                                     <small class="text-muted text-sm">18 March 2022</small> 
                                </div>
                                <div class="step completed" id="productDispatched">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-truck"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Shipped</h4>
                                     <small class="text-muted text-sm">18 March 2022</small> 
                                </div>
                            @endif

                            @if(!$orderItem->tracking_status == 'packed' || $orderItem->tracking_status == 'delivered')
                                <div class="step completed" id="productDispatched">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Packed</h4>
                                     <small class="text-muted text-sm">18 March 2022</small> 
                                </div>
                                <div class="step completed" id="productDispatched">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-truck"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Shipped</h4>
                                     <small class="text-muted text-sm">18 March 2022</small> 
                                </div>
                                <div class="step completed" id="productDelivered">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-check"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Delivered</h4>
                                     <small class="text-muted text-sm">20 March 2022</small> 
                                </div>
                            @else
                                <div class="step" id="productDelivered">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa-solid fa-check"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Delivered</h4>
                                     <small class="text-muted text-sm">20 March 2022</small> 
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-50 mt-20 order-info-wrap text-center">
                        <div class="col-md-4">
                            <article class="icontext align-items-start">
                                <div class="text">
                                    <h6 class="mb-1">Customer</h6>
                                    <p class="mb-1">
                                        {{ $order->user->name }} <br> <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="2f4e434a576f4a574e425f434a014c4042">{{ $order->user->email }}</a>
                                        <br> {{ $order->user->mobile }}
                                    </p>
                                    <a href="{{ route('user_profile', $order->id) }}">View profile</a>
                                </div>
                            </article>
                        </div> <!-- col// -->
                        <div class="col-md-4">
                            <article class="icontext align-items-start">
                                <div class="text">
                                    <h6 class="mb-1">Order info</h6>
                                    <p class="mb-1">
                                        Shipping: Fargo express <br> Pay method: {{ $order->payment_mode }} <br> Status: new
                                    </p>
                                    <a href="{{ route('order_information', $order->id) }}">Download info</a>
                                </div>
                            </article>
                        </div> <!-- col// -->
                        <div class="col-md-4">
                            <article class="icontext align-items-start">
                                <div class="text">
                                    <h6 class="mb-1">Deliver to</h6>
                                    <p class="mb-1">
                                        
                                    </p>
                                </div>
                            </article>
                        </div> <!-- col// -->
                    </div> <!-- row // -->
                    <div class="row">
                        <div class="text-center mt-100 mb-50">
                            <a class="btn btn-primary" href="{{ route('vendor/order/details', $order->id) }}">View Order Details</a>
                        </div>
                    </div>
                </div> <!-- card end// -->
        </section> <!-- content-main end// -->
        @include('vendor.include.footer')
    </main>

</body>

</html>