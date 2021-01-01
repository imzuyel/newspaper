<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class SettingController extends Controller
{
        public function index()
    {
        return view('backend.author.admin');
    }
    public function updateProfile(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            'email' => 'required|email',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        $user = User::findOrFail(Auth::id());
        if ($image) {
            if (file_exists($user->image)) {
                unlink($user->image);
            }
            $user->image = $this->uploadeImage($request);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->slug = $slug;
        $user->about = $request->about;
        $user->save();

        Toastr::success('Your Profile has beeb Succesfully Update', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
        ]);
        return redirect()->route('author.settings');
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Your Password  has beeb Succesfully Update', '', [
                    "positionClass" => "toast-top-right",
                    "closeButton" => true,
                    "progressBar" => true,
                ]);
                Auth::logout();
                return redirect()->back();
            } else {
                Toastr::error('New Password can not same as old password', '', [
                    "positionClass" => "toast-top-right",
                    "closeButton" => true,
                    "progressBar" => true,
                ]);
                return redirect()->back();
            }
        } else {
            Toastr::error('Current Password does not match', '', [
                "positionClass" => "toast-top-right",
                "closeButton" => true,
                "progressBar" => true,
            ]);
            return redirect()->back();
        }
    }

    protected function uploadeImage($request)
    {
        $file = $request->file("image");
        // Get Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'backend/images/profile/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(500, 500)->save($imageUrl);
        return $imageUrl;
    }
}
