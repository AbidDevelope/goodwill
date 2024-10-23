

<!doctype html>

<html lang="en" class="minimal-theme">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <meta charset="utf-8">

<title>Show Category</title>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@include('admin.include.header_link')

<meta name="csrf-token" content="{{ csrf_token() }}">

   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>

<body>

<!--start wrapper-->

  <div class="wrapper">

  @include('admin.include.header')

  @include('admin.include.sidebar')

  <!--start content-->

  <main class="page-content">

           

              <div class="row">

                 <div class="col-lg-10 mx-auto">

                  <div class="card">

                    <div class="card-header py-3 bg-transparent"> 

                       <h5 class="mb-0">SubCategory</h5>

                       <a href="{{url('add_subcategory')}}"> <button type="button" class="btn btn-primary" style="float:right;margin-top:-30px;">Add SubCategories</button></a>

                      </div><br>

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

                      <div class="col-12">

                      <div class="table-responsive">

                     <table class="table align-middle table-striped">

                        <tr>

                           <th>ID</th>

                           <th>SUBCATEGORY</th>

                           <th>CATEGORY</th>

                           <th>Image</th>

                           <th>CREATE DATE</th>

                           <th>Action</th>

                        </tr>

                        <tbody>

                        @foreach ($subcategories as $subcategory)

                           <tr>

                              <td><span> {{ $subcategory->id }} </span></td>

                              <td><span> {{ $subcategory->subcategory}} </span></td>

                              <td><span> {{ $subcategory->name}} </span></td>

                                
                                   <td class="productlist">
                                       <div class="product-box">
                                          <img src="{{ asset('uploads/categoryimage/' . $subcategory->subcategory_image) }}" alt="" >
                                       </div>
                                    </td>

                              <td><span> {{ $subcategory->created_at }}</span></td>

                              <td>

                                 <div class="d-flex align-items-center gap-3 fs-6">

                                 <a href="{{ url('edit_subcategory/'.$subcategory->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>

                                    
                                     <a href="{{ url('detete_subcategory/'.$subcategory->id) }}" class="text-danger" data-bs-toggle="tooltip" onclick="confirmation(event)">
                                                <i class="bi bi-trash-fill"></i></a>

                                 </div>

                              </td> 

                           </tr>

                           @endforeach

                        </tbody>

                     </table>

                  </div>

                      </div>

                      </div>

                     </div>

                    </div>

                 </div>

              </div><!--end row-->



          </main>

         

       <!--end page main-->  

  </div>


@include('admin.include.footer')

 <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you Sure to delete this Category ?",
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



