<?php

namespace App\Http\Controllers\VendorController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use Session;

class CategoryController extends Controller
{
    public function Category()
    {
        
            $categories = Categories::paginate(5);
            return view('vendor.categories.Category', compact('categories'));
    }

    public function AddCategory(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'category_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|unique:category,name',
        ]);
    
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = new Categories;
        if($request->hasFile('category_image'))
        {
            $destination = "uploads/categoryimage/". $data->category_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move($destination, $fileName);
            $data->category_image = $fileName;
        }
        $data->name = $request->name;
        $data->save();

        return redirect('vendor/category')->with('success', 'Your Category Add Successfully');
    }

    public function category_edit($id)
    {
        $category_item = Categories::find($id);
        return response()->json([
            'status' => 200,
            'data' => $category_item,
        ]);
    }

    public function category_update(Request $request)
    {
       $validate = Validator::make($request->all(),[
            
          'name' => 'required|unique:category,name',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $category_item = Categories::find($request->id);
        $category_item->name = $request->name;
        $category_item->save();
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $del = Categories::find($id);
        $del->delete();
        return redirect()->back()->with('success', 'Category Successfully Deleted!');
    }
}