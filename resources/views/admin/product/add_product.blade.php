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
      <style>
         .login-form {
         display: none;
         }
         .login-form.active {
         display: block;
         }
         div#colorInputs {
             display: flex;
             flex-direction: column;
             gap: 7px;
         }
         .btn-in-h {
             display: flex;
             align-items: baseline;
             gap: 20px;
             margin: 10px 0;
         }
      </style>
   </head>
   <body>
      <div class="wrapper">
         @include('admin.include.header')
         @include('admin.include.sidebar')
         <!--start content-->
         <main class="page-content">
            <section class="product-rel-pro desktop-pro">
        <div class="srcn-container">
            <div class="row">
                <div>
                    <div class="product-pro-nav">
                        <ul class="nav nav-tabs product_tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">
                                    <div class="product_icon-img">
                                        <span class="color_img"><ion-icon name="card"></ion-icon></span>
                                    </div>
                                    <div class="product_icon_text">Wears</div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    <div class="product_icon-img">
                                        <span class="color_img"><ion-icon name="card"></ion-icon></span>
                                    </div>
                                    <div class="product_icon_text">Cosmetics</div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="messages-tab" data-bs-toggle="tab"
                                    data-bs-target="#messages" type="button" role="tab" aria-controls="messages"
                                    aria-selected="false">
                                    <div class="product_icon-img">
                                        <span class="color_img"><ion-icon name="card"></ion-icon></span>
                                    </div>
                                    <div class="product_icon_text"> Grocery</div>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="settings-tab" data-bs-toggle="tab"
                                    data-bs-target="#settings" type="button" role="tab" aria-controls="settings"
                                    aria-selected="false">
                                    <div class="product_icon-img">
                                        <span class="color_img"><ion-icon name="card"></ion-icon></span>
                                    </div>
                                    <div class="product_icon_text">Furniture</div>
                                </button>
                            </li>
                            
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card_form1">
                                    <div>
                                        <h1 class="heading_text">Wears</h1>
                                    </div>
                                    <form method="POST" action="{{url('insert_product_wears')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row_product row" id="product-tab">
                                            <div class="col-md-2">
                                                <div class="product-type_name">
                                                    <label for="vendor_type" class="form-label">Type</label>
                                                    <select class="form-select" name="vendortype">
                                                        <option>Admin</option>
                                                    </select>
                                                </div>
                                            </div>

                                          
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name">
                                                    <label for="Name" class="form-label">Name</label>
                                                    <input type="text" placeholder="Enter Name" class="form-control"
                                                        name="name" id="name" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Category</label>
                                                   <select  id="category" name="category" class="form-control">
                                                  <option>Select Category</option>
                                                  @if(!empty($category))
                                                  @foreach ($category as $list)
                                                  <option value="{{$list->id}}">{{$list->name}}</option>
                                                  @endforeach
                                                  @endif
                                               </select>
                                                </div>
                                            </div>


                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Sub Category</label>
                                                    <select class="form-select" name="subcategory" id="subcategory">
                                                      <option value="">Select Sub-Category</option>
                                                   </select>
                                                </div>
                                            </div>


                                    

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Brand</label>
                                                    <select class="form-select" name="brand" id="brand">
                                                          <option value="">Select Brands</option>
                                                     @if(!empty($brands))
                                                        @foreach ($brands as $list)
                                                       <option value="{{ $list->brand }}">{{ $list->brand }}</option>

                                                        @endforeach
                                                        @endif
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Small Description</label>
                                                    <input type="text" class="form-control" name="small_description"
                                                        id="small_description">
                                                </div>
                                            </div>
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Description</label>
                                                    <input type="text" class="form-control" name="description" 
                                                        id="small_description">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">product Other Details</label>
                                                    <input type="text" class="form-control" name="product_details"
                                                        id="small_description">
                                                </div>
                                            </div>
                                            <div class="col-md-12 product-type-pad">
                                                <div class="product-type_name" style="padding: 10px 0 ;">
                                                    <div class="form-group" id="colorInputs">
                                                    
                                                         <div class="color-input"></div>
                                                         <div class="color-input"> </div>
                                                    </div>
                                                <div class=" btn-in-h">
                                                       <button type="button" id="addColor" class="btn btn-primary">Add Color, Size, and Price</button><br>

                                                       
                                                       <button type="submit" name="submit" class="btn btn-success mt-3">Submit</button>
                                               </div>
                                           </div>
                                           </div>
                                        </div>
                                    
                                </form>
                                </div>
                            </div>
                           <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="card_form1">
                                    <div>
                                        <h1 class="heading_text">Cosmetic</h1>
                                    </div>
                                    <form method="POST" action="{{url('insert_product_cosmetic')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row_product row" id="product-tab">
                                            <div class="col-md-2">
                                                <div class="product-type_name">
                                                    <label for="vendor_type" class="form-label">Type</label>
                                                    <select class="form-select" name="vendortype">
                                                        <option>Admin</option>
                                                    </select>
                                                </div>
                                            </div>

                                          
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name">
                                                    <label for="Name" class="form-label">Name</label>
                                                    <input type="text" placeholder="Enter Name" class="form-control"
                                                        name="name" id="name" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Category</label>
                                                    <select  id="category" name="category" class="form-control">
                                                <option>Select Category</option>
                                                @if(!empty($category))
                                                @foreach ($category as $list)
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                                </div>
                                            </div>


                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Sub Category</label>
                                                    <select class="form-select" name="subcategory" id="subcategory">
                                                        <option value="">Select Sub-Category</option>

                                                         @if(!empty($subcategory))
                                                        @foreach ($subcategory as $list)
                                                        <option value="{{$list->subcategory}}">{{$list->subcategory}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Brand</label>
                                                    <select class="form-select" name="brand" id="brand">
                                                          <option value="">Select Brands</option>
                                                     @if(!empty($brands))
                                                        @foreach ($brands as $list)
                                                        <option value="{{ $list->brand }}">{{ $list->brand }}</option>
                                                        @endforeach
                                                        @endif
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Small Description</label>
                                                    <input type="text" class="form-control" name="small_description"
                                                        id="small_description">
                                                </div>
                                            </div>
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Description</label>
                                                    <input type="text" class="form-control" name="description" 
                                                        id="small_description">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">product Other Details</label>
                                                    <input type="text" class="form-control" name="product_details"
                                                        id="small_description">
                                                </div>
                                            </div>
                                            <div class="col-md-12 product-type-pad">
                                                <div class="product-type_name" style="padding: 10px 0 ;">
                                                    <div class="form-group" id="cosmetics-container">
                                                       
                                                         <div class="color-input"></div>
                                                         <div class="color-input"> </div>
                                                    </div>
                                                <div class=" btn-in-h">
                                                       <button type="button" id="addcosmetics" class="btn btn-primary">Add Color, and Price</button><br>

                                                       <button type="submit" name="submit" class="btn btn-success mt-3">Submit</button>
                                               </div>
                                           </div>
                                           </div>
                                        </div>
                                    
                                </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                <div class="card_form1">
                                    <div>
                                        <h1 class="heading_text"> Grocery</h1>
                                    </div>
                                    <form method="POST" action="{{url('insert_product_Grocery')}}"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="row_product row" id="product-tab">
                                            <div class="col-md-2">
                                                <div class="product-type_name">
                                                    <label for="vendor_type" class="form-label">Type</label>
                                                    <select class="form-select" name="vendortype">
                                                        <option>Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name">
                                                    <label for="Name" class="form-label">Name</label>
                                                    <input type="text" placeholder="Enter Name" class="form-control"
                                                        name="name" id="name" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name">
                                                    <label for="Name" class="form-label">Name</label>
                                                    <input type="file" class="form-control"
                                                        name="image"  required="">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Category</label>
                                                    <select  id="category" name="category" class="form-control">
                                                <option>Select Category</option>
                                                @if(!empty($category))
                                                @foreach ($category as $list)
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                                </div>
                                            </div>


                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Sub Category</label>
                                                    <select class="form-select" name="subcategory" id="subcategory">
                                                        <option value="">Select Sub-Category</option>

                                                         @if(!empty($subcategory))
                                                        @foreach ($subcategory as $list)
                                                        <option value="{{$list->subcategory}}">{{$list->subcategory}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Brand</label>
                                                    <select class="form-select" name="brand" id="brand">
                                                          <option value="">Select Brands</option>
                                                     @if(!empty($brands))
                                                        @foreach ($brands as $list)
                                                        <option value="{{ $list->brand }}">{{ $list->brand }}</option>
                                                        @endforeach
                                                        @endif
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Original Price</label>
                                                    <input type="number" class="form-control" name="original_price"
                                                        id="small_description">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Selling Price</label>
                                                    <input type="number" class="form-control" name="selling_price"
                                                        id="small_description">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Quantity</label>
                                                    <input type="number" class="form-control" name="quantity"
                                                        id="small_description">
                                                </div>
                                            </div>
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Small Description</label>
                                                    <input type="text" class="form-control" name="small_description"
                                                        id="small_description">
                                                </div>
                                            </div>
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Description</label>
                                                    <input type="text" class="form-control" name="description" 
                                                        >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">product Other Details</label>
                                                    <input type="text" class="form-control" name="product_details"
                                                      >
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">products Multiple Images</label>
                                                  <input type="file" name="images[]" id="productImages" class="form-control" accept="image/*" multiple required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 product-type-pad">
                                                <div class="product-type_name" style="padding: 10px 0 ;">
                                                    <div class="form-group" id="cosmetics-container">
                                                       
                                                         <div class="color-input"></div>
                                                         <div class="color-input"> </div>
                                                    </div>
                                                <div class=" btn-in-h">
                                                     

                                                       <button type="submit" name="submit" class="btn btn-success mt-3">Submit</button>
                                               </div>
                                           </div>
                                           </div>
                                        </div>
                                    
                                </form>
                                
                                </div>
                            </div>
                            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="card_form1">
                                    <div>
                                        <h1 class="heading_text">Furniture</h1> 
                                    </div>
                                    <form method="POST" action="{{url('insert_product_Furniture')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row_product row" id="product-tab">
                                            <div class="col-md-2">
                                                <div class="product-type_name">
                                                    <label for="vendor_type" class="form-label">Type</label>
                                                    <select class="form-select" name="vendortype">
                                                        <option>Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name">
                                                    <label for="Name" class="form-label">Name</label>
                                                    <input type="text" placeholder="Enter Name" class="form-control"
                                                        name="name" id="name" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name">
                                                    <label for="Name" class="form-label">Name</label>
                                                    <input type="file" class="form-control"
                                                        name="image"  required="">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Category</label>
                                                    <select  id="category" name="category" class="form-control">
                                                <option>Select Category</option>
                                                @if(!empty($category))
                                                @foreach ($category as $list)
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                                </div>
                                            </div>


                                             <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Sub Category</label>
                                                   
                                                     <select class="form-select" name="subcategory" id="subcategory">
                                                        <option value="">Select Sub-Category</option>

                                                         @if(!empty($subcategory))
                                                        @foreach ($subcategory as $list)
                                                        <option value="{{$list->subcategory}}">{{$list->subcategory}}</option>
                                                        @endforeach
                                                        @endif
                                                 
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name product-type-nd">
                                                    <label for="Brand" class="form-label">Brand</label>
                                                    <select class="form-select" name="brand" id="brand">
                                                   <option value="">Select Brands</option>

                                                         @if(!empty($brands))
                                                        @foreach ($brands as $list)
                                                      <option value="{{ $list->brand }}">{{ $list->brand }}</option>
                                                        @endforeach
                                                        @endif
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Original Price</label>
                                                    <input type="number" class="form-control" name="original_price"
                                                        id="small_description">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Selling Price</label>
                                                    <input type="number" class="form-control" name="selling_price"
                                                        id="small_description">
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Quantity</label>
                                                    <input type="number" class="form-control" name="quantity"
                                                        id="small_description">
                                                </div>
                                            </div>
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Small Description</label>
                                                    <input type="text" class="form-control" name="small_description"
                                                        id="small_description">
                                                </div>
                                            </div>
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">Description</label>
                                                    <input type="text" class="form-control" name="description" 
                                                        >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">product Other Details</label>
                                                    <input type="text" class="form-control" name="product_details"
                                                      >
                                                </div>
                                            </div>

                                            <div class="col-md-2 product-type-pad">
                                                <div class="product-type_name ">
                                                    <label for="small_description"
                                                        class="form-label">products Multiple Images</label>
                                                    
                                                      <input type="file" name="images[]" id="productImages" class="form-control" accept="image/*" multiple required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 product-type-pad">
                                                <div class="product-type_name" style="padding: 10px 0 ;">
                                                    <div class="form-group" id="cosmetics-container">
                                                       
                                                         <div class="color-input"></div>
                                                         <div class="color-input"> </div>
                                                    </div>
                                                <div class=" btn-in-h">
                                                     

                                                       <button type="submit" name="submit" class="btn btn-success mt-3">Submit</button>
                                               </div>
                                           </div>
                                           </div>
                                        </div>
                                    
                                </form>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('addColor').addEventListener('click', function() {
            const colorInputs = document.getElementById('colorInputs');
            const colorInput = document.createElement('div');
            colorInput.classList.add('color-input');
            colorInput.innerHTML = `
                <div class="row">
                <div class="col-md-2 product-type-pad">
                    <label for="colorName">Color Name</label>
                    <input type="text" name="colorName[]" id="colorName" class="form-control" placeholder="Color Name" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="colorImage">Color Image</label>
                    <input type="file" name="image[]" id="colorImage" class="form-control" accept="image/*" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="sizeName">Size Name</label>
                    <input type="text" name="sizeName[]" id="sizeName" class="form-control" placeholder="Size Name" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="originalPrice">Original Price</label>
                    <input type="number" name="original_price[]" id="originalPrice" class="form-control" placeholder="Original Price" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="sellingPrice">Selling Price</label>
                    <input type="number" name="selling_price[]" id="sellingPrice" class="form-control" placeholder="Selling Price" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity[]" id="quantity" class="form-control" placeholder="Quantity" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="productImages">Product  multiple Images</label>
                    <input type="file" name="images[]" id="productImages" class="form-control" accept="image/*" multiple required>
                </div>
            </div>

            `;
            colorInputs.appendChild(colorInput);
        });
        // jhkidvfji

        document.getElementById('addcosmetics').addEventListener('click', function() {
        const cosmeticsContainer = document.getElementById('cosmetics-container');
        const newCosmetics = document.createElement('div');
        newCosmetics.classList.add('color-cosmetics');
        newCosmetics.innerHTML = `
                <div class="row">
                <div class="col-md-2 product-type-pad">
                    <label for="colorName">Color Name</label>
                    <input type="text" name="colorName[]" id="colorName" class="form-control" placeholder="Color Name" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="colorImage">Color Image</label>
                    <input type="file" name="image[]" id="colorImage" class="form-control" accept="image/*" required>
                </div>
               
                <div class="col-md-2 product-type-pad">
                    <label for="originalPrice">Original Price</label>
                    <input type="number" name="original_price[]" id="originalPrice" class="form-control" placeholder="Original Price" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="sellingPrice">Selling Price</label>
                    <input type="number" name="selling_price[]" id="sellingPrice" class="form-control" placeholder="Selling Price" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity[]" id="quantity" class="form-control" placeholder="Quantity" required>
                </div>
                <div class="col-md-2 product-type-pad">
                    <label for="productImages">Product multiple Images</label>
                    <input type="file" name="images[]" id="productImages" class="form-control" accept="image/*" multiple required>
                </div>
            </div>
        `;
        cosmeticsContainer.appendChild(newCosmetics);
    });
    </script>

         </main>
      </div>
      @include('admin.include.footer')
   </body>
</html>
<script>
        $(document).ready(function(){
            $('.category').on('change', function(){
                var category_id = $(this).val();
                $('#brand').html('');
                $.ajax({
                    url: '{{ url("fetch_brand/") }}/' + category_id,
                    type: 'POST',
                    data: {
                        category_id: category_id,
                        _token: '{{ csrf_token() }}'
                    },
                    datatype: 'json',
                    success: function(response){
                        if(response['brand'].length > 0) {
                            $.each(response['brand'], function(key, value){
                                $('#brand').append("<option id='" + value['id'] + "'>"+ value['brand'] + "</option>")
                            });
                        }
                    }
                });
                console.log(category_id);
            });
        });
    </script>
    
  <script>
   $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
   
   $(document).ready(function(){
   
   $("#category").change(function(){
   
   var category_id  =$(this).val();
   
   $.ajax({
   url:'{{url("/fetchScubcat/")}}/'+category_id,
   
    type:'post',
    datatype:'json',
    success:function(response){
   //  console.log(response);
     if(response['subcategory'].length>0){
     $.each(response['subcategory'],function(key,value){
        $("#subcategory").append("<option id='"+value['id']+"'>"+value['subcategory']+"</option>")
       });
   }
   }
   
   });
   console.log(category_id);
   });
   });
</script>



  



<script>
      function showForm(formId) {
        var forms = document.getElementsByClassName("login-form");
        for (var i = 0; i < forms.length; i++) {
          if (forms[i].id === formId) {
            forms[i].classList.add("active");
          } else {
            forms[i].classList.remove("active");
          }
        }

        // Clear the data of the other form
        var otherFormId = formId === "login" ? "register" : "login";
        var otherForm = document.getElementById(otherFormId);
        var inputs = otherForm.getElementsByTagName("input");
        for (var j = 0; j < inputs.length; j++) {
          if (inputs[j].type !== "radio") {
            inputs[j].value = "";
          }
        }
      }

      const showFormCheckbox = document.getElementById("showForm1");
      const formContainer = document.querySelector(".form-container");

      showFormCheckbox.addEventListener("change", function () {
        if (this.checked) {
          formContainer.style.display = "block";
        } else {
          formContainer.style.display = "none";
        }
      });
    </script>



