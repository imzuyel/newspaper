<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('backend.admin.suscriber.suscriber', compact('subscribers'));
    }
    public function delete($id)
    {
        Subscriber::findOrFail($id)->delete();
        Toastr::success('Suscriber deleted successfully 😍', 'info', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,

        ]);

        return redirect()->back();
    }
}
