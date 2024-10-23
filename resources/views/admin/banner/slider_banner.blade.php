<!doctype html>

<html lang="en" class="minimal-theme">

   <head>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>GWOS-Banner</title>

      

      @include('admin.include.header_link')

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>

   .btn-danger

   {

      background: none;

    color: red;

    border: none;

}

.btn:hover

{

   background:none;

   color:red;

}

.editbtn

{

   background: none;

    color: blue;

    border: none;

}

   </style>

   </head>

   <body>

      <!--start wrapper-->

      <div class="wrapper">

         @include('admin.include.header')

         @include('admin.include.sidebar')

         <!--start content-->

       <!--start content-->

        <main class="page-content">

            <!--breadcrumb-->

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

              <div class="breadcrumb-title pe-3"></div>

            

              <div class="ms-auto">

                <div class="btn-group">

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Banner</button>

                  

                  

                </div>

              </div>

            </div>

            <!--end breadcrumb-->

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

              <div class="card">

                <div class="card-header py-3">

                  <h6 class="mb-0">Add Banner</h6>

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

                                   <th><input class="form-check-input" type="checkbox"></th>

                                   <th>ID</th>

                                   <th>image</th>

                                   <th>Create</th>

                                   <th>Action</th>

                                 </tr>

                               </thead>

                               <tbody>

                               @foreach ($banner as $item)

                                 <tr>

                                 

                                   <td><input class="form-check-input" type="checkbox"></td>

                                   <td>{{ $item->id }}</td>

                                   <td>

                                        <div class="product-box">

                                           <img src="{{ asset('uploads/banner/' . $item->file) }}" alt="" width="50" height="50">

                                        </div>

                                    </td>

                                  

                                    <td>{{ $item->created_at }}</td>

                                   <td>

                                    <div class="d-flex align-items-center gap-3 fs-6">

                                      <a href="{{ url('edit_banner/'.$item->id) }}"><button type="button"  class="editbtn" style="border:none;background: none;font-size: 20px;color: #1e3050;"><i class="fas fa-edit"></i></button></a>


                                       <a href="{{ url('delete-banner/'.$item->id) }}" class="text-danger" data-bs-toggle="tooltip" onclick="confirmation(event)">
                                                <i class="bi bi-trash-fill"></i></a>


                                   </div>

                                   </td>

                                 </tr>

                                 <tr>

                                 @endforeach

                                </tbody>

                             </table>

                          </div>

                      

                        </div>

                      </div>

                    </div>

                   </div><!--end row-->

                </div>

              </div>



          </main>


      @include('admin.include.footer')

      <div class="modal fade" id="myModal" role="dialog">

            <div class="modal-dialog">

               <!-- Modal content-->

               <div class="modal-content">

                  <div class="modal-header">

                     <h4 class="modal-title">Add Banner</h4>

                  </div>

                  <!-- <h6 class="alert alert-success"></h6> -->

                  <div class="modal-body">

                  <form action="{{ url('add_slider_banner') }}" method="POST" enctype="multipart/form-data">

                     @csrf

                        <div class="row">

                           

                           <div class="col-sm-12">

                              <span class="text-danger"></span>

                              <label for="Categories"> Banner Image </label>

                            <input type="file" class="form-control" name="file"  >

                           </div>

                         <div class="modal-footer">

                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                              <button type="submit" class="btn btn-primary" id="butsave">Save</button>

                           </div>

                        </div>

                     </form>

                  </div>

               </div>

            </div>

        </div>





 <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you Sure to delete this Bannere ?",
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



