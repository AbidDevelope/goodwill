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
                        <li class="breadcrumb-item active" aria-current="page">Edit Vendor</li>
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
                        
                           <h6 class="mb-0 text-uppercase">Edit Vendor</h6>
                           <hr/>
                           <form class="row g-3" action="{{ url('update-vendor/'.$vendor->id) }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                           
                              <div class="col-6">
                                 <label class="form-label">Vendor Name</label>
                                 <input type="text" class="form-control" name="name" value="{{$vendor->name}}">
                                 
                                 <span class="text-danger"></span>
                                 
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Contact Number</label>
                                 <input type="text" class="form-control" name="mobile" value="{{$vendor->mobile}}">

                                
                                 <span class="text-danger"></span>
                                 
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Email</label>
                                 <input type="email" class="form-control" name="email" value="{{$vendor->email}}">

                                 
                                 <span class="text-danger"></span>
                                 
                              </div>
                              <div class="col-6">
                                 <label class="form-label">Password</label>
                                 <input type="text" class="form-control" name="password" value="{{$vendor->password}}">
                                 <span class="text-danger"></span> 
                              </div>

                              <div class="col-6">
                                 <label class="form-label">Commission Percentage </label>
                                 <input type="number" class="form-control" name="commission" value="{{$vendor->commission}}">
                                 <span class="text-danger"></span> 
                              </div>
                              
                              <div class="col-6">
                                 <label class="form-label">Name of Firm/ Company</label>
                                 <input type="text" class="form-control" name="name_of_firm_company" value="{{$vendor->name_of_firm_company}}">
                              </div>

                              <div class="col-6">
                                 <label class="form-label">Type of the Firm </label>
                                 <select class="form-control" name="type_of_the_firm" value="type_of_the_firm" >
                                   <option value="">Select status</option>
                                    <option value="Public Limited Co" {{ $vendor->type_of_the_firm === 'Public Limited Co' ? 'selected' : '' }}>Public Limited Co</option>
                                    <option value="Partnership Co" {{ $vendor->type_of_the_firm === 'Partnership Co' ? 'selected' : '' }}>Partnership Co</option>
                                    <option value="Proprietorship" {{ $vendor->type_of_the_firm === 'Proprietorship' ? 'selected' : '' }}>Proprietorship</option>
                                    <option value="Govt. Sector" {{ $vendor->type_of_the_firm === 'Govt. Sector' ? 'selected' : '' }}>Govt. Sector</option>
                                    <option value="Others" {{ $vendor->type_of_the_firm === 'Others' ? 'selected' : '' }}>Others</option>
                                 </select>
                              </div>

                              <div class="col-6">
                              <label class="form-label">Status of Company</label>
                              <select class="form-control" name="status_of_company">
                                 <option value="">Select status</option>
                                 <option value="MANUFACTURER" {{ $vendor->status_of_company === 'MANUFACTURER' ? 'selected' : '' }}>MANUFACTURER</option>
                                 <option value="AUTHORISED DEALER" {{ $vendor->status_of_company === 'AUTHORISED DEALER' ? 'selected' : '' }}>AUTHORISED DEALER</option>
                                 <option value="STOCKIST/TRADER" {{ $vendor->status_of_company === 'STOCKIST/TRADER' ? 'selected' : '' }}>STOCKIST/TRADER</option>
                                 <option value="IMPORTER/INDIAN AGENT" {{ $vendor->status_of_company === 'IMPORTER/INDIAN AGENT' ? 'selected' : '' }}>IMPORTER/INDIAN AGENT</option>
                                 <option value="SERVICE PROVIDER" {{ $vendor->status_of_company === 'SERVICE PROVIDER' ? 'selected' : '' }}>SERVICE PROVIDER</option>
                              </select>
                           </div>
                        
                              <div class="col-6">
                                 <label class="form-label">Address</label>
                                 <input type="text" class="form-control" name="address" value="{{$vendor->address}}">
                              </div>

                              <div class="col-6">
                                 <label class="form-label">Country</label>
                                 <select class="form-control" name="country">
                                    <option value="">Select a country</option>
                                    <option value="Australia" {{ $vendor->country === 'Australia' ? 'selected' : '' }}>Australia</option>
                                    <option value="US" {{ $vendor->country === 'US' ? 'selected' : '' }}>US</option>
                                    <option value="UK" {{ $vendor->country === 'UK' ? 'selected' : '' }}>UK</option>
                                    <option value="India" {{ $vendor->country === 'India' ? 'selected' : '' }}>India</option>
                                    <option value="Dubai" {{ $vendor->country === 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                 </select>
                              </div>

                              <div class="col-6">
                                 <label class="form-label">State</label>
                                 <input type="text" class="form-control" name="state"  value="{{$vendor->state}}">
                              </div>
                              <div class="col-6">
                                 <label class="form-label">City</label>
                                 <input type="text" class="form-control" name="city" value="{{$vendor->city}}">
                              </div>

                             <div class="col-6">
                              <label class="form-label" for="categorie">Categorie</label>
                              <select class="form-control" id="categorie" name="categorie">
                                 <option value="">Select a category</option>
                                 <option value="Home Appliances" {{$vendor->categorie === 'Home Appliances' ? 'selected' : ''}}>Home Appliances</option>
                                 <option value="Fashion" {{$vendor->categorie === 'Fashion' ? 'selected' : ''}}>Fashion</option>
                                 <option value="Furniture" {{$vendor->categorie === 'Furniture' ? 'selected' : ''}}>Furniture</option>
                                 <option value="Medical Appliances" {{$vendor->categorie === 'Medical Appliances' ? 'selected' : ''}}>Medical Appliances</option>
                                 <option value="Food and Beverage" {{$vendor->categorie === 'Food and Beverage' ? 'selected' : ''}}>Food and Beverage</option>
                              </select>
                           </div>

                              <div class="col-12">
                                 <label class="form-label">Choose File</label>
                                 <input type="file" class="form-control" name="file">
                                 <img src="{{ asset('uploads/admin_create_vendor/' . $vendor->file) }}"  alt="" width="70px" height="70px" alt="image" >
                              </div>
                              
                              <div class="col-12">
                              <label class="form-label" for="description">Description of Business of your Company</label>
                              <textarea class="form-control"  name="description" rows="4">{{$vendor->description}}</textarea>
                              </div>

                           
                              <div class="col-12">
                                 <div class="d-grid">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
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