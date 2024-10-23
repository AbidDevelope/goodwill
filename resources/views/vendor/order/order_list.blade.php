<!DOCTYPE HTML>
<html lang="en">

<meta charset="utf-8">
<title>Order List</title>
@include('vendor.include.headerlink')

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
                    <h2 class="content-title card-title">Order List </h2>
                    <!-- <p>Lorem ipsum dolor sit amet.</p> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="card mb-4">
                        <header class="card-header">
                            <div class="row gx-3">
                                <div class="col-lg-4 col-md-6 me-auto">
                                    <input type="text" placeholder="Search..." class="form-control">
                                </div>
                                <div class="col-lg-2 col-md-3 col-6">
                                    <select class="form-select">
                                        <option>Status</option>
                                        <option>Active</option>
                                        <option>Disabled</option>
                                        <option>Show all</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-3 col-6">
                                    <select class="form-select">
                                        <option>Show 20</option>
                                        <option>Show 30</option>
                                        <option>Show 40</option>
                                    </select>
                                </div>
                            </div>
                        </header> <!-- card-header end// -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr</th>
                                            <th>Customer name</th>
                                            <th>Payment Status</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <!-- <th class="text-center"> Tracking </th> -->
                                            <th class="text-center"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($orders) > 0)
                                        @foreach ($orders as $key => $item)
                                        <tr>
                                            <td>{{$orders->firstItem() + $key}}</td>
                                            <td><b>{{ $item->user->name ?? ''}}</b></td>
                                            <td>{{ $item->payment_status  }}</td>
                                            <td><span class="badge rounded-pill alert-success">{{ $item->status }}</span></td>
                                            <td>{{ $item->created_at }}</td>
                                            <!-- <td class="text-center"><a class="btn btn-md rounded font-sm" href="{{ route('order/tracking', $item->id) }}">Tracking</a></td> -->
                                            <td class="text-center">
                                                <a href="{{ route('vendor/order/details', $item->id) }}" class="btn btn-md rounded font-sm">Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7" class="text-center"><b>No Record Found</b></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {!! $orders->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div> <!-- table-responsive //end -->
                        </div> <!-- card-body end// -->
                    </div> <!-- card end// -->
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">Filter by</h5>
                            <form>
                                <div class="mb-4">
                                    <label for="order_id" class="form-label">Order ID</label>
                                    <input type="text" placeholder="Type here" class="form-control" id="order_id">
                                </div>
                                <div class="mb-4">
                                    <label for="order_customer" class="form-label">Customer</label>
                                    <input type="text" placeholder="Type here" class="form-control" id="order_customer">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Order Status</label>
                                    <select class="form-select">
                                        <option>Published</option>
                                        <option>Draft</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="order_total" class="form-label">Total</label>
                                    <input type="text" placeholder="Type here" class="form-control" id="order_total">
                                </div>
                                <div class="mb-4">
                                    <label for="order_created_date" class="form-label">Date Added</label>
                                    <input type="text" placeholder="Type here" class="form-control"
                                        id="order_created_date">
                                </div>
                                <div class="mb-4">
                                    <label for="order_modified_date" class="form-label">Date Modified</label>
                                    <input type="text" placeholder="Type here" class="form-control"
                                        id="order_modified_date">
                                </div>
                                <div class="mb-4">
                                    <label for="order_customer_1" class="form-label">Customer</label>
                                    <input type="text" placeholder="Type here" class="form-control"
                                        id="order_customer_1">
                                </div>
                            </form>
                        </div>
                    </div> <!-- card end// -->
                </div>
            </div>
        </section> <!-- content-main end// -->
        @include('vendor.include.footer')

    </main>

</body>

</html>