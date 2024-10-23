<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product List</title>
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
                    <h2 class="content-title card-title">Product List </h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
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
                                        <th>ID</th>
                                        <th>Vendor Type</th>
                                        <th>Vendor ID</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Old Price</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Craete Date</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($product) > 0)
                                        @foreach($product as $list)
                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->vendortype }}</td>
                                            <td>{{ $list->vendor_id }}</td>
                                            <td>
                                                <a class="itemside" href="#">
                                                    <div class="left">
                                                        <img src="{{ asset('upload/products/'. $list->image) }}" width="40" height="40"
                                                            class="img-xs" alt="Item">
                                                    </div>
                                                </a>
                                            </td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->selling_price }}</td>
                                            <td>{{ $list->original_price }}</td>
                                            <td>{{ $list->category->name ?? '' }}</td>
                                            <td>{{ $list->subcategory }}</td>
                                            <td>{{ $list->description }}</td>
                                            <td>{{ $list->status }}</td>
                                            <td><span>{{ $list->created_at }}</span></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fs-6">
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                    <a href="{{ route('vendor/product/view', $list->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views" ><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('vendor/product/edit', $list->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('vendor/product/delete', $list->id) }}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete" onclick="return confirm('Are you sure you want to delete this item?');" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                      @else
                                        <tr>
                                            <td colspan="6" class="text-center"><b>No Record Found</b></td>
                                        </tr>
                                      @endif
                                    </tbody>
                                </table>
                                {{ $product->withQueryString()->links('pagination::bootstrap-5') }}
                            </div> <!-- table-responsive //end -->
                        </div> <!-- card-body end// -->
                    </div> <!-- card end// -->
                </div>
            </div>
        </section> <!-- content-main end// -->
        <!-- content-main end// -->
        @include('vendor.include.footer')
    </main>
</body>

</html>