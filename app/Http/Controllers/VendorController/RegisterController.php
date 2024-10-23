<?php

namespace App\Http\Controllers\VendorController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;

class RegisterController extends Controller
{
    public function registerView()
    {
        return view('vendor.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:vendors|email',
            'mobile' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
            'password' => 'required|min:6'
        ]);

        $user = new Vendor;
        $user->file = $request->file;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('upload/', $fileName);
            $user->file = $fileName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->save();


        return redirect('vendor/login')->with('success', 'You Have Successfully Registered. Please Login!');
    }

    public function dashboard(Request $request)
    {
        $data = array();
        if (Session::has('id')) {
            $data = Vendor::where(['email' => $request->email])->first();
        }
        return view('vendor.dashboard', compact('data'));
        Auth::login($data);
    }
}
