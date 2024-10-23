<!doctype html>
<html lang="en" class="minimal-theme">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GWOS-Edit Product</title>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      @include('admin.include.header_link')
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <style>
         .image
         {
            width: 80px;
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
         <main class="page-content">
            <div class="row">
               <div class="col-lg-10 mx-auto">
                  <div class="card">
                     <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Edit Product</h5>
                     </div>
                     <br>
                     @if (session('status'))
                     <h6 class="alert alert-success">{{ session('status') }}</h6>
                     @endif 
                     <div class="card-body">
                        <div class="border p-3 rounded">
                           <form action="{{ url('update_product/'.$product->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                       
                                        <div class="col-12">
                                            <label for="original_price" class="form-label">Original Price</label>
                                            <input type="text" class="form-control" value="{{ $product->original_price }}" name="original_price"
                                                id="original_price" >
                                        </div>
                                        <div class="col-12">
                                            <label for="selling_price" class="form-label">SellingPrice</label>
                                            <input type="text" class="form-control" value="{{ $product->selling_price }}" name="selling_price"
                                                id="selling_price" >
                                        </div>
                                        <div class="col-12">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" value="{{ $product->quantity }}" name="quantity" id="quantity"
                                             >
                                        </div>
                                       
                                      
                                        </div>
                                      
                                        <div class="row">
                                            <button class="btn btn-primary" type="submit"> Update</button>
                                        </div>
                                    </form>
                        </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
   $.ajaxSetup({
   
   headers: {
   
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   
   }
   
   });
   
   
   
   $(document).ready(function(){
   
   
   
   $("#category").change(function(){
   
   
   
   var category_id   =$(this).val();
   
   
   
   $.ajax({
   
   url:'{{url("/fetchScubcat/")}}/'+category_id,
   
   
   
    type:'post',
   
    datatype:'json',
   
    success:function(response){
   
   //  console.log(response);
   
     if(response['subcategory'].length>0){
   
     $.each(response['subcategory'],function(key,value){
   
        $("#subcategory").append("<option id='"+value['id']+"'>"+value['name']+"</option>")
   
       });
   }
   
   }
   
   });
   
   console.log(category_id);
   
   });
   
   });
     
</script>