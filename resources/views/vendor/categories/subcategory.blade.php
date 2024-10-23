<!DOCTYPE html>
<html lang="en">
<head>
 {{-- Headerlink Include --}}
  @include('vendor.include.headerlink')
  {{-- @include('vendor.include.headerlink') --}}
 {{-- Headerlink Include --}}
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

      {{-- Sub Catogory start --}}
      <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Sub-Categories </h2>
                <p>Add, edit or delete a Sub-category</p>
            </div>
            <div>
                <input type="text" placeholder="Search Categories" class="form-control bg-white"><br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Sub-Categories</button>
            </div>
        </div>
        @if($errors->any())
          <div class="alert alert-warning">
             @foreach($errors->all() as $error)
              <span>{{ $error }}</span>
             @endforeach
          </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">
              <span>{{ Session::get('success') }}</span>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-3">
                        <form>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Name</label>
                                <input type="text" placeholder="Type here" class="form-control" id="product_name" />
                            </div>
                            <div class="mb-4">
                                <label for="product_slug" class="form-label">Slug</label>
                                <input type="text" placeholder="Type here" class="form-control" id="product_slug" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Parent</label>
                                <select class="form-select">
                                    <option>Clothes</option>
                                    <option>T-Shirts</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Description</label>
                                <textarea placeholder="Type here" class="form-control"></textarea>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">Create category</button>
                            </div>
                        </form>
                    </div> -->
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
                                        <th>Categories</th>
                                        <th>Sub-Categories</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $item)
                                       <tr>
                                        <td class="text-center">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                        </td>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->category->name}}</td>
                                            <td>{{$item->subcategory}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fs-6">
                                        
                                                    <button type="button" class="text-warning editbtn" value="{{ $item->id }}" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit info" aria-label="Edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
                                                    <a href="{{ route('delete', $item->id) }}" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="fa-sharp fa-solid fa-trash"></i></a>
                                                </div> 
                                            </td>
                                       </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                           {!! $subcategories->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div> <!-- .col// -->
                </div> <!-- .row // -->
            </div> <!-- card body .// -->
        </div> <!-- card .// -->
    </section> <!-- content-main end// -->
      {{-- Sub Category end --}}

    {{-- Footer Includes --}}
    @include('vendor.include.footer')
    {{-- Footer Includes --}}

     <!--======  model popup =========-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
       <!-- Modal content-->
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="modal-title">Add Sub-Categories</h4>
             <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- <h6 class="alert alert-success"></h6> -->
          <div class="modal-body">
             <form action="{{ route('vendor/subcategory') }}" method="POST">
                @csrf
                <div class="row">
                   
                   <div class="col-sm-12">
                      <span class="text-danger"></span>
                      <label for="Categories"> Categories </label>
                     <select class="form-select" name="category_id">
                        <option value="">--Choose Category--</option>
                     @foreach ($categories as $item)
                         <option value="{{ $item->id }}">{{ $item->name }}</option>
                     @endforeach
                      </select>
                   </div>
                   <div class="col-sm-12">
                      <span class="text-danger"></span>
                      <label for="Categories">Add Sub-Categories </label>
                     <input type="text" class="form-control" id="sub_category"  name="subcategory">
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
             <h4 class="modal-title">Edit Sub-Categories</h4>
             <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- <h6 class="alert alert-success"></h6> -->
          <div class="modal-body">
             <form action="{{ route('subcategory-update') }}" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                      <span class="text-danger"></span>
                      <!-- <label for="Categories"> Categories </label>
                      <select class="form-select" name="category_id">
                    
                     @foreach ($categories as $item)
                         <option value="{{ $item->id }})">{{ $item->category }}</option>
                     @endforeach
                      </select> -->
                   </div>
                    <div class="col-sm-12">
                      <span class="text-danger"></span>
                      <label for="Sub_Categories">  Edit Sub-Categories </label>
                      <input type="hidden" id="subcategory_id" name="id" class="form-control" value=""><br>
                     <input type="text" class="form-control" id="subcategories" name="subcategory" value="">
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
    
</main>
<script>
    $(document).ready(function(){
        $(document).on('click', '.editbtn', function(){
            var sub_id = $(this).val();
            var url = '{{ route("subcategory-edit", [":id"]) }}';
            url = url.replace(':id', sub_id);
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response){
                    //console.log(response);
                    $('#subcategory_id').val(response.data.id);
                    $('#subcategories').val(response.data.subcategory);
                    $('#subcategories_id').val(sub_id);
                }
            });
        });
    });
</script>
</body>
</html>

   

