<!doctype html>
<html lang="en" class="minimal-theme">
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GWOS-Add Product</title>
      @include('admin.include.header_link')
      <style type="text/css">
        ul.pagination {
    justify-content: end;
    margin-top: 15px;
}
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
            @if (Session::has('status'))
                <div class="alert alert-warning">
                   <span>{{ Session::get('status') }}</span>
                </div>
            @endif
            <div class="card">
               <div class="card-header py-3">
                 <div class="row align-items-center m-0">
                    <div class="col-md-4 col-12 me-auto mb-md-0 mb-3">

                 
                     <form action="{{ url('search_products') }}" method="get" style="display: flex; gap: 14px;">

                    <select name="name" class="form-select" style="">
                    <option>Select Category</option>

                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                    <?php } ?>
                  </select>
   
                  <button type="submit"  class="form-control" style="width:50%;padding:4px;border: 1px solid ">Search</button>
               </form>
                  </div>
                  <div class="col-md-6 col-12 me-auto mb-md-0 mb-3">
                  <form action="{{ url('search_status') }}" method="get">
                   <div class="col-md-5 col-6">
                        <select class="form-select" name="status" style="margin-left: 60%;">
                            <option value="1">active</option>
                            <option value="0">inactive</option>
                            
                        </select>
                    </div>
                     <button type="search"  class="form-control" style="width:30%;padding:4px;border: 1px solid;float: right;margin-top: -35px; ">Search</button>
                    
                    
                   
                 </form>
              </div>
                    
               </div>
               </div>
               <div>
                  @if (session('status'))
                  <script>
                     swal({
                         title: "Success!",
                         text: "{{ session('status') }}",
                         icon: "success",
                         button: "OK",  
                     });
                  </script>
                  @endif
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table align-middle table-striped">
                        <thead class="table-tr-w">
                        <tr>

                           <th>ID</th>
                           <th>Product Name</th>
                           <th>Product Id</th>
                           <th>Image</th>
                           <th>Price</th>
                           <th>Old Price</th>
                           <th>Quantity</th>
                           <th>Category</th>
                           <th>Subcategory</th>
                           <th>Brand</th>
                           <th>Small Description</th>
                           <th>Vendor Type</th>
                           <th>Vendor ID</th>
                           <th>Status</th>
                           <th>Color Name</th>
                           <th>SizeName</th>
                           <th>Product_details</th>
                           <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach ($products as $item)
                           <tr>
                              <td><span> {{ $item->id }}</span></td>
                              <td><span> {{ $item->product_name }}</span></td>
                            <td><span> {{ $item->prodid }}</span></td>
                              <td class="productlist">
                                 <div class="product-box">
                                    <img src="{{ asset('upload/products/'. $item->image) }}"  alt="" >
                                 </div>
                              </td>
                              <td><span>{{ $item->selling_price }}</span></td>
                              <td><span>{{ $item->original_price }}</span></td>
                              <td><span>{{ $item->quantity }}</span></td>
                              <td><span>{{ $item->category_name }}</span></td>
                              <td><span>{{ $item->subcategory }}</span></td>
                              <td><span>{{ $item->brand }}</span></td>
                              <td><span>{{ $item->small_description }}</span></td>
                              <td><span>{{ $item->vendortype }}</span></td>
                              <td><span>{{ $item->vendor_id }}</span></td>
                              <td>
                                <a href="{{ url('act_product/'.$item->prodid) }}  " class="btn btn-sm btn-{{ $item->status ? 'success':'danger'}}">
                                      {{ $item->status ? 'active':'inactive'}}
                                </a>
                             </td>
                                <td><span>{{ $item->colorName }}</span></td>
                                <td><span>{{ $item->sizeName }}</span></td>
                                <td><span>{{ $item->product_details }}</span></td>
                              <td>
                                 <div class="d-flex align-items-center gap-3 fs-6">
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                     
                                       <a href="{{ url('edit_product/'.$item->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>

                                      <a href="{{ url('delete_product/'.$item->id) }}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete">
                                         <i class="bi bi-trash-fill"></i>
                                       </a>
                                       
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                         <thead class="table-tr-w">
                        <tr>

                           <th>ID</th>
                           <th>Product Name</th>
                           <th>Product Id</th>
                           <th>Image</th>
                           <th>Price</th>
                           <th>Old Price</th>
                           <th>Quantity</th>
                           <th>Category</th>
                           <th>Subcategory</th>
                           <th>Brand</th>
                           <th>Small Description</th>
                           <th>Vendor Type</th>
                           <th>Vendor ID</th>
                           <th>Status</th>
                           <th>Color Name</th>
                           <th>SizeName</th>
                           <th>Product_details</th>
                           <th>Action</th>
                        </tr>
                        </thead>
                     </table>
                  </div>
                  {{ $products->links('pagination::bootstrap-4') }}
               </div>
            </div>
         </main>
      
      </div>
     
      @include('admin.include.footer')
      <script type="text/javascript">
         function confirmation(ev) {
             ev.preventDefault();
         
             var urlToRedirect = ev.currentTarget.getAttribute('href');
             console.log(urlToRedirect);
             swal({
                 title: "Are you Sure to delete this Product ?",
                 text: "You won't be able to revert this delete",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
                 .then((willDelete) => {
                     if (willDelete) {
                         window.location.href = urlToRedirect;
                     }
                 });
         }
      </script>
   </body>
</html>