<?php

namespace App\Http\Controllers;

use App\Models\Add1;
use App\Models\Add2;
use App\Models\Admin\Follow;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories1 = Category::where('status', 1)->take(4)->get();
        $categories2 = Category::where('status', 1)->take(3)->orderBy('id', 'desc')->get();
        $categories3 = Category::where('status', 1)->take(3)->skip(3)->orderBy('id', 'desc')->get();
        $post1 = Post::latest()->where('is_approved', 1)->where('status', 1)->take(10)->skip(2)->get();
        $post2 = Post::latest()->where('is_approved', 1)->where('status', 1)->take(2)->get();
        $post3 = Post::latest()->where('is_approved', 1)->where('status', 1)->skip(2)->take(2)->get();
        $post4 = Category::find(4)->posts()->latest()->take(4)->get();
        $latest = Post::latest()->where('is_approved', 1)->where('status', 1)->take(6)->get();
        $popular_posts = Post::where('is_approved', 1)
            ->where('status', 1)
            ->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())
            ->orderBy('view_count', 'desc')
            ->take(5)
            ->get();
        return view('frontend.home.index', compact('post1', 'post2', 'post3', 'post4', 'categories1', 'categories2', 'categories3', 'latest', 'popular_posts'));

    }

    public function details($slug)
    {
        $post = Post::where('slug', $slug)->where('is_approved', 1)->where('status', 1)->first();
        $previous_record = Post::where('id', '<', $post->id)->where('is_approved', 1)->where('status', 1)->orderBy('id', 'desc')->first();
        $next_record = Post::where('id', '>', $post->id)->where('is_approved', 1)->where('status', 1)->orderBy('id', 'desc')->first();
        $latest = Post::latest()->where('is_approved', 1)->where('status', 1)->take(4)->get();
        $follow = Follow::where('status',1)->get();
        $popular_posts = Post::where('is_approved', 1)
            ->where('status', 1)
            ->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())
            ->orderBy('view_count', 'desc')
            ->take(4)
            ->get();

        $blogKey = 'blog_' . $post->id;
        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey, 1);
        }
        return view('frontend.home.details', compact('post', 'previous_record', 'next_record', 'latest', 'popular_posts','follow'));
    }

    public function category($slug)
    {
        $cat = Category::where('slug', $slug)->first();
        $category_4 = $cat->posts()->where('is_approved', 1)->where('status', 1)->take(6)->get();
        $category_all = $cat->posts()->where('is_approved', 1)->where('status', 1)->paginate(5);
        return view('frontend.category.category', compact('category_4', 'cat', 'category_all'));
    }
}
