

<!doctype html>

<html lang="en" class="minimal-theme">

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

<title>Add Product</title>

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

                       <h5 class="mb-0">Add SubCategory</h5>

                      </div><br>

                     @if (session('status'))

                        <h6 class="alert alert-success">{{ session('status') }}</h6>

                    @endif 

                    <div class="card-body">

                      <div class="col-12">

                        <form  class="" action="{{url('insert_subcategory') }}" method="post" enctype="multipart/form-data">

                        @csrf

                         <div class="col-12">

                           <label class="form-label">Category</label>

                            <select  id="category" name="category_id" class="form-control">

                                <option value="" >Select Category</option>

                                @if(!empty($category))

                                  @foreach ($category as $list)

                                    <option value="{{$list->id}}">{{$list->name}}</option>

                                  @endforeach

                                @endif

                            </select>

                        </div><br>



                        <label class="form-label">SubCategory</label>

                          @if($errors->has('subcategory'))

                          <span class="text-danger">{{ $errors->first('subcategory') }}</span>

                         @endif

                          <input type="text" class="form-control" name="subcategory"  value="{{old('subcategory')}}" value="" placeholder="Category Name"><br>

                           <label class="form-label">SubCategory Image</label>

                          <input type="file" class="form-control" name="subcategory_image" >

                         </div><br>

                         <div class="col-12">

                         <button type="submit" name="submit" class="btn btn-primary px-4">Add SubCategory</button>

                        

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



