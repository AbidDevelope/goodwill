<?php

namespace App\Http\Controllers\VendorController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\Brand;

class BrandController extends Controller
{
    public function brand()
    {
        if(Auth::guard('vendor')->check())
        {
            $vendorId = Auth::guard('vendor')->user()->id;
            
            $categories = Categories::all();

            $brands = Brand::where('vendor_id', $vendorId)->paginate(5);
            
            return view('vendor.brands.add_brand', compact('categories', 'brands'));   
        }
    }

    public function addBrand(Request $request)
    {
        if(Auth::guard('vendor')->check())
        {
            $validate = Validator::make($request->all(),[
                'brand' => 'required|unique:brands,brand',
            ]);
            if($validate->fails())
            {
                return redirect()->back()->withErrors($validate)->withInput();
            }
            
            $brands = new Brand();
            $brands->vendor_id = Auth::guard('vendor')->user()->id;
            $brands->category_id = $request->category;
            $brands->brand = $request->brand;
            $brands->save();
    
            return redirect()->back()->with('message', 'Brand Add Successfully!!');
        }
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id); 
        return response()->json([
            'status' => 200,
            'data' => $brand,
        ]);
    }

    public function brandUpdate(Request $request)
    {
        if(Auth::guard('vendor')->check())
        {
            $validate = Validator::make($request->all(),[
                'brand' => 'required|unique:brands,brand',
            ]);
            if($validate->fails())
            {
                return redirect()->back()->withErrors($validate)->withInput();
            }
    
            $brands = Brand::find($request->id);
            $brands->brand = $request->brand;
            $brands->update();
    
            return redirect()->back()->with('message', 'Brand Updated Successfully.');
        }
    }
    
    public function destroy($id)
    {
        if(Auth::guard('vendor')->check())
        {
            $brands = Brand::find($id);
            $brands->delete();
            return redirect()->back()->with('message', 'Brand Deleted Successfully!');
        }
    }
}