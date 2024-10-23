<?php

namespace App\Http\Controllers\VendorController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('vendor.login');
    }

        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $vendor = Vendor::where('email', $request->email)->first();

            if ($vendor) {
           
                if ($request->password === $vendor->password) {
                    // Password matches, log in the vendor
                    Auth::guard('vendor')->login($vendor);
                    $request->session()->put('id', $vendor->id);
                    return redirect()->route('vendor/dashboard')->with('success', 'Successfully Logged In');
                } else {
                    // Password doesn't match
                    return back()->with('error', 'Oops! You have entered invalid credentials');
                }
            } else {
                // Vendor with the provided email not found
                return back()->with('error', 'This Email is Not Registered');
            }
        }



    public function logout()
    {
        Auth::guard('vendor')->logout();
        if (Session::has('id')) {
            Session::pull('id');
            return redirect('vendor/login')->with('success', 'You have successfully logged out!');
        }
    }
}