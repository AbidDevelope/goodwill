<?php

namespace App\Http\Controllers\VendorController;

use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function SubcategoryView()
    {
        //$categories = Categories::with('subcategory')->get();
        $categories = Categories::orderBy('name', 'asc')->get();
        $subcategories = SubCategories::paginate(5);
        return view('vendor.categories.subcategory', compact('categories', 'subcategories'));
    }

    public function Subcategory(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'category_id' => 'required',
            'subcategory' => 'required|unique:subcategory,subcategory',
        ]);
       
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $subcategory = new SubCategories;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory = $request->subcategory;
        $subcategory->save();

        return redirect('vendor/subcategory')->with('success', 'Your Sub Category Successfully Add!');
    }

    public function subcategory_edit($id)
    {
        $subcategory = SubCategories::find($id);
        return response()->json([
            'status' => 200,
            'data' => $subcategory,
        ]);
    }

    public function subcategory_update(Request $request)
    {
         $validate = Validator::make($request->all(), [
               'subcategory' => 'required|unique:subcategory,subcategory',
         ]);

         if($validate->fails())
         {
            return redirect()->back()->withErrors($validate)->withInput();
         }

        $subcategories = SubCategories::find($request->id);
        $subcategories->subcategory = $request->input('subcategory');
        $subcategories->save();
        return redirect()->back()->with('success', 'Subcategories Successfully Updated.');
    }

    public function destroy($id)
    {
        $subcategory = SubCategories::find($id);
        $subcategory->delete();
        return back()->with('success', 'Your Data Successfully Deleted!');
    }
}
