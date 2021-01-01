<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::latest()->get();
        return view('backend.admin.tag.index', compact('tags'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:tags',
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

        Toastr::success('Successfully added Tag 😍', '', [
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
        $tag = Tag::find($request->id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

        Toastr::success('Successfully update Tag 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return back();

    }
    public function published($id)
    {
        $skill = Tag::findOrfail($id);
        $skill->status = 1;
        $skill->save();
        Toastr::success('Successfully published Tag 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return back();

    }
    public function unpublished($id)
    {
        $skill = Tag::findOrfail($id);
        $skill->status = 2;
        $skill->save();
        Toastr::success('Successfully unpublished Tag 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return back();

    }

}
