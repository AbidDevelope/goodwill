<!doctype html>
<html lang="en" class="minimal-theme">
   <head>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Vendor List</title>
      @include('admin.include.header_link')
      <style type="text/css">
         .text-warning
         {
         border:none;
         background: transparent;
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
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
               <div class="breadcrumb-title pe-3">Admin</div>
               <div class="ps-3">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor List</li>
                     </ol>
                  </nav>
               </div>
               <div class="ms-auto">
                  <div class="btn-group">
                     <a href="{{url('vendor_create')}}"><button type="button" class="btn btn-primary">Add Vendor
                     </button></a>
                  </div>
               </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
               <div class="card-header py-3">
                  <h6 class="mb-0">Vendor List</h6>
               </div>

              <div>
                     @if (session('delete'))
                     <script>
                        swal({
                            title: "Deleted!",
                            text: "{{ session('delete') }}",
                            icon: "success",
                            button: "OK",  
                        });
                     </script>
                     @endif
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
                  <div class="row">
                     <div class="col-12 col-lg-12 d-flex">
                        <div class="card border shadow-none w-100">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table align-middle">
                                    <thead class="table-light">
                                       <tr>
                                          <th>Vendor ID</th>
                                          <th>Image</th>
                                          <th>Vendor Name</th>
                                          <th>Email</th>
                                          <th>Contact Number</th>
                                          <th>Password</th>
                                          <th>Commission  </th>
                                          <th>Name of Firm/ Company</th>
                                          <th>Type of the Firm</th>
                                          <th>Status of Company</th>
                                          <th>Address</th>
                                          <th>Country</th>
                                          <th>State</th>
                                          <th>City</th>
                                          <th>Categorie</th>
                                          <th>Description</th>
                                          
                                          <th>Created_at</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($vendor as $item)
                                       <tr>
                                          <td>{{ $item->id }}</td>
                                          <td class="productlist">
                                             <a class="d-flex align-items-center gap-2" href="#">
                                                <div class="product-box">
                                                   <img src="{{ asset('uploads/admin_create_vendor/' . $item->file) }}" alt="">
                                                </div>
                                             </a>
                                          </td>
                                          <td>{{ $item->name }}</td>
                                          <td>{{ $item->email }}</td>
                                          <td>{{ $item->mobile }}</td>
                                          <td>{{ $item->password }}</td>
                                          <td style="text-align:center;">{{ $item->commission }} %</td>
                                          <td>{{ $item->name_of_firm_company }}</td>
                                          <td>{{ $item->type_of_the_firm }}</td>
                                          <td>{{ $item->status_of_company }}</td>
                                          <td>{{ $item->address }}</td>
                                          <td>{{ $item->country  }}</td>
                                          <td>{{ $item->state }}</td>
                                          <td>{{ $item->city }}</td>
                                          <td>{{ $item->categorie }}</td>
                                          <td>{{ $item->description }}</td>
                                       
                                          <td>{{ $item->created_at }}</td>
                                          <td>
                                             <div class="d-flex align-items-center gap-3 fs-6">
                                                 <a href="{{url('edit_vendor/'.$item->id)}}"><button type="button" class="text-warning"><i class="bi bi-pencil-fill"></i></button>

                                            
                                                <a href="{{ url('delete_vendor/'.$item->id) }}" class="text-danger" data-bs-toggle="tooltip" onclick="confirmation(event)">
                                                <i class="bi bi-trash-fill"></i></a>


                                             </div>
                                          </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                              {{ $vendor->links('pagination::bootstrap-4') }}
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--end row-->
               </div>
            </div>
         </main>
         <!--end page main-->
      </div>
      <!--end wrapper-->
      @include('admin.include.footer')


      <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you Sure to delete this Vendor?",
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