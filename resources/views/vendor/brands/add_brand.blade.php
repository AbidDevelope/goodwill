<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Brand</title>
    @include('vendor.include.headerlink')
    <style type="text/css">
        .image
        {
            width: 10%;
            border: none !important;
        }
    </style>
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
                    <h2 class="content-title card-title">Brand </h2>
                    <p>Add, edit or delete a Brand</p>
                </div>
                <div>
                    <input type="text" placeholder="Search Categories" class="form-control bg-white"><br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Brand</button>
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
                                            <th>Action</th>
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
                                            <td><b>{{ $list->brand }}</b></td>
                                            <td>{{ $list->created_at }}</td>
                                            
                                            <td  class="text-end">
                                             <div class="d-flex align-items-center gap-3 fs-6">
                                              
                                              <button type="button" value="{{ $list->id }}" class="text-warning editbtn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
                                               <a href="{{ route('brand/delete', $list->id) }}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="fa-sharp fa-solid fa-trash"></i></a>
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
                                {{ $brands->withQueryString()->links('pagination::bootstrap-5') }}
                            </div>
                        </div> <!-- .col// -->
                    </div> <!-- .row // -->
                </div> <!-- card body .// -->
            </div> <!-- card .// -->
        </section> <!-- content-main end// -->
    </main>
    `
    <!--======  model popup =========-->
    <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Add Brand</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- <h6 class="alert alert-success"></h6> -->
                  <div class="modal-body">
                     <form action="{{ route('addBrand') }}" method="POST">
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
         <!-- ======  edit popup ========-->
        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Edit Brand</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- <h6 class="alert alert-success"></h6> -->
                  <div class="modal-body">
                     <form action="{{ route('brand/update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                              <span class="text-danger"></span>
                              <label for="Categories">  Edit Brand </label>
                              <input type="hidden" class="form-control" value=""  name="id" id="category_id">

                              <input type="text" class="form-control mt-2" value="" id="brand" name="brand">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" id="butsave">Update</button>
                            </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
        </div>
        @include('vendor.include.footer')
    </main>
</body>
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

</html>