<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Headerlink Include --}}
    @include('vendor.include.headerlink')
    {{-- @include('vendor.include.headerlink') --}}
    {{-- Headerlink Include --}}
    <style>
        .image
        {
            width: 80px;
            border: none;
        }
    </style>
</head>

<body>

    <div class="screen-overlay"></div>
    {{-- Sidebar include --}}
    @include('vendor.include.sidebar')
    {{-- Sidebar include --}}

    <main class="main-wrap">
        {{-- Header Include --}}
        @include('vendor.include.header')
        {{-- Header Unclude --}}

        {{-- Add Catogory start --}}
        <section class="content-main">
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">Categories </h2>
                    <p>Add, edit or delete a category</p>
                </div>
                <div>
                    <input type="text" placeholder="Search Categories" class="form-control bg-white"><br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddCategory">Add
                        Categories</button>
                </div>
            </div>
            @if($errors->any())
            
                @foreach($errors->all() as $error)
                <div class="alert alert-warning">
                    <span>{{ $error }} </span>
                </div>
                @endforeach
        
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success">
                <span>{{ Session::get('success') }}</span>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover data-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" value="" />
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Categories</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" value="" />
                                                </div>
                                            </td>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/categoryimage/'.$item->category_image) }}" alt="" class="image">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                            <button type="button" class="text-warning editbtn"
                                                        value="{{ $item->id }}" data-bs-toggle="tooltip" title=""
                                                        data-bs-original-title="Edit info" aria-label="Edit"
                                                        data-toggle="modal" data-target="#editModal"><i
                                                            class="fas fa-edit"></i></button>
                                                    <a href="{{ route('category/delete', $item->id) }}" class="text-danger"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                        data-bs-original-title="Delete" aria-label="Delete"><i
                                                            class="fa-sharp fa-solid fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                              {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        </div> <!-- .col// -->
                    </div> <!-- .row // -->
                </div> <!-- card body .// -->
            </div> <!-- card .// -->
        </section> <!-- content-main end// -->
        {{-- Add Category end --}}

        {{-- Footer Includes --}}
        @include('vendor.include.footer')
        {{-- Footer Includes --}}


        <!--======  model popup =========-->
        <div class="modal fade" id="AddCategory" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Categories</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- <h6 class="alert alert-success"></h6> -->
                    <div class="modal-body">
                        <form action="{{ route('vendor/category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-sm-12">
                                    <span class="text-danger"></span>
                                    <label for="Categories">Add Categories </label>
                                    <input type="hidden" name="id" id="id" class="form-control">
                                    <input type="file" class="form-control" name="category_image" id="category_image">
                                    <input type="text" class="form-control mt-2" name="name"
                                        placeholder="Enter Your Category" required>
                                </div>

                                <div class="modal-footer mt-3">
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
                        <h4 class="modal-title">Edit Categories</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- <h6 class="alert alert-success"></h6> -->
                    <div class="modal-body">
                        <form action="{{ route('category-update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="text-danger"></span>
                                    <label for="Categories"> Edit Categories </label>
                                    <input type="hidden" id="category_id" name="id" class="form-control" value=""><br>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>


                                <div class="modal-footer mt-3">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="butsave">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var cat_id = $(this).val();
                var url = '{{ route("edit-category", [":id"]) }}';
                url = url.replace(':id', cat_id);
                
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: 'json',
                    success: function(response) {
                        $('#category_id').val(response.data.id);
                        $('#name').val(response.data.name);
                        $('#category_id').val(cat_id);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script> 
</body>
      

</html>