<!doctype html>
<html lang="en" class="minimal-theme">
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <meta charset="utf-8">
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
      <title>Admin Orders</title>
      @include('admin.include.header_link')
      <style type="text/css">
         @media only screen and (max-width: 600px) {
         .form-select {
         margin-left: 0px !important;
         width: 140px;
         }
         }
      </style>
   </head>
   <body>
      <div class="wrapper">
         @include('admin.include.header')   
         @include('admin.include.sidebar')
         <main class="page-content">
            <div class="card">
               <div class="card-header py-3">
                  <div class="row align-items-center m-0">
                     <div class="col-md-12 col-12 me-auto mb-md-0 mb-3">
                        <form action="{{ url('search_status') }}" method="get">
                        <table class="table table-hover">
                           <thead>
                              <tr>
                                 <th>Sr</th>
                                 <th>Customer name</th>
                                 <th>Payment Status</th>
                                 <th>Status</th>
                                 <th>Date</th>
                                 <th class="text-center"> Action </th>
                              </tr>
                           </thead>
                           <tbody>
                              @if(count($orders) > 0)
                              @foreach ($orders as $key => $item)
                              <tr>
                                 <td>{{$orders->firstItem() + $key}}</td>
                                 <td><b>{{ $item->user->name ?? ''}}</b></td>
                                 <td>{{ $item->payment_status  }}</td>
                                 <td>{{ $item->status }}</span></td>
                                 <td>{{ $item->created_at }}</td>
                                 
                                 <td class="text-center">
                                     <a href="{{ url('admin/order/details', $item->id) }}" class="btn btn-md btn-primary rounded-pill">Detail</a>
                                 </td>

                              </tr>
                              @endforeach
                              @else
                              <tr>
                                 <td colspan="7" class="text-center"><b>No Record Found</b></td>
                              </tr>
                              @endif
                           </tbody>
                        </table>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                        </div>
                        {{ $orders->links('pagination::bootstrap-4') }}
                     </div>
                  </div>
               </div>
            </div>
         </main>
      </div>
      @include('admin.include.footer')
   </body>
</html>