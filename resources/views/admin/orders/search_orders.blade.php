

<!doctype html>

<html lang="en" class="minimal-theme">

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

<title>goodwillonlinestores-orders</title>

@include('admin.include.header_link')



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<style>

#customers {

  font-family: Arial, Helvetica, sans-serif;

  border-collapse: collapse;

  width: 100%;

}



#customers td, #customers th {

  border: 1px solid #ddd;

  padding: 8px;

}



#customers tr:nth-child(even){background-color: #f2f2f2;}



#customers tr:hover {background-color: #ddd;}



#customers th {

  padding-top: px;

  padding-bottom: 12px;

  text-align: center;

  background-color: #808080;

  color: white;

}

#customers td {

  padding-top: 20px;

  padding-bottom: 12px;

  text-align: center;

  font-size:20px;

 



}

.button {

  border-radius: 4px;

  background-color:transparent;

  border:2px solid #eee;

  color: #000;

  text-align: center;

/*  font-size: 28px;*/

  padding:6px;

  width: 100px;

  transition: all 0.5s;

  cursor: pointer;

 

}



.button span {

  cursor: pointer;

  display: inline-block;

  position: relative;

  transition: 0.5s;

}



.button span:after {

/*  content: '\00bb';*/

  position: absolute;

  opacity: 0;

  top: 0;

  right: -20px;

  transition: 0.5s;

}



.button:hover span {

  padding-right: 25px;

}



.button:hover span:after {

  opacity: 1;

  right: 0;

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

            <div class="col-12 col-lg-12 d-flex">

              <div class="card w-100">

                

             <div class="card-header py-3">

                

                 <div class="row g-3">



                   <div class="col-lg-3 col-md-5 me-auto">

                    

                     <div class="ms-auto position-relative">

                     

                          

                       </div>

                     

                     </div> 

                     <div class="col-lg-8 col-6 col-md-3">

                   

                   </div>

                      <div class="col-lg-1 col-6 col-md-3">

                     

                   </div> <div class="col-lg-1 col-6 col-md-3">

                     

                   </div>

                   

                 </div>

               

                </div> 



                <div class="card-body">

                @if (session('delete'))

                        <h6 class="alert alert-danger">{{ session('delete') }}</h6>

                         @endif

                  <div class="table-responsive">

                     <table class="table align-middle">
                      <thead class="table-light">
                        <tr>
                        
                          <th>OrderId</th>
                          <th>Customer name</th>
                          <th>Total</th>
                          <th>Payment Status</th>
                          <th>Payment Mode</th>
                          <th>Order Address</th>
                          <th>Order Date</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($orders as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->grand_total }}</td>
                        <td>{{ $item->payment_status }}</td>
                        <td>{{ $item->payment_mode }}</td>
                        <td>{{ $item->area_or_street }},<br>{{ $item->flat_no_building_name }},
                        <br>{{ $item->land_mark }},<br>
                        {{ $item->mobile }}<br>
                        {{ $item->city }},{{ $item->state }}<br>
                        ,{{ $item->pincode }},
                        <td>{{ $item->created_at }}</td>
                      </td>
                         
                          <td>
                           
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                

                </div>

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