
<!doctype html>
<html lang="en" class="minimal-theme">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <meta charset="utf-8">
<title>Add Brand</title>
<style type="text/css">
    .text-warning
    {
        border: none !important;
        background: none !important;
        color: #0d6efd !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@include('admin.include.header_link')
<meta name="csrf-token" content="{{ csrf_token() }}">
  
<body>

  <div class="wrapper">
  @include('admin.include.header')
  @include('admin.include.sidebar')
  <!--start content-->
  <main class="page-content">
    <section class="content-main">
            <div class="content-header">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    <h2 class="content-title card-title">Brand </h2>
                    <p>Add, edit or delete a Brand</p>
                </div>
                <div class="col-sm-12 col-md-6">
                    <input type="text" placeholder="Search Categories" class="form-control bg-white" style="width: 50%;float: right;">
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                    
                </div>
                <div class="col-sm-12 col-md-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right;margin-right: 40px;">Add Brand</button>
                </div>
                </div>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success">
                  <span>{{ Session::get('message') }}</span>
                </div>
            @endif
           
                @foreach ($errors->get('brand') as $error)
                    <div class="alert alert-warning">
                       <span class="help-block">{{ $error }} </span>
                    </div>
                @endforeach
     <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" value="" />
                                                </div>
                                            </th>
                                            
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Create Date</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($brands) > 0)
                                        @foreach ($brands as $list)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" value="" />
                                                </div>
                                            </td>
                                            
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->category->name ?? '' }}</td>
                                            <td>{{ $list->brand }}</td>
                                            <td>{{ $list->created_at }}</td>
                                            
                                            <td style="text-align:center;">
                                           
                                               <a href="{{ url('brand_delete', $list->id) }}" class="text-danger" onclick="confirmation(event)"><i class="fa-sharp fa-solid fa-trash"></i></a>
                                          
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
                                {{ $brands->withQueryString()->links('pagination::bootstrap-5') }}
                            </div>
                        </div> <!-- .col// -->
                    </div> <!-- .row // -->
                </div> <!-- card body .// -->
            </div> <!-- card .// -->
       <!-- content-main end// -->


  
       
     </section>
                   

   </main>
         
   </div>
    
@include('admin.include.footer')

<script>
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {
            var brand_id = $(this).val();
            var url = '{{ route("edit-brand", [":id"]) }}';
            url = url.replace(':id', brand_id);
            
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function(response) {
                    $('#brand').val(response.data.brand);
                    $('#category_id').val(brand_id);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

 <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you Sure to delete this Brand ?",
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

  <!--======  model popup =========-->
      <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Add Brand</h4>
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                  </div>
                  <!-- <h6 class="alert alert-success"></h6> -->
                  <div class="modal-body">
                     <form action="{{ url('addBrand') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <span class="text-danger"></span>
                                <label for="Categories">Category</label>
                                <select class="form-control" name="category" id="">
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>  
                                    @endforeach
                                </select>
                            </div>
                           <div class="col-sm-12 mt-2">
                              <span class="text-danger"></span>
                              <label for="name">Add Brand </label>
                             <input type="text" class="form-control @error('brand') is-invalid @enderror"  name="brand">
                           </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" id="butsave">Add</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
        </div>
         
             
</body>

</html>