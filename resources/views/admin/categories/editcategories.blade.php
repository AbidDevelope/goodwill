

<!doctype html>

<html lang="en" class="minimal-theme">

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

<title>Add Categories</title>

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

                       <h5 class="mb-0">Edit Category</h5>

                      </div><br>

                     @if (session('status'))

                        <h6 class="alert alert-success">{{ session('status') }}</h6>

                    @endif 

                    <div class="card-body">

                      <div class="col-12">  

                       <form class="" action="{{ url('update_category/'.$categories->id) }}" method="POST"  enctype="multipart/form-data">



                        @csrf

                        @method('PUT')

                        @if($errors->has('name'))

                          <span class="text-danger">{{ $errors->first('name') }}</span>

                        @endif<br>

                          <label class="form-label">Add Category</label>

                       

                        <input type="text" class="form-control" name="name"   value="{{$categories->name}}" placeholder="Category Name">

                         </div><br>

                         <div class="col-12">
                          <label class="form-label"> Categories Images</label>
                          <input  type="file" class="form-control" name="category_image" >
                          <img src="{{ asset('uploads/categoryimage/' . $categories->category_image) }}"  alt="" width="70px" height="70px" alt="image" >

                         </div><br>

                         <div class="col-12">

                         <button type="submit" name="submit" class="btn btn-primary px-4">Update Category</button>

                        

                         </div>

                        </form>

                      </div>

                      </div>

                     </div>

                    </div>

                 </div>

              </div><!--end row-->



          </main>

         

       <!--end page main-->  

  </div>







  <!--end wrapper-->

@include('admin.include.footer')



</body>



</html>



