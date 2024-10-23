<?php

namespace App\Http\Controllers\VendorController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\ProductImage;
use App\Models\SubCategories;


class ProductController extends Controller
{
  
    public function product()
    {
        $brands = Brand::orderBy('brand', 'asc')->get();
        $categories = Categories::orderBy('name', 'asc')->get();
        return view('vendor.products.add_product', compact('brands', 'categories'));
    }

     public function fetch_Scubcategory($category_id =null)
     {
        $subcategory = SubCategories::where('category_id', $category_id)->orderBy('subcategory', 'asc')->get();
        return response()->json([
            'status' => true,
            'subcategory' => $subcategory,
        ]);
     }

     public function fetch_brand($category_id =null)
     {
        $brand = Brand::where('category_id', $category_id)->orderBy('brand', 'asc')->get();
        return response()->json([
            'status' => true,
            'brand' => $brand,
        ]);
     }
    
     public function addproduct(Request $request)
     {
         if (Auth::guard('vendor')->check()) {

             $validator = Validator::make($request->all(), [
                 'vendortype' => 'required|max:255',
                 'image' => 'required|mimes:jpg,png,jpeg|max:2048',
                 'name' => 'required|max:255',
                 'subcategory' => 'required|max:255',
                 'original_price' => 'required|max:255',
                 'selling_price' => 'required|max:255',
                 'quantity' => 'required|max:255',
                 'trending' => 'required|max:255',
                 'status' => 'required|max:255',
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
                $Product->meta_keyword = $request->input('meta_title');
                $Product->meta_description = $request->input('meta_title');
                $Product->vendor_id = Auth::guard('vendor')->user()->id;
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
                
            return redirect()->back()->with('message', 'Your Product Added Successfully.!!.');
         }
        return redirect()->route('vendor.login')->with('error', 'Please log in as a vendor to add a product.');
    }
     
    
    public function productlist()
    {
  
        if(Auth::guard('vendor')->check())
        {
            $vendorId = Auth::guard('vendor')->user()->id;

            $category = Categories::with('SubCategory')->get();

            $product = Product::where('vendor_id', $vendorId, 'asc')->with('Category')->paginate(5);

            return view('vendor.products.product_list', compact('category', 'product'));
        }
    }

    
    public function details($id)
    {
        
            $product = Product::find($id);
            return view('vendor.products.product_view', compact('product'));  
    } 


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Categories::all();
        return view('vendor.products.product_edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
      if(Auth::guard('vendor')->check())
      {
        $validator = Validator::make($request->all(), [
            'vendortype' => 'required|max:255',
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required|max:255',
            'selling_price' => 'required|max:255',
            'quantity' => 'required|max:255',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

            $Product = Product::find($id);
            $Product->vendortype = $request->input('vendortype');
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $fileName = time(). '.' . $extenstion;
                $file->move('upload/products/', $fileName);
                $Product->image = $fileName;
            }
            $Product->name = $request->input('name');
            $Product->slug = $request->input('slug');
            $Product->small_description = $request->input('small_description');
            $Product->description = $request->input('description');
            $Product->original_price = $request->input('original_price');
            $Product->selling_price = $request->input('selling_price');
            $Product->quantity = $request->input('quantity');
            $Product->meta_title = $request->input('meta_title');
            $Product->meta_keyword = $request->input('meta_title');
            $Product->meta_description = $request->input('meta_title');
            $Product->save();

            return redirect()->route('vendor/product_list')->with('message', 'Product Successfully Update.');
        } 
             return redirect()->route('vendor.login')->with('error', 'Please log in as a vendor to add a product.');
        }


        public function destroyImage($product_image_id)
        {
        $productImage = ProductImage::find($product_image_id);
        if(File::exists($productImage->image))
        {
            File::delete($productImage->image);
        }
        $productImage->delete();

        return redirect()->back()->with('message', 'Products Images Deleted Successfully.');
        }


        public function destroy($id)
        {
            $product = Product::find($id);
            if($product->productImages())
            {
                foreach($product->productImages() as $image)
                {
                    if(File::exists($image->image))
                    {
                        File::delete($image->image);
                    }
                }
            }
            $product->delete();

            return redirect()->back()->with('success', 'Product Successfully Deleted !');
        }
}