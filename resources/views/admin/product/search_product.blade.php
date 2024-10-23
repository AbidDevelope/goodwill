<!doctype html>
<html lang="en" class="minimal-theme">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Product List</title>
      
      @include('admin.include.header_link')
      
   </head>
   <body>
    
      <div class="wrapper">
         @include('admin.include.header')
         @include('admin.include.sidebar')
         
         <main class="page-content">
         <div class="col-sm-12 col-md-12" style="display: flex; justify-content: end; padding-bottom: 12px;">

         <a href="{{url('product_list')}}"> <button type="button" class="btn btn-primary" style="background-color: #0d6efd;">Back</button></a>

</div>

      
         
            <div class="card">
               
               @if (session('status'))
               <h6 class="alert alert-success">{{ session('status') }}</h6>
               @endif 
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table align-middle table-striped">
                        <tr>
                            <th>ID</th>
                           <th>Product Name</th>
                           <th>Image</th>
                           <th>Price</th>
                           <th>Old Price</th>
                           <th>Quantity</th>
                           <th>Category</th>
                           <th>Subcategory</th>
                           <th>Slug</th>
                           <th>Brand</th>
                           <th>Small Description</th>
                           <th>Vendor Type</th>
                           <th>Vendor ID</th>
                           <th>Status</th>
                         
                           <th>Meta_title</th>
                           <th>Meta_keyword</th>
                           <th>Meta_description</th>
                            <th>Color Name</th>
                           <th>Feature Name</th>
                           <th>Other Details</th>
                           <th>Product_details</th>
                           <th>Craete Date</th>
                           <th>Action</th>
                        </tr>
                        <tbody>
                           @foreach ($products as $item)
                           <tr>
                               <td><span> {{ $item->id }}</span></td>
                              <td><span> {{ $item->name }}</span></td>
                              <td class="productlist">
                                 <div class="product-box">
                                    <img src="{{ asset('upload/products/'. $item->image) }}"  alt="" >
                                 </div>
                              </td>
                              <td><span>{{ $item->selling_price }}</span></td>
                              <td><span>{{ $item->original_price }}</span></td>
                              <td><span>{{ $item->quantity }}</span></td>
                             
                              <td>{{ $item->category->name ?? '' }}</td>
                              <td><span>{{ $item->subcategory }}</span></td>
                              <td><span>{{ $item->slug }}</span></td>
                              <td><span>{{ $item->brand }}</span></td>
                              <td><span>{{ $item->small_description }}</span></td>
                              <td><span>{{ $item->vendortype }}</span></td>
                              <td><span>{{ $item->vendor_id }}</span></td>
                            
                              <td>
                                   <a href="{{ url('act_product/'.$item->id) }}  " class="btn btn-sm btn-{{ $item->status ? 'success':'danger'}}">
                                      {{ $item->status ? 'active':'inactive'}}
                                   </a>
                                </td>
                               
                              <td><span>{{ $item->meta_title }}</span></td>
                              <td><span>{{ $item->meta_keyword }}</span></td>
                              <td><span>{{ $item->meta_description }}</span></td>
                               <td><span>{{ $item->color }}</span></td>
                              <td><span>{{ $item->featurename}}</span></td>
                              <td><span>{{ $item->other_details }}</span></td>
                              <td><span>{{ $item->product_details }}</span></td>
                              <td><span>{{ $item->created_at }}</span></td>
                              <td>
                                 <div class="d-flex align-items-center gap-3 fs-6">
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                       <a href="{{ route('productView',$item->id) }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views" ><i class="bi bi-eye-fill"></i></a>
                                       <a href="{{ url('edit_product/'.$item->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                       
                                       <a href="{{ url('delete_product/'.$item->id) }}" class="text-danger" data-bs-toggle="tooltip" onclick="confirmation(event)">
                                       <i class="bi bi-trash-fill"></i></a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  
                    
                  </div>
                  {{ $products->links('pagination::bootstrap-4') }}
               </div>
            </div>
         </main>
         <!--end page main-->  
      </div>
      <!--end wrapper-->
      @include('admin.include.footer')
   </body>
</html>