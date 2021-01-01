<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.admin.category.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:categories',
            'image' => 'required|',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $this->make_slug($request->name);
        $category->image = $this->uploadeImage($request);
        $category->save();

        Toastr::success('Successfully added Category 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return back();

    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $category = Category::find($request->id);

        $category->name = $request->name;
        $category->slug = $this->make_slug($request->name);
        $file = $request->file("image");
        if ($file) {
            if (file_exists($category->image)) { //If it exits, delete it from folder
                unlink($category->image);
            }
            $category->image = $this->uploadeImage($request);
        }

        $category->save();
        Toastr::success('Successfully update Category 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return back();

    }
    public function published($id)
    {
        $category = Category::findOrfail($id);
        $category->status = 1;
        $category->save();
        Toastr::success('Successfully published Category 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return back();

    }
    public function unpublished($id)
    {
        $category = Category::findOrfail($id);
        $category->status = 2;
        $category->save();

        Toastr::success('Successfully unpublished Ctegory 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return back();

    }
    public function delete($id)
    {
        $category = Category::findOrfail($id);

        if (file_exists($category->image)) { //If it exits, delete it from folder
            unlink($category->image);
        }
        $category->delete();
        Toastr::warning('Successfully deleted Ctegory 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return back();

    }

    protected function uploadeImage($request)
    {
        $file = $request->file("image");
        // Get Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'backend/images/category/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(770, 294)->save($imageUrl);
        return $imageUrl;
    }

    public function make_slug($string)
    {
        return preg_replace('/\s+/u', '-', trim($string));
    }

}
