<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Follow;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index()
    {
        $folowers = Follow::all();
        return view('backend.admin.follow.index', [
            'folowers' => $folowers,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            "link" => "required|string",
            "icon" => "required",
        ]);
        $Follow = new Follow();
        $Follow->link = $request->link;
        $Follow->icon = $request->icon;
        $Follow->save();
        if ($Follow->save()) {
            Toastr::success('Successfully added follow 😍', '', [
                "positionClass" => "toast-top-right",
                "closeButton" => true,
                "progressBar" => true,
                'showMethod' => 'slideDown',
            ]);

            return redirect()->route('admin.flow');
        }
    }
    public function update(Request $request)
    {
        $request->validate([
            "link" => "required|string",
            "icon" => "required",
        ]);
        $Follow = Follow::findOrFail($request->id);
        $Follow->link = $request->link;
        $Follow->icon = $request->icon;
        $Follow->save();
        if ($Follow->save()) {
            Toastr::success('Successfully update follow 😍', '', [
                "positionClass" => "toast-top-right",
                "closeButton" => true,
                "progressBar" => true,
                'showMethod' => 'slideDown',
            ]);

            return redirect()->route('admin.flow');

        }
    }
    public function published($id)
    {
        $Follow = Follow::findOrfail($id);
        $Follow->status = 1;
        $Follow->save();
        Toastr::success('Successfully Published follow 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);

        return redirect()->route('admin.flow');

    }
    public function unpublished($id)
    {
        $Follow = Follow::findOrfail($id);
        $Follow->status = 2;
        $Follow->save();
        Toastr::success('Successfully Unpublished follow 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);

        return redirect()->route('admin.flow');

    }
    public function delete($id)
    {
        Follow::findOrfail($id)->delete();

        Toastr::error('Successfully  follow deleted', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);

        return redirect()->route('admin.flow');

    }
}
