<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Product</title>
    @include('vendor.include.headerlink')
    <style>
        .image
        {
            width: 80px;
            border:none;
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
        {{-- Header Include --}}
        @include('vendor.include.header')
        {{-- Header Unclude --}}
        <!-- ===== end header =========-->
        <section class="content-main">
            <div class="row">
                <div class="col-9">
                    <div class="content-header">
                        <h2 class="content-title">Add New Product</h2>
                        <div>
                            <!-- <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                            <button class="btn btn-md rounded font-sm hover-up">Publich</button> -->
                        </div>
                    </div>
                    @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Basic</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="details-tab" data-bs-toggle="tab"
                                        data-bs-target="#details-tab-pane" type="button" role="tab"
                                        aria-controls="details-tab-pane" aria-selected="true">
                                        Product Details
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                        data-bs-target="#image-tab-pane" type="button" role="tab"
                                        aria-controls="image-tab-pane" aria-selected="false">
                                        Upload Product Image
                                    </button>
                                </li>
                            </ul>
                            <br>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="details-tab-pane" role="tabpanel"
                                    aria-labelledby="details-tab" tabindex="0">
                                    <form action="{{ route('vendor/addproduct') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="vendor_type" class="form-label">Type</label>
                                            <select class="form-select" name="vendortype">
                                                <option> Vendor </option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" name="image" onchange="readURL(this)" required>
                                            <img id="upload-img" class="image">
                                        </div>
                                        <div class="mb-4">
                                            <label for="Name" class="form-label">Name</label>
                                            <input type="text" placeholder="Enter Name" class="form-control" name="name"
                                                id="name" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="Slug" class="form-label">Slug</label>
                                            <input type="text" placeholder="Enter Slug" class="form-control" name="slug"
                                                id="slug" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="Product Category" class="form-label">Product Category</label>
                                            <select class="form-select category" name="category" id="category">
                                                <option value="">--Select Category--</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="Product subcategory" class="form-label">Product
                                                Sub-Category</label>
                                            <select class="form-select" name="subcategory" id="subcategory">
                                                <option value="">---Select Sub-Category---</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="Brand" class="form-label">Brand</label>
                                            <select class="form-select" name="brand" id="brand">
                                                <option value="">---Select Brand---</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="small_description" class="form-label">Small_Description</label>
                                            <input type="text" class="form-control" name="small_description"
                                                id="small_description">
                                        </div>
                                        <div class="mb-4">
                                            <label for="description" class="form-label">Description</label>
                                            <input type="text" class="form-control" name="description" id="description">
                                        </div>
                                        <div class="mb-4">
                                            <label for="original_price" class="form-label">Original Price</label>
                                            <input type="text" class="form-control" name="original_price"
                                                id="original_price" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="selling_price" class="form-label">SellingPrice</label>
                                            <input type="text" class="form-control" name="selling_price"
                                                id="selling_price" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity"
                                                required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="meta_title" class="form-label">Meta Title</label>
                                            <input type="input" name="meta_title" id="meta_title"
                                                class="form-control" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                            <textarea type="checkbox" name="meta_keyword" id="meta_keyword"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <textarea type="checkbox" name="meta_description" id="meta_description"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="trending" class="form-label">Trending</label>
                                            <input class="form-check-input" name="trending" type="checkbox" style="margin-left: 20px">
                                        </div>
                                        <div class="mb-4">
                                            <label for="trending" class="form-label">Status</label>
                                            <input type="checkbox" name="status" class="form-check-input" style="margin-left: 20px"/>
                                        </div>
                                </div>

                                <div class="tab-pane fade" id="image-tab-pane" role="tabpanel"
                                    aria-labelledby="image-tab" tabindex="0">
                                    <div class="mb-4">
                                        <label for="images" class="form-label">Upload Product Image</label>
                                        <input type="file" class="form-control" name="images[]" multiple id="images"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn btn-primary" type="submit"> Submit</button>
                            </div>
                            </form>
                        </div>
                    </div> <!-- card end// -->
                </div>
            </div>
        </section>
        @include('vendor.include.footer')
    </main>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('#upload-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>
        $(document).ready(function(){
            $('.category').on('change', function(){
                var category_id = $(this).val();
                $('#brand').html('');
                $.ajax({
                    url: '{{ url("fetch_brand/") }}/' + category_id,
                    type: 'POST',
                    data: {
                        category_id: category_id,
                        _token: '{{ csrf_token() }}'
                    },
                    datatype: 'json',
                    success: function(response){
                        if(response['brand'].length > 0) {
                            $.each(response['brand'], function(key, value){
                                $('#brand').append("<option id='" + value['id'] + "'>"+ value['brand'] + "</option>")
                            });
                        }
                    }
                });
                console.log(category_id);
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryId = $(this).val();
                $('#subcategory').html('');
                $.ajax({
                    url: '{{url("fetch_Scubcategory/")}}/' + categoryId,
                    type: "POST",
                    data: {
                        category_id: categoryId,
                        _token: '{{ csrf_token() }}'
                    },
                    datatype: 'json',
                    success: function(response) {
                        // console.log(response);
                        if (response['subcategory'].length > 0) {

                            $.each(response['subcategory'], function(key, value) {

                                $("#subcategory").append("<option id='" + value['id'] +
                                    "'>" + value['subcategory'] + "</option>")

                            });
                        }
                    }
                });
                console.log(category_id);
            });
        });
    </script>
</body>

</html>