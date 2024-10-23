<!doctype html>
<html lang="en" class="minimal-theme">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin-Dashboard</title>
@include('admin.include.header_link')
</head>
<body>
<!--start wrapper-->
  <div class="wrapper">
  @include('admin.include.header')
  @include('admin.include.sidebar')

      <!--start content-->
        <main class="page-content">
            <!--breadcrumb-->
            
            <!--end breadcrumb-->

              <div class="card">
                <div class="card-header py-3">
                  <h6 class="mb-0">Address List</h6>
                </div>
                <div class="card-body">
                   <div class="row">
                     @if (session('delete'))
                     <h6 class="alert alert-danger">{{ session('delete') }}</h6>
                     @endif
          
                     <div class="col-12 col-lg-12 d-flex">
                      <div class="card border shadow-none w-100">
                        <div class="card-body">
                          <div class="table-responsive">
                             <table id="dtBasicExample" class="table align-middle">
                               <thead class="table-light">
                                 <tr>
                                 
                                   <th>ID</th>
                                   <th>User ID</th>
                                   <th>City</th>
                                   <th>Locality Area Or Street</th>
                                   <th>Flat & Building No </th>
                                   <th>Pin Code </th>
                                   <th>state</th>
                                   <th>Landmark</th>
                                   <th>Name</th>
                                   <th>Mobile No</th>
                                   <th>Mobile No(Optional)</th>
                                   <th>Create date</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>
                               <tbody>
                               @foreach ($address as $item)
                          
                                 <tr>
                                 
                                   <td>{{ $item->id }}</td>
                                   <td>{{ $item->user_id }}</td>
                                   <td>{{ $item->city }}</td>
                                   <td>{{ $item->area_or_street }}</td>
                                   <td>{{ $item->flat_no_building_name }}</td>
                                   <td>{{ $item->pincode }}</td>
                                   <td>{{ $item->state }}</td>
                                   <td>{{ $item->land_mark }}</td>
                                   <td>{{ $item->name }}</td>
                                   <td>{{ $item->mobile }}</td>
                                   <td>{{ $item->optional_mobile }}</td>
                                   <td>{{ $item->created_at }}</td>
                                   

                                   <td>
                                   <!--  <div class="d-flex align-items-center gap-3 fs-6">
                                      <a href="{{ url('delete_addres/'.$item->id) }}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="bi bi-trash-fill"></i></a>
                                    </div> -->
                                   </td>
                                 </tr>
                                 @endforeach
                               
                    
                               </tbody>
                             </table>
                             {{ $address->links('pagination::bootstrap-4') }}
                          </div>
                        <!--   <nav class="float-end mt-0" aria-label="Page navigation">
                            <ul class="pagination">
                              <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item active"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                          </nav> -->
                        </div>
                      </div>
                    </div>
                   </div><!--end row-->
                </div>
              </div>

          </main>
       <!--end page main-->

   

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

      

  </div>
  <!--end wrapper-->
@include('admin.include.footer')



 
</body>

</html>