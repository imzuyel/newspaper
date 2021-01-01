<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.admin.post.index', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.admin.post.show', compact('categories', 'tags', 'post'));
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.admin.post.create', compact('categories', 'tags'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|unique:posts',
            'image' => 'required|',
            'categories' => 'required|',
            'tags' => 'required|',
        ]);
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $this->make_slug($request->title);
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();
        $post->image = $this->uploadeImage_584($request);
        $this->uploadeImage_371($request);
        $this->uploadeImage_270($request);
        $this->uploadeImage_125($request);
        $this->uploadeImage_124($request);
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        Toastr::success('Successfully added Category 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return redirect()->route('admin.post.index');

    }
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.admin.post.edit', compact('categories', 'tags', 'post'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'categories' => 'required|',
            'tags' => 'required|',
        ]);

        $post = Post::find($request->id);
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = true;

        $post->body = $request->body;
        $post->slug = $this->make_slug($request->title);
        $file = $request->file("image");
        if ($file) {
            if (file_exists('backend/images/post/584' . '/' . $post->image)) {
                unlink('backend/images/post/584' . '/' . $post->image);

            }
            if (file_exists('backend/images/post/371' . '/' . $post->image)) {
                unlink('backend/images/post/371' . '/' . $post->image);

            }

            if (file_exists('backend/images/post/270' . '/' . $post->image)) {
                unlink('backend/images/post/270' . '/' . $post->image);

            }

            if (file_exists('backend/images/post/125' . '/' . $post->image)) {
                unlink('backend/images/post/125' . '/' . $post->image);

            }

            if (file_exists('backend/images/post/124' . '/' . $post->image)) {
                unlink('backend/images/post/124' . '/' . $post->image);

            }

            $post->image = $this->uploadeImage_584($request);
            $this->uploadeImage_371($request);
            $this->uploadeImage_270($request);
            $this->uploadeImage_125($request);
            $this->uploadeImage_124($request);

        }
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        $post->save();
        Toastr::success('Successfully update Post 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return redirect()->route('admin.post.index');

    }
    public function published($id)
    {
        $category = Category::findOrfail($id);
        $category->status = true;
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
        $category->status = false;
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
        $post = Post::findOrfail($id);

        if (file_exists('backend/images/post/584' . '/' . $post->image)) {
            unlink('backend/images/post/584' . '/' . $post->image);

        }
        if (file_exists('backend/images/post/371' . '/' . $post->image)) {
            unlink('backend/images/post/371' . '/' . $post->image);

        }

        if (file_exists('backend/images/post/270' . '/' . $post->image)) {
            unlink('backend/images/post/270' . '/' . $post->image);

        }

        if (file_exists('backend/images/post/125' . '/' . $post->image)) {
            unlink('backend/images/post/125' . '/' . $post->image);

        }

        if (file_exists('backend/images/post/124' . '/' . $post->image)) {
            unlink('backend/images/post/124' . '/' . $post->image);

        }
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::warning('Successfully deleted post 😍', '', [
            "positionClass" => "toast-top-right",
            "closeButton" => true,
            "progressBar" => true,
            'showMethod' => 'slideDown',
        ]);
        return back();

    }

    public function pending()
    {
        $posts = Post::where('is_approved', false)->get();
        return view('backend.admin.post.pending', compact('posts'));
    }

    public function approve($id)
    {

        $post = Post::find($id);
        if ($post->is_approved == false) {
            $post->is_approved = true;
            $post->save();

            // Notification to User
            // $post->user->notify(new newPostApprove($post));

            Toastr::success('Post Approved Successfully 😍', 'Success', [
                "positionClass" => "toast-top-right",
                "closeButton" => true,
                "progressBar" => true,

            ]);
        } else {
            Toastr::info('Post Already Approved 😍', 'info', [
                "positionClass" => "toast-top-right",
                "closeButton" => true,
                "progressBar" => true,

            ]);
        }
        return redirect()->back();
    }

    protected function uploadeImage_584($request)
    {
        $file = $request->file("image");
        // Get Name
        $get_imageName = date('mdYH') . $file->getClientOriginalName();
        // Get Name
        $directory = 'backend/images/post/584/';
        // Image Url
        $imageUrl = $get_imageName;
        $imageUrl1 = $directory . $get_imageName;

        // $file->move($directory, $imageUrl);
        Image::make($file)->resize(584, 444)->save($imageUrl1);
        return $imageUrl;
    }

    protected function uploadeImage_371($request)
    {
        $file = $request->file("image");
        // Get Name
        $get_imageName = date('mdYH') . $file->getClientOriginalName();
        // Get Name
        $directory = 'backend/images/post/371/';
        // Image Url
        $imageUrl1 = $directory . $get_imageName;

        // $file->move($directory, $imageUrl);
        $up = Image::make($file)->resize(371, 221)->save($imageUrl1);
        return $up;
    }

    protected function uploadeImage_270($request)
    {
        $file = $request->file("image");
        // Get Name
        $get_imageName = date('mdYH') . $file->getClientOriginalName();
        // Get Name
        $directory = 'backend/images/post/270/';
        // Image Url
        $imageUrl = $directory . $get_imageName;

        // $file->move($directory, $imageUrl);
        $up = Image::make($file)->resize(270, 205)->save($imageUrl);
        return $up;
    }
    protected function uploadeImage_125($request)
    {
        $file = $request->file("image");
        // Get Name
        $get_imageName = date('mdYH') . $file->getClientOriginalName();
        // Get Name
        $directory = 'backend/images/post/125/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);
        $up = Image::make($file)->resize(125, 151)->save($imageUrl);
        return $up;
    }
    protected function uploadeImage_124($request)
    {
        $file = $request->file("image");
        // Get Name
        $get_imageName = date('mdYH') . $file->getClientOriginalName();
        // Get Name
        $directory = 'backend/images/post/124/';
        // Image Url
        $imageUrl = $directory . $get_imageName;

        // $file->move($directory, $imageUrl);
        $up = Image::make($file)->resize(124, 94)->save($imageUrl);
        return $up;
    }

    public function make_slug($string)
    {
        return preg_replace('/\s+/u', '-', trim($string));
    }
}
