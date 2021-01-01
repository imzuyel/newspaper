<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(){
    $pendding_post=Post::where('is_approved',false)->get();
    $tags=Tag::all();
    $categories=Category::all();
    $subscriber=Subscriber::all();
    $setting = Setting::all();

    return view('backend.admin.admindashboard',compact('pendding_post','subscriber','tags','categories','setting'));
  }
}
