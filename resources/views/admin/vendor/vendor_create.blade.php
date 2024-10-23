<!doctype html>
<html lang="en" class="minimal-theme">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vendor Create</title>
@include('admin.include.header_link')
<style type="text/css">
    .text-warning
    {
      border:none;
      background: transparent;
    }
  </style>
</head>
<body>
<!--start wrapper-->
  <div class="wrapper">
  @include('admin.include.header')
  @include('admin.include.sidebar')
<main class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
               <div class="breadcrumb-title pe-3">Admin</div>
               <div class="ps-3">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Vendor</li>
                     </ol>
                  </nav>
               </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
               <div class="col-xl-12 mx-auto">
                  <div class="card">
                     <div class="card-body">
                        <div class="border p-3 rounded">
                        
                           <h6 class="mb-0 text-uppercase">Create Vendor</h6>
                           <hr/>
                           <form class="row g-3" action="{{url('add_vendor')}}" method="post" enctype="multipart/form-data">
                           @csrf
                              <div class="col-6">
                                 <label class="form-label">Vendor Name</label>
                                 <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                 @if($errors->has('name'))
                                 <span class="text-danger">{{ $errors->first('name') }}</span>
                                 @endif
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Contact Number</label>
                                 <input type="text" class="form-control" name="mobile" value="{{old('mobile')}}">

                                 @if($errors->has('mobile'))
                                 <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                 @endif
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Email</label>
                                 <input type="email" class="form-control" name="email" value="{{old('email')}}">

                                 @if($errors->has('email'))
                                 <span class="text-danger">{{ $errors->first('email') }}</span>
                                 @endif
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Password</label>
                                 <input type="text" class="form-control" name="password" value="{{old('password')}}">
                                 @if($errors->has('password'))
                                 <span class="text-danger">{{ $errors->first('password') }}</span>
                                 @endif
                              </div>

                              <div class="col-6">
                                 <label class="form-label">Commission Percentage </label>
                                 <input type="number" class="form-control" name="commission" value="{{old('commission')}}">
                              </div>
                              
                              <div class="col-6">
                                 <label class="form-label">Name of Firm/ Company</label>
                                 <input type="text" class="form-control" name="name_of_firm_company" value="{{old('name_of_firm_company')}}">
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Type of the Firm </label>
                                 <select class="form-control" name="type_of_the_firm" >
                                 <option ></option>
                                    <option value="Public Limited Co">Public Limited Co</option>
                                    <option value="Partnership Co">Partnership Co</option>
                                    <option value="Proprietorship">Proprietorship</option>
                                    <option value="Govt. Sector">Govt. Sector</option>
                                    <option value="Others">Others</option>
                                 </select>
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Status of Company</label>
                                 <select class="form-control"  name="status_of_company" >
                                 <option ></option>
                                    <option value="MANUFACTURER">MANUFACTURER</option>
                                    <option value="AUTHORISED DEALER">AUTHORISED DEALER</option>
                                    <option value="STOCKIST/TRADER">STOCKIST/TRADER</option>
                                    <option value="IMPORTER/INDIAN AGENT">IMPORTER/INDIAN AGENT</option>
                                    <option value="SERVICE PROVIDER">SERVICE PROVIDER</option>
                                 </select>
                              </div>
                        
                              <div class="col-6">
                                 <label class="form-label">Address</label>
                                 <input type="text" class="form-control" name="address" value="{{old('address')}}">
                                 @if($errors->has('address'))
                                 <span class="text-danger">{{ $errors->first('address') }}</span>
                                 @endif
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Country</label>
                                 <select class="form-control" id="country" name="country">
                                 <option ></option>
                                    <option value="Australia">Australia</option>
                                    <option value="US">US</option>
                                    <option value="UK">UK</option>
                                    <option value="India">India</option>
                                    <option value="Dubai">Dubai</option>
                                 </select>
                              </div>
                              <div class="col-6">
                                 <label class="form-label">State</label>
                                 <input type="text" class="form-control" name="state"  value="{{old('state')}}">
                              </div>
                              <div class="col-6">
                                 <label class="form-label">City</label>
                                 <input type="text" class="form-control" name="city" value="{{old('city')}}">
                                 @if($errors->has('city'))
                                 <span class="text-danger">{{ $errors->first('city') }}</span>
                                 @endif
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Categorie</label>
                                 <select class="form-control" id="categorie" name="categorie" >
                                    <option ></option>
                                    <option value="Home Appliances">Home Appliances</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Medical Appliances">Medical Appliances</option>
                                    <option value="Food and Beverage">Food and Beverage</option>
                                 </select>
                              </div>
                              <div class="col-12">
                                 <label class="form-label">Choose File</label>
                                 <input type="file" class="form-control" name="file">
                              </div>
                              
                              <div class="col-12">
                                 <label class="form-label" for="description">Description of Business of your Company</label>
                                 <textarea class="form-control" id="description" name="description" rows="2" value="{{old('description')}}"></textarea>
                                 </div>
                           
                              <div class="col-12">
                                 <div class="d-grid">
                                    <button type="submit" name="submit" class="btn btn-primary">Create</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--end row-->
         </main>
      

      

       

     

      

  </div>
  <!--end wrapper-->
@include('admin.include.footer')


 
</body>

</html>