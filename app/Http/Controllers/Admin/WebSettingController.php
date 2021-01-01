<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class WebSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::all();
        return view('backend.admin.setting.index', compact('setting'));

    }
    public function store(Request $request)
    {
        $request->validate([
            "image" => "required|",
            "about" => "required|string",
            "address" => "required|string",
            "phone" => "required|string",
            "email" => "required|email",
            "copyright" => "required|string",
        ]);

        $setting = new Setting();
        $setting->image = $this->uploadeImage($request);
        $setting->about = $request->about;
        $setting->address = $request->address;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->copyright = $request->copyright;
        $setting->save();
        Toastr::success('Website setting save successfully', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $request->validate([
            "about" => "required|string",
            "address" => "required|string",
            "phone" => "required|string",
            "email" => "required|email",
            "copyright" => "required|string",
        ]);
        $setting = Setting::findOrFail($request->id);
        $setting->about = $request->about;
        $setting->address = $request->address;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->copyright = $request->copyright;
        $image = $request->file('image');
        if ($image) {
            if (file_exists($setting->image)) {
                unlink($setting->image);
            }
            $setting->image = $this->uploadeImage($request);
        }

        $setting->save();
        Toastr::success('Website setting update successfully', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
        ]);

        return redirect()->back();

    }

    protected function uploadeImage($request)
    {
        $file = $request->file("image");
        // Get Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'backend/images/icon/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(193, 45)->save($imageUrl);
        return $imageUrl;
    }
}
