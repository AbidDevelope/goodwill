<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Vendor;
use App\Models\Brand;
use App\Models\SubCategories;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\bannerData;
use App\Models\UserAddress;
use App\Models\Stick;
use App\Models\ProductWear;

use App\Models\ProductCosmetic;
use App\Models\ProductGrocery;
use App\Models\ProductFurniture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use App\Http\Requests\StorePostRequest;
use App\Models\User;
use App\Models\OrderTracking;



class AdminController extends Controller
{
    function index()
    {
        return view('admin/login');
    }

    function registration()
    {
        return view('registration');
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('admin')->with('success', 'Registration Completed, now you can login');
    }

    function validate_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('admin_dashboard');
        }

        // return redirect('login')->with('success', 'Login details are not valid');
        return redirect('admin')->with('error', 'Email or password does not matched !');
    }

   function admin_dashboard()
    {
        if (Auth::check()) {
            $totalCustomers = DB::table('users')->count();
            $totalorders = DB::table('orders')->count();
            $totalvendors = DB::table('vendors')->count();
    
            return view('admin-dashboard', compact('totalCustomers', 'totalorders','totalvendors'));
        }
    
        return redirect('admin')->with('status', 'You are not allowed to access');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('admin');
    }

   

    function add_product()
    {
        if (Auth::check()) {
            $category = \DB::table('category')
                ->orderBy('name', 'ASC')->get();
                
            $data['category'] = $category;

            $subcategory = \DB::table('subcategory')
                ->orderBy('subcategory', 'ASC')->get();
            $data['subcategory'] = $subcategory;

            $brands = \DB::table('brands')
                ->orderBy('brand', 'ASC')->get();
            $data['brands'] = $brands;

            return view('admin/product/add_product', $data);
        }
        return redirect('admin')->with('status', 'You are not allowed to access');
    }

    public function fetchScubcat($category_id = null)
    {
        $subcategory = \DB::table('subcategory')
            ->where('category_id', $category_id)->get();
        return response()->json([
            'status' => 1,
            'subcategory' => $subcategory,
        ]);
    }


    public function insert_product(Request $request)
    {
     if(Auth::check()) {

        $validator = Validator::make($request->all(), [
                 'vendortype' => 'required|max:255',
                 'image' => 'required|mimes:jpg,png,jpeg|max:2048',
                 'name' => 'required|max:255',
                 'slug' => 'required|max:255',
                 'brand' => 'required|max:255',
                 'subcategory' => 'required|max:255',
                 'small_description' => 'required|max:255',
                 'description' => 'required|max:255',
                 'original_price' => 'required|max:255',
                 'selling_price' => 'required|max:255',
                 'quantity' => 'required|max:255',
                 'status' => 'required|max:255',
                 'meta_title' => 'required|max:255',
                 'meta_keyword' => 'required|max:255',
                 
             ]);

          if ($validator->fails()) {
                 return redirect()->back()->withErrors($validator)->withInput();
             }

        $Product = new Product();

         $Product->vendortype = $request->input('vendortype');
                $Product->image = $request->input('image');
                if ($request->hasfile('image')) {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    $file->move('upload/products/', $fileName);
                    $Product->image = $fileName;
                }
                $Product->name = $request->input('name');
                $Product->slug = $request->input('slug');
                $Product->brand = $request->input('brand');
                $Product->category_id = $request->input('category');
                $Product->subcategory = $request->input('subcategory');
                $Product->small_description = $request->input('small_description');
                $Product->description = $request->input('description');
                $Product->original_price = $request->input('original_price');
                $Product->selling_price = $request->input('selling_price');
                $Product->quantity = $request->input('quantity');
                $Product->trending = $request->input('trending');
                $Product->status = $request->input('status');
                $Product->meta_title = $request->input('meta_title');
                $Product->meta_keyword = $request->input('meta_keyword');
                $Product->meta_description = $request->input('meta_description');
                $Product->color = $request->input('color');
                $Product->featurename = $request->input('featurename');
                $Product->other_details = $request->input('other_details');
                $Product->product_details = $request->input('product_details');
                $Product->vendor_id = Auth::id();
                $Product->save();

                 if($request->hasFile('images'))
            {
             $uploadPath = 'upload/products/';
             $i = 1;
                foreach($request->file('images') as $file)
                {
                   $extension = $file->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extension;
                    $file->move($uploadPath, $fileName);
                    $finalImagePathName = $fileName;
                    
                    ProductImage::create([
                    'product_id' => $Product->id,
                    'images' => $finalImagePathName,
                    ]);
                }
            }
          return redirect()->back()->with('message', 'Product Added Successfully');
    }

    return redirect('admin')->with('status', 'you are not allowed to access');
}





   




      public function product_list()
        {
            if (Auth::check()) {



                $categories = Categories::all();

                // print_r($categories);die;

                $products = DB::table('product_wears')
                    ->select('product_wears.*', 'products.name as product_name', 'category.name as category_name', 'products.category_id', 'products.id as prodid','products.subcategory','products.brand','products.small_description','products.vendortype','products.vendor_id','products.status','products.product_details')
                    ->leftJoin('products', 'product_wears.product_id', '=', 'products.id')
                    ->leftJoin('category', 'products.category_id', '=', 'category.id')
                    ->paginate(10); 



                return view('admin.product.product_list', compact('products','categories'));
            }

            return redirect('admin')->with('status', 'You are not allowed to access');
        }




       public function productView($id)
       {
          $product = Product::find($id);
          return view('admin.product.product_view', compact('product'));
       }

    public function delete_product($id)
    {
        $product = ProductWear::find($id);
        $product->delete();
        return redirect()
            ->back()
            ->with('status', 'Product Deleted Successfully');
    }

    public function edit_product($id)
    {
        if (Auth::check()) {
            $product = ProductWear::find($id);
            return view('admin/product/edit_product', compact('product'));
        }
        return redirect('admin')->with('status', 'you are not allowed to access');
    }

    public function update_product(Request $request, $id)
    {
        
        Validator::make($request->all(),[
             
            'original_price' => 'required|max:255',
            'selling_price' => 'required|max:255',
            'quantity' => 'required|max:255',
          
        ]);
   
        $Product = ProductWear::find($id);
          
          
            $Product->original_price = $request->input('original_price');
            $Product->selling_price = $request->input('selling_price');
            $Product->quantity = $request->input('quantity');
           
            $Product->update();
        return redirect('product_list')->with('status', 'Product Update Successfully');
    }

    public function get_data($id)
    {
        if (Auth::check()) {
            $product = Product::find($id);
            // $product = DB::table('category')
            // ->join('product', 'category.id', '=', 'product.category_id')
            // ->select('category.name','product.id','product.file','product.price','product.product_title', 'product.subcategory', 'product.description', 'product.created_at')
            // ->get();
            //print_r($product);die;
            return view('admin/product/single_data_list', compact('product'));
        }
        return redirect('admin')->with('status', 'you are not allowed to access');
    }

    public function ordersDetails($id)
    {
        $order = Order::find($id);
        $orderItem = OrderItem::where('order_id', $id)->get();

        $shipping = Shipping::find($id);
       // return $shipping;
        return view('admin.orders.orders', compact('order','orderItem', 'shipping'));
    }


    
    // orders  section start //


function orders_list()
{
    if (Auth::check()) {
        $orders = DB::table('orders')
            ->select('orders.id', 'user_address.name', 'orders.grand_total', 'orders.payment_status', 'orders.payment_mode', 'orders.created_at', 'user_address.area_or_street', 'user_address.flat_no_building_name', 'user_address.land_mark', 'user_address.mobile', 'user_address.city', 'user_address.state', 'user_address.pincode')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('user_address', 'orders.address_id', '=', 'user_address.id')
            ->paginate(5); // Move paginate() here

        return view('admin/orders/orders_list', compact('orders'));
    }
    
    return redirect('admin')->with('status', 'You are not allowed to access');
}







    public function delete_orders($id)
    {
        $Oredrs = Order::find($id);
        $Oredrs->delete();
        return redirect()
            ->back()
            ->with('delete', 'Orders Deleted Successfully');
    }

   public function search_order(Request $request)
{
    $search_data = $request->input('order_id');

    // Use the 'select' method from the DB facade to query the database.
    $orders = DB::table('orders')
        ->select('orders.id', 'user_address.name', 'orders.grand_total', 'orders.payment_status', 'orders.payment_mode', 'orders.created_at', 'user_address.area_or_street', 'user_address.flat_no_building_name', 'user_address.land_mark', 'user_address.mobile', 'user_address.city', 'user_address.state', 'user_address.pincode')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('user_address', 'orders.address_id', '=', 'user_address.id')
        ->where('orders.id', 'LIKE', '%' . $search_data . '%')
        ->get();

    return view('admin.orders.search_orders', compact('orders'));
}



    //orders section end//

    // categories section Start//
    function add_category()
    {
        if (Auth::check()) {
            return view('admin/categories/add_categories');
        }
        return redirect('admin')->with('status', 'you are not allowed to access');
    }


   

      function insert_category(Request $request)
          {
              $request->validate([
                  'name' => 'required',
                  // 'brand' => 'required|unique:brands,brand',

                  'category_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
          
              $category = Categories::create([
                  'name' => $request->input('name'),
              ]);
          
              if ($request->hasfile('category_image'))
              {
                  $destination = 'uploads/categoryimage/';
                  $file = $request->file('category_image');
                  $extension = $file->getClientOriginalExtension();
                  $filename = time().'.'.$extension;
                  $file->move($destination, $filename);
                  $category->category_image = $filename;

                  $category->save();
              }
          
              return redirect('show_category')->with('status', 'Categories Created Successfully');
          }



    function show_category()
    {
        if (Auth::check()) {
            $category = DB::table('category')
                ->select('id', 'name','category_image', 'created_at')
                ->get();
            return view('admin/categories/show_categories', compact('category'));
        }
        return redirect('admin')->with('status', 'you are not allowed to access');
    }

    public function detete_categories($id)
    {
        DB::delete('delete from category where id = ?', [$id]);
        return redirect()
            ->back()
            ->with('delete', 'Categories Deleted Successfully');
    }
    public function edit_categories($id)
    {
        $categories = Categories::find($id);
        return view('admin/categories/editcategories', compact('categories'));
    }




 


         public function update_category(Request $request, $id)
          {
              $categories = Categories::find($id);
              $categories->name = $request->input('name');
          
              if ($request->hasFile('category_image')) {
                  $destination = 'uploads/categoryimage/' . $categories->category_image;
                  if (File::exists($destination)) {
                      File::delete($destination);
                  }
                  $file = $request->file('category_image');
                  $extension = $file->getClientOriginalExtension();
                  $filename = time() . '.' . $extension;
                  $file->move('uploads/categoryimage/', $filename);
                  $categories->category_image = $filename;
              }
          
              $categories->update();
              return redirect('show_category')->with('status', 'Category Updated Successfully');
          }




    function add_subcategory()
    {
        if (Auth::check()) {
            $category = \DB::table('category')
                ->orderBy('name', 'ASC')
                ->get();
            $data['category'] = $category;
            return view('admin/categories/subcategorie', $data);
        }
        return redirect('admin')->with('status', 'you are not allowed to access');
    }

    public function insert_subcategory(Request $request)
    {
        $subcategory = new SubCategories();
        $subcategory->subcategory = $request->input('subcategory');
        $subcategory->category_id = $request->input('category_id');

        if ($request->hasfile('subcategory_image'))
              {
                  $destination = 'uploads/categoryimage/';
                  $file = $request->file('subcategory_image');
                  $extension = $file->getClientOriginalExtension();
                  $filename = time().'.'.$extension;
                  $file->move($destination, $filename);
                  $subcategory->subcategory_image = $filename;
                  $subcategory->save();
              }


        $subcategory->save();
        return redirect('show_subcategory')->with('status', 'SubCategories Create Successfully');
    }

    function show_subcategory()
    {
        if (Auth::check()) {
            $subcategories = DB::table('subcategory')

                ->join('category', 'subcategory.category_id', '=', 'category.id')
                ->select('subcategory.id', 'subcategory.subcategory','subcategory.subcategory_image', 'subcategory.created_at', 'category.name')
                ->get();
              
            return view('admin/categories/show_subcategories', ['subcategories' => $subcategories]);
        }
        return redirect('admin')->with('status', 'you are not allowed to access');
    }

    public function detete_subcategory($id)
    {
        DB::delete('delete from subcategory where id = ?', [$id]);
        return redirect()
            ->back()
            ->with('delete', 'SubCategories Deleted Successfully');
    }

    public function edit_subcategory($id)
    {
        $subcategories = SubCategories::find($id);
        return view('admin/categories/editsubcategories', compact('subcategories'));
    }

    public function update_subcategory(Request $request, $id)
    {
        $subcategories = SubCategories::find($id);
        $subcategories->subcategory = $request->input('subcategory');


        if ($request->hasFile('subcategory_image')) {
                  $destination = 'uploads/categoryimage/' . $subcategories->subcategory_image;
                  if (File::exists($destination)) {
                      File::delete($destination);
                  }
                  $file = $request->file('subcategory_image');
                  $extension = $file->getClientOriginalExtension();
                  $filename = time() . '.' . $extension;
                  $file->move('uploads/categoryimage/', $filename);
                  $subcategories->subcategory_image = $filename;
              }



        $subcategories->update();
        return redirect('show_subcategory')->with('status', 'SubCategories Updated Successfully');
    }
    

    // categories section end//
    function slider_banner()
    {
        if (Auth::check()) {
            $banner = bannerData::all();
            return view('admin/banner/slider_banner', compact('banner'));
        }
        return redirect('admin')->with('status', 'you are not allowed to access');
    }

    public function add_slider_banner(Request $request)
    {
        $banner = new bannerData();

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/banner/', $filename);
            $banner->file = $filename;
        }
        $banner->save();
        return redirect()
            ->back()
            ->with('status', 'banner Added Successfully');
    }

    public function bannerdestroy($id)
    {
        $banner = bannerData::find($id);
        $banner->delete();
        return redirect()
            ->back()
            ->with('delete', 'banner Deleted Successfully');
    }

    function edit_banner($id)
    {
        $banner = bannerData::find($id);
        
        return view('admin/banner/banner_edit', compact('banner'));
    }



    public function update_banner(Request $request, $id)
    {
        $banner = bannerData::find($id);

        if ($request->hasfile('file')) {
            $destination = 'uploads/banner/' . $banner->file;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/banner/', $filename);
            $banner->file = $filename;
        }
        $banner->update();
        return redirect()
            ->route('slider_banner')
            ->with('status', 'Banner updated successfully');
    }

    public function stick()
    {
        if (Auth::check()) {
            $stick = Stick::all();
            return view('admin.banner.stick', compact('stick'));
        }
        return redirect('admin')->with('status', 'you are not allowed to access');
    }

    public function add_stick(Request $request)
    {
        $stick = new Stick();
        $stick->name = $request->input('name');

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/stick/', $filename);
            $stick->file = $filename;
        }

        $stick->save();
        return redirect()
            ->back()
            ->with('status', 'stick Added Successfully');
    }

    public function update_stick(Request $request, $id)
    {
        $stick = Stick::find($id);
        $stick->name = $request->input('name');

        if ($request->hasfile('file')) {
            $destination = 'uploads/product/' . $stick->file;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/stick/', $filename);
            $stick->file = $filename;
        }

        $stick->update();
        return redirect()
            ->route('stick')
            ->with('status', 'Stick updated successfully');
    }

    function edit_stick($id)
    {
        $stick = Stick::find($id);
        return view('admin/banner.editstick', compact('stick'));
    }

    public function stickdestroy($id)
    {
        $banner = Stick::find($id);
        $banner->delete();
        return redirect()
            ->back()
            ->with('delete', 'banner Deleted Successfully');
    }

    // vendor create----------

    function vendor_create()
    {
        return view('admin/vendor.vendor_create');
    }

    function vendor_list()
    {

         $vendor = DB::table('vendors')->paginate(5);
        return view('admin/vendor.vendor_list', compact('vendor'));
    }

              function edit_vendor($id){
                    $vendor = Vendor::find($id);

                 return view('admin/vendor.edit_vendor', compact('vendor'));
                }

    public function add_vendor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:vendors',
            'mobile' => 'required|numeric|digits:10',
            // 'password' => 'required|min:6',
            'password' => 'required|min:6|regex:/^\S+$/',
            'city' => 'required',
            'address' => 'required',
        ]);
        $vendor = new Vendor();
        $vendor->name = $request->input('name');
        $vendor->email = $request->input('email');
        $vendor->mobile = $request->input('mobile');
        $vendor->commission = $request->input('commission');
        $vendor->name_of_firm_company = $request->input('name_of_firm_company');
        $vendor->type_of_the_firm = $request->input('type_of_the_firm');
        $vendor->status_of_company = $request->input('status_of_company');
        $vendor->country = $request->input('country');
        $vendor->address = $request->input('address');
        $vendor->state = $request->input('state');
        $vendor->city = $request->input('city');
        $vendor->categorie = $request->input('categorie');
        $vendor->description = $request->input('description');
         $vendor->password = $request->input('password');

        //  $hashedPassword = bcrypt($request->input('password'));
        // $vendor->password = $hashedPassword;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/admin_create_vendor/', $filename);
            $vendor->file = $filename;
        }
        $vendor->save();

        return redirect()
            ->route('vendor_list')
            ->with('status', 'Vendor Added Success');
    }



    public function update_vendor(Request $request, $id)
            {
             

                
                $vendor = Vendor::find($id);
                $vendor->name = $request->input('name');
                $vendor->email = $request->input('email');
                $vendor->mobile = $request->input('mobile');
                $vendor->name_of_firm_company = $request->input('name_of_firm_company');
                $vendor->commission = $request->input('commission');
                $vendor->type_of_the_firm = $request->input('type_of_the_firm');
                $vendor->status_of_company = $request->input('status_of_company');
                $vendor->country = $request->input('country');
                $vendor->address = $request->input('address');
                $vendor->state = $request->input('state');
                $vendor->city = $request->input('city');
                $vendor->categorie = $request->input('categorie');
                $vendor->description = $request->input('description');
                $vendor->password = $request->input('password');
                
                 // $hashedPassword = bcrypt($request->input('password'));
                 // $vendor->password = $hashedPassword;

                 if($request->hasfile('file'))
                 {
                     $destination = 'uploads/product/'. $vendor->file;
                     if(File::exists( $destination))
                     {
                         File::delete($destination);
                     }
                     $file = $request->file('file');
                     $extenstion = $file->getClientOriginalExtension();
                     $filename = time().'.'.$extenstion;
                     $file->move('uploads/admin_create_vendor/', $filename);
                     $vendor->file = $filename;
                 }

                $vendor->update();

                return redirect()->route('vendor_list')->with('status', 'Vendor Updated Success');
                
            }

    public function delete_vendor($id)
    {
        $student = Vendor::find($id);
        $student->delete();
        return redirect()
            ->back()
            ->with('delete', 'Vendor Deleted Successfully');
    }


 function address_list()
    {
        $address = DB::table('user_address')
                        ->orderBy('created_at', 'desc') // Order by 'created_at' column in descending order
                        ->paginate(7);
        return view('admin/users.address_list', compact('address'));
    }
   

    public function delete_addres($id)
    {
        $student = UserAddress::find($id);
        $student->delete();
        return redirect()->back()->with('delete', 'Address Deleted Successfully');
    }



  public function search_products()
    {
        if (Auth::check())
        {
            $search_data = request()->input('name');
            $categories = DB::table('category')->select('name')->get();
            $products = Product::join('category', 'products.category_id', '=', 'category.id')
                ->where('category.name', '=', $search_data)
                ->select('products.*')
                ->paginate(5); // Moved paginate() method here
            return view('admin/product/search_product', compact('products', 'search_data'));
        }
        return redirect('admin')->with('status', 'You are not allowed to access.');
    }










  public function search_status(Request $request)
    {
        $status = $request->input('status');

        $products = Product::where('status', $status)->paginate(5);

        return view('admin.product.search_product', compact('products'));
    }




    


    public function act_product($id)
        {
            $data=Product::find($id);
            if($data){
                if($data->status){
                   $data->status=0;  
                }
                else
                {
                  $data->status=1;   
                }
                 $data->save();
            }
            return redirect()->back();
           
        }

   



       


public function brand()
{
    if (Auth::check())
    { 
        $categories = Categories::all();

        $brands = Brand::paginate(5);
        
        return view('admin/brands/add_brand', compact('categories', 'brands'));   
    }
    
    return redirect('admin')->with('status', 'You are not allowed to access.');
}


  public function addBrand(Request $request)
    {
        if (Auth::check())
        { 
            $validate = Validator::make($request->all(),[
                'brand' => 'required|unique:brands,brand',
            ]);
            if($validate->fails())
            {
                return redirect()->back()->withErrors($validate)->withInput();
            }
            $brands = new Brand();
            $brands->category_id = $request->category;
            $brands->brand = $request->brand;
            $brands->save();
    
            return redirect()->back()->with('message', 'Brand Add Successfully!!');
        }
            return redirect('admin')->with('status', 'You are not allowed to access.');
    }
    


     public function brand_delete($id)
    {
            $brands = Brand::find($id);
            $brands->delete();
            return redirect()->back()->with('message', 'Brand Deleted Successfully!');
        
    }


  public function brand_edit($id)
    {
        $brand = Brand::findOrFail($id); 
        return response()->json([
            'status' => 200,
            'data' => $brand,
        ]);
    }



public function admin_orders()
{



    if (Auth::check()) {
        $admin = Auth::user();
        $vendorId = $admin->id; 



        $orders = Order::with('orderItem.product')
            ->whereHas('orderItem.product', function ($query) use ($vendorId) {
                $query->where('vendor_id', $vendorId);
            })
            ->paginate(6);

       
            
        return view('admin.order.order_list', ['orders' => $orders]);
    }

    return redirect('admin')->with('status', 'You are not allowed to access.');
}





public function admin_orders_details($id)
{
    if (Auth::check()) {
        $vendorId = Auth::user()->id;
        $order = Order::where('id', $id)->first();

        if ($order) {
            $user = $order->user;
            $addressId = UserAddress::where('user_id', $user->id)->first();
            $orderItem = OrderItem::where('order_id', $id)
                ->where('vendor_id', $vendorId)
                ->paginate(5);

            $productIds = $orderItem->pluck('product_id')->unique()->toArray();
            $product = Product::whereIn('id', $productIds)->with('orderItem')->get();

            return view('admin.order.order_details', compact('user', 'addressId', 'order', 'orderItem', 'product'));
        }
    }

    return redirect()->route('some_error_route');
}



public function orderTracking(Request $request, $id){

        $orderItemId = OrderItem::find($id);
        
        if($orderItemId)
        {
            $orderItemId->packed = 'packed';
            $orderItemId->tracking_status = 'packed';
            $orderItemId->save();
 
            $orderTrackingId = OrderTracking::where('order_item_id', $id)->first();

            if($orderTrackingId)
            {
               $orderTrackingId->user_id = $orderTrackingId->user_id;
               $orderTrackingId->order_id = $orderTrackingId->order_id;
               $orderTrackingId->product_id = $orderTrackingId->product_id;
               $orderTrackingId->order_item_id = $orderItemId->id;
               $orderTrackingId->packed_time = $orderTrackingId->updated_at;
               $orderTrackingId->update();
            }
        }

        return redirect()->back()->with('message', 'Your status has been updated successfully!');
    }



    public function productDispatched(Request $request, $id)
    {
        $orderItemId = OrderItem::find($id);

        if($orderItemId)
        {
            $orderItemId->shipped = 'shipped';
            $orderItemId->tracking_status = 'shipped';
            $orderItemId->save();

            $orderTrackingId = OrderTracking::where('order_item_id', $id)->first();
            if($orderTrackingId)
            {
               $orderTrackingId->user_id = $orderTrackingId->user_id;
               $orderTrackingId->order_id = $orderTrackingId->order_id;
               $orderTrackingId->product_id = $orderTrackingId->product_id;
               $orderTrackingId->order_item_id = $orderItemId->id;
               $orderTrackingId->shipped_time = $orderTrackingId->updated_at;
               $orderTrackingId->update();
            }
        }


        return redirect()->back()->with('message', 'Your status has been updated successfully!');
    }
    


    public function productDelivered(Request $request, $id)
    {
        $orderItemId = OrderItem::find($id);
        

        if($orderItemId)
        {
            $orderItemId->delivered = 'delivered';
            $orderItemId->tracking_status = 'delivered';
            $orderItemId->save();

            $orderTrackingId = OrderTracking::where('order_item_id', $id)->first();
            if($orderTrackingId)
            {
               $orderTrackingId->user_id = $orderTrackingId->user_id;
               $orderTrackingId->order_id = $orderTrackingId->order_id;
               $orderTrackingId->product_id = $orderTrackingId->product_id;
               $orderTrackingId->order_item_id = $orderItemId->id;
               $orderTrackingId->delivered_time = $orderTrackingId->updated_at;
               $orderTrackingId->update();
            }
        }

        return redirect()->back()->with('message', 'Your status has been updated successfully!');

    }

//product upload  new code


   public function insert_product_wears(Request $request)
{
    // return ProductWear::all();
    if(Auth::check()) { 
        $product = new Product;
        $product->name = $request->name;
        $product->vendortype = $request->vendortype;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->product_details = $request->product_details;
        $product->brand = $request->brand;
        $product->category_id = $request->category;
        $product->subcategory = $request->subcategory;
        $product->status = 'active';
        $product->vendor_id = Auth::id();
        $product->save();

        $colors = $request->input('colorName');
        $sizeNames = $request->input('sizeName');
        $original_prices = $request->input('original_price');
        $selling_prices = $request->input('selling_price');
        $quantities = $request->input('quantity');

        foreach($colors as $key => $colorName) {
            $color = new ProductWear;
            $color->colorName = $colorName; 
            $color->sizeName = $sizeNames[$key];
            $color->original_price = $original_prices[$key];
            $color->selling_price = $selling_prices[$key];
            $color->quantity = $quantities[$key];
            $color->product_id = $product->id;

            if ($request->hasFile('image.' . $key)) {
                $file = $request->file('image.' . $key);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . $key . '.' . $extension;
                $file->move('upload/products/', $filename);
                $color->image = $filename;
            }

            $color->save();
        }

        if ($request->hasFile('images')) {
            $uploadPath = 'upload/products/';
            $i = 1;
            foreach ($request->file('images') as $file) {
                if ($file) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . $i++ . '.' . $extension;
                    $file->move($uploadPath, $fileName);
                    $finalImagePathName = $fileName;
                    ProductImage::create([
                        'product_id' => $product->id, // You might want to use the correct product ID here
                        'images' => $finalImagePathName,
                    ]);
                }
            }
        }



        return back()->with(['message' => 'Products created successfully']);
    } else {
        return redirect('admin')->with('status', 'You are not allowed to access');
    }
  }


  
        public function insert_product_cosmetic(Request $request)
        {
            try {
                if (Auth::check()) {
                    $product = new Product;
                    $product->name = $request->name;
                    $product->vendortype = $request->vendortype;
                    $product->small_description = $request->small_description;
                    $product->description = $request->description;
                    $product->product_details = $request->product_details;
                    $product->brand = $request->brand;
                    $product->category_id = $request->category;
                    $product->subcategory = $request->subcategory;
                    $product->status = 'active';
                    $product->vendor_id = Auth::id();
                    $product->save();

                    $colors = $request->input('colorName');
                    $sizeNames = $request->input('sizeName');
                    $original_prices = $request->input('original_price');
                    $selling_prices = $request->input('selling_price');
                    $quantities = $request->input('quantity');

                    foreach ($colors as $key => $colorName) {
                        $color = new ProductWear;
                        $color->colorName = $colorName;

                        $color->original_price = $original_prices[$key];
                        $color->selling_price = $selling_prices[$key];
                        $color->quantity = $quantities[$key];
                        $color->product_id = $product->id;

                        if ($request->hasFile('image.' . $key)) {
                            $file = $request->file('image.' . $key);
                            $extension = $file->getClientOriginalExtension();
                            $filename = time() . '_' . $key . '.' . $extension;
                            $file->move('upload/products/', $filename);
                            $color->image = $filename;
                        }
                        $color->save();
                    }

                     if ($request->hasFile('images')) {
                        $uploadPath = 'upload/products/';
                        $i = 1;
                        foreach ($request->file('images') as $file) {
                            if ($file) {
                                $extension = $file->getClientOriginalExtension();
                                $fileName = time() . $i++ . '.' . $extension;
                                $file->move($uploadPath, $fileName);
                                $finalImagePathName = $fileName;
                                ProductImage::create([
                                    'product_id' => $product->id, // You might want to use the correct product ID here
                                    'images' => $finalImagePathName,
                                ]);
                            }
                        }
                    }


                    return back()->with(['message' => 'Nike products created successfully']);
                } else {
                    return redirect('admin')->with('status', 'You are not allowed to access');
                }
            } catch (\Exception $e) {
                return back()->with(['error' => $e->getMessage()]);
            }
        }




        public function insert_product_Grocery(Request $request)
        {
         
        if(Auth::check()) { 
        $product = new Product;
        $product->name = $request->name;
        $product->vendortype = $request->vendortype;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->product_details = $request->product_details;
        $product->brand = $request->brand;
        $product->category_id = $request->category;
        $product->subcategory = $request->subcategory;
        $product->status = 'active';
        $product->vendor_id = Auth::id();
        $product->save();

            $productColor = new ProductWear;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension; 
                $file->move('upload/products/', $filename);
                $productColor->image = $filename; 
            }

            $productColor->original_price = $request->input('original_price');
            $productColor->selling_price = $request->input('selling_price');
            $productColor->quantity = $request->input('quantity');
            $productColor->product_id = $product->id;

            $productColor->save();

            if ($request->hasFile('images')) {
                        $uploadPath = 'upload/products/';
                        $i = 1;
                        foreach ($request->file('images') as $file) {
                            if ($file) {
                                $extension = $file->getClientOriginalExtension();
                                $fileName = time() . $i++ . '.' . $extension;
                                $file->move($uploadPath, $fileName);
                                $finalImagePathName = $fileName;
                                ProductImage::create([
                                    'product_id' => $product->id, // You might want to use the correct product ID here
                                    'images' => $finalImagePathName,
                                ]);
                            }
                        }
                    }

            return back()->with(['message' => 'Products created successfully']);
          }else {

          return redirect('admin')->with('status', 'You are not allowed to access');
         }

        }



       public function insert_product_Furniture(Request $request)
        {
            if(Auth::check()) { 
            $product = new Product;
            $product->name = $request->name;
            $product->vendortype = $request->vendortype;
            $product->small_description = $request->small_description;
            $product->description = $request->description;
            $product->product_details = $request->product_details;
            $product->brand = $request->brand;
            $product->category_id = $request->category;
            $product->subcategory = $request->subcategory;
            $product->status = 'active';
            $product->vendor_id = Auth::id();
            $product->save();

            $productFurniture = new ProductWear; 

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension; 
                $file->move('upload/products/', $filename);
                $productFurniture->image = $filename; 
            }
            
            $productFurniture->original_price = $request->input('original_price');
            $productFurniture->selling_price = $request->input('selling_price');
            $productFurniture->quantity = $request->input('quantity');
            $productFurniture->product_id = $product->id;

            $productFurniture->save();


            if ($request->hasFile('images')) {
                        $uploadPath = 'upload/products/';
                        $i = 1;
                        foreach ($request->file('images') as $file) {
                            if ($file) {
                                $extension = $file->getClientOriginalExtension();
                                $fileName = time() . $i++ . '.' . $extension;
                                $file->move($uploadPath, $fileName);
                                $finalImagePathName = $fileName;
                                ProductImage::create([
                                    'product_id' => $product->id, // You might want to use the correct product ID here
                                    'images' => $finalImagePathName,
                                ]);
                            }
                        }
                    }

            return back()->with(['message' => 'Product created successfully']); // Changed 'Products' to 'Product'
        }else {

          return redirect('admin')->with('status', 'You are not allowed to access');
         }

        }



     public function productlistget()
    {
        
         // $products = Product::with(['ProductSpecification'] )->get();

         $products = ProductImage::all();


        return response()->json($products);
    }






}