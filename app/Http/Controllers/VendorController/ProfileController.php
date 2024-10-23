<?php

namespace App\Http\Controllers\VendorController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function Profile()
    {
        return view('vendor.profile');
    }

    public function Profile_Update(Request $request, $id)
    {

        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'mobile' => 'required',
            'profile_image' => 'required',
            'password' => 'required|min:6',
        ]);



        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = $request->password;
        $destination = 'upload/' . $user->profile_image;
        if ($request->hasFile('profile_image')) :
            if (File::exists($destination)) :
                File::delete($destination);
            endif;
            $image = $request->file('profile_image');
            $ext = $image->extension();
            $file = time() . '.' . $ext;
            $image->move('upload/', $file);
            $user->profile_image = $file;
        endif;
        $user->save();

        return redirect('profile')->with('success', 'Profile has been updated successfully!');
    }
}