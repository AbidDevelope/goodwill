<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit </title>
	@include('admin.include.header_link')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
@include('admin.include.header')
  @include('admin.include.sidebar')
 <main class="page-content">
           

              <div class="row">
                 <div class="col-lg-10 mx-auto">
                  <div class="card">
                    <div class="card-header py-3 bg-transparent"> 
                       <h5 class="mb-0">Edit Banner</h5>
                       <a href="{{url('stick')}}"><button type="submit" name="submit" class="btn btn-primary px-4" style="float:right; margin-top: -3%;background: red;border: none;"><i class="fa fa-times" aria-hidden="true"></i></button></a>
                      </div><br>
                     
                        <!-- <h6 class="alert alert-success"></h6> -->
                     
                    <div class="card-body">
                      <div class="col-12">
                        <form class="" action="{{ url('update_stick/'.$stick->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                          <span class="text-danger"></span>
                        <br>
                          <label class="form-label">Stripe Image</label>
                       
                        <input class="form-control"  name="file" type="file">
                        <img src="{{ asset('uploads/stick/' . $stick->file) }}"  alt="" width="70px" height="70px" alt="image" ><br>
                        
                        <label class="form-label">Stripe Name</label>
                        <input type="text" class="form-control" name="name"  value="{{$stick->name}}"  >
                         </div>
                         <br>
                         <div class="col-12">
                         <button type="submit" name="submit" class="btn btn-primary px-4">Update</button>
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
  @include('admin.include.footer')
</body>
</html>