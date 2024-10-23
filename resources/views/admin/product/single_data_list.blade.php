
<!doctype html>
<html lang="en" class="minimal-theme">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>GWOS-Edit Product</title>
@include('admin.include.header_link')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<!--start wrapper-->
  <div class="wrapper">
  @include('admin.include.header')
  @include('admin.include.sidebar')
  <!--start content-->
  <main class="page-content">
            <div class="container-fluid" style="border:2px solid grey;">
              <div class="row">
                 
                    <div class="col-sm-12 col-md-5">
                      <img src="{{ asset('uploads/product/' . $product->file) }}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                      
                    </div>
                    <div class="col-sm-12 col-md-5">
                      <h3>{{ $product->product_title }}</h3>
                      <h4>{{ $product->price }}</h4>
                      <h4>{{ $product->category }}</h4>
                      <h4>{{ $product->subcategory }}</h4>
                      <h4>{{$product->created_at}}</h4>
                      <h4 style="justify-content: center;">{{ $product->description }}</h6>
                    </div>
                    <div class="col-sm-12 col-md-2">
                       <a href="{{url('product_list')}}"> <button type="button" class="btn btn-primary" style="margin-top: 10%;padding: 6px 35px;margin-block-end: 5%;background-color: #0d6efd;">Back</button></a>
                    </div>
                    
                  
                    
                 </div>
               </div>
              

</main>
         
       <!--end page main-->  
  </div>
  <!--end wrapper-->
@include('admin.include.footer')


 
</body>

</html>