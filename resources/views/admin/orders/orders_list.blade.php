

<!doctype html>

<html lang="en" class="minimal-theme">

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

<title>goodwillonlinestores-orders</title>

@include('admin.include.header_link')





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

i.bi.bi-eye {
    font-size: 20px;
    color: green;
}

i.bi.bi-trash-fill {
    font-size: 17px;
}

</style>

</head>

<body>



  <div class="wrapper">

  @include('admin.include.header')

  @include('admin.include.sidebar')

  <!--start content-->

  <main class="page-content">

         

         <div class="row">

            <div class="col-12 col-lg-12 d-flex">

              <div class="card w-100">

                

             <div class="card-header py-3">

                <form  method="get" action="{{url('search_order') }}">

                 <div class="row g-3">



                   <div class="col-lg-3 col-md-5 me-auto">

                    

                     <div class="ms-auto position-relative">

                       <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>

                          <input class="form-control ps-5" type="text" name="order_id" placeholder="Order Id">

                       </div>

                     

                     </div> 

                     <div class="col-lg-8 col-6 col-md-3">

                     <button class="button" type="submit"><span>Search </span></button>

                   </div>

                      <div class="col-lg-1 col-6 col-md-3">

                     

                   </div> <div class="col-lg-1 col-6 col-md-3">

                     

                   </div>

                   

                 </div>

                 </form>

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
                        <td>{{ $item->area_or_street }},{{ $item->flat_no_building_name }},
                        {{ $item->land_mark }},<br>
                        {{ $item->mobile}}<br>
                        {{ $item->city }},{{ $item->state }}<br>
                        {{ $item->pincode }}
                        <td>{{ $item->created_at }}</td>
                      </td>
                         
                          <td>
                           
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                     <div>  {{ $orders->links('pagination::bootstrap-4') }}</div>

                  </div>

                  <nav class="float-end" aria-label="Page navigation">

                 
                 </nav>

                </div>

              </div>

            </div>

            <!-- <div class="col-12 col-lg-3 d-flex">

             <div class="card w-100">

               <div class="card-header py-3">

                 <h5 class="mb-0">Filter by</h5>

               </div>

               @if (session('status'))

                        <h6 class="alert alert-success">{{ session('status') }}</h6>

                 @endif

               <div class="card-body">

                

                 <form class="row g-3" action="{{url('insert_orders') }}"  method="post">

                 @csrf

                   <div class="col-12">

                    @if($errors->has('order_id'))

                        <span class="text-danger">{{ $errors->first('order_id') }}</span>

                     @endif

                     <label class="form-label">Order ID</label>

                     <input type="text" class="form-control" id="order_id" name="order_id" value="{{old('order_id')}}" placeholder="Order ID">

                   </div>

                   <div class="col-12">

                   @if($errors->has('customer_name'))

                        <span class="text-danger">{{ $errors->first('customer_name') }}</span>

                   @endif

                    <label class="form-label">Customer</label>

                    <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{old('customer_name')}}" placeholder="Customer name">

                  </div>

                  <div class="col-12">

                

                    <label class="form-label">Order Status</label>

                    <select class="form-select" id="orders_status" name="orders_status">

                      <option>Published</option>

                      <option>Active</option>

                      <option>Disabled</option>

                      <option>Pending</option>

                      <option>Draft</option>

                    </select> 

                  </div>

                  <div class="col-12">

                  @if($errors->has('total'))

                        <span class="text-danger">{{ $errors->first('total') }}</span>

                   @endif

                   <label class="form-label">Total</label>

                   <input type="text" name="total" id="total" value="{{old('total')}}" class="form-control">

                  </div>

                  <div class="col-12">

                  @if($errors->has('date'))

                        <span class="text-danger">{{ $errors->first('date') }}</span>

                   @endif

                   <label class="form-label">Date Added</label>

                   <input type="date" name="date" class="form-control">

                  </div>

                  <div class="col-12">

                  @if($errors->has('modifie_date'))

                        <span class="text-danger">{{ $errors->first('modifie_date') }}</span>

                   @endif

                   <label class="form-label">Date Modified</label>

                   <input type="date" name="modifie_date" id="modifie_date" class="form-control">

                  </div>

                  <div class="col-12">

                    <div class="d-grid">

                      <button type="submit" name="submit" class="btn btn-primary">Filter Product</button>

                    </div>

                  </div>

                 </form>

               </div>

             </div>

           </div> -->

         </div><!--end row-->



     </main>

         

       <!--end page main-->  

  </div>

  <!--end wrapper-->

@include('admin.include.footer')



</body>



</html>