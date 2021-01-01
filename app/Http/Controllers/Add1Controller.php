<?php

namespace App\Http\Controllers;

use App\Models\Add1;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class Add1Controller extends Controller
{
    public function index()
    {
        $add1 = Add1::all();
        return view('backend.admin.add.lenght.index', [
            'add1' => $add1,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            "link" => "required|string",
            "image" => "required",
        ]);
        $add = new Add1();
        $add->image = $this->uploadeImage($request);
        $add->link = $request->link;
        $add->save();
        if ($add->save()) {
            Toastr::success('Successfully added add banner 😍', '', [
                "positionClass" => "toast-top-right",
                "closeButton" => true,
                "progressBar" => true,
                'showMethod' => 'slideDown',
            ]);

            return redirect()->route('admin.add1');
        }
    }
    public function update(Request $request)
    {
        $request->validate([
            "link" => "required|string",
        ]);
        $add = Add1::findOrFail($request->id);
        $add->link = $request->link;
        $image = $request->file('image');
        if ($image) {
            if (file_exists($add->image)) {
                unlink($add->image);
            }
            $add->image = $this->uploadeImage($request);
        }
        $add->save();

        if ($add->save()) {
            Toastr::success('Successfully update add banner 😍', '', [
                "positionClass" => "toast-top-right",
                "closeButton" => true,
                "progressBar" => true,
                'showMethod' => 'slideDown',
            ]);

            return redirect()->route('admin.add1');

        }
    }
    public function published($id)
    {
        $add = Add1::findOrfail($id);
        $add->status = 1;
        $add->save();
        Toastr::success('Successfully Published add 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);

        return redirect()->route('admin.add1');

    }
    public function unpublished($id)
    {
        $add = Add1::findOrfail($id);
        $add->status = 2;
        $add->save();
        Toastr::success('Successfully Unpublished add 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);

        return redirect()->route('admin.add1');

    }
    public function delete($id)
    {
        Add1::findOrfail($id)->delete();

        Toastr::error('Successfully  add deleted', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);

        return redirect()->route('admin.add1');

    }

    protected function uploadeImage($request)
    {
        $file = $request->file("image");
        // Get Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'backend/images/add/tall_add/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(734, 90)->save($imageUrl);
        return $imageUrl;
    }
}
