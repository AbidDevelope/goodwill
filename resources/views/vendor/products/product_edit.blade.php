<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Product</title>
    @include('vendor.include.headerlink')
    <style type="text/css">
        .image{
        width: 88px;
        border: none;
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
                        <h2 class="content-title">Edit Product</h2>
                        <div>
                            <!-- <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                            <button class="btn btn-md rounded font-sm hover-up">Publich</button> -->
                        </div>
                    </div>
                    @if(Session::has('message'))
                     <div class="alert alert-success">
                       <span>{{ Session::get('message') }}</span>
                     </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                       <span class="text-danger">{{ Session::get('error') }}</span>
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
                            </ul>
                            <br>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="details-tab-pane" role="tabpanel"
                                    aria-labelledby="details-tab" tabindex="0">
                                <form action="{{ route('vendor/product/update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label for="vendor_type" class="form-label">Type</label>
                                        <select class="form-select" name="vendortype">
                                            <option> Vendor </option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file"
                                        class="form-control" name="image" onchange="readURL(this)">
                                    
                                        <img src="{{ asset('vendor/products/'. $product->image) }}" id="upload-img"  class="image"/>
                                    </div>
                                    <div class="mb-4">
                                        <label for="Name" class="form-label">Name</label>
                                        <input type="text" placeholder="Enter Name" 
                                        class="form-control @error ('name') is-invalid @enderror" value="{{ $product->name }}" name="name" id="name" >
                                        @error('name')
                                          <span class="text-danger">{{ $message  }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="Slug" class="form-label">Slug</label>
                                        <input type="text" placeholder="Enter Slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $product->slug }}" name="slug" id="slug">
                                        @error('slug')
                                         <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="small_description" class="form-label">Small_Description</label>
                                        <input type="text" class="form-control @error('small_description') is-invalid @enderror" name="small_description" value="{{ $product->small_description }}" id="small_description">
                                            @error('small_description')
                                              <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{ $product->description }}" name="description" id="description">
                                        @error('description')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="original_price" class="form-label">Original Price</label>
                                        <input type="text" class="form-control @error('original_price') is-invalid @enderror" name="original_price" value="{{ $product->original_price }}" id="original_price">
                                            @error('original_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="selling_price" class="form-label">Selling Price</label>
                                        <input type="text" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" value="{{ $product->selling_price }}"
                                            id="selling_price">
                                            @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{ $product->quantity }}"/>
                                            @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="input" name="meta_title" id="meta_title"
                                            class="form-control @error('meta_title') is-invalid @enderror" value="{{ $product->meta_title }}"/>
                                            @error('meta_title')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                        <textarea type="checkbox" name="meta_keyword" id="meta_keyword"
                                            class="form-control @error('meta_keyword') is-invalid @enderror">{{ $product->meta_keyword }}</textarea>
                                            @error('meta_keyword')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="mb-4"> 
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea type="checkbox" name="meta_description" id="meta_description"
                                            class="form-control @error('meta_description') is-invalid @enderror">{{ $product->meta_description }}</textarea>
                                            @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>

                                    </div>
                                    <div class="button" style="float:right;">
                                        <button class="btn btn-primary" type="submit"> Update</button>
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
                      console.log(response);
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