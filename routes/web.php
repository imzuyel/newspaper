<?php

use App\Http\Controllers\Add1Controller;
use App\Http\Controllers\Add2Controller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FollowController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController as setting;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\Admin\WebSettingController as websitesetting;
use App\Http\Controllers\Author\SettingController as settingauthor;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\HomeController;
use App\Models\Add1;
use App\Models\Add2;
use App\Models\Admin\Follow;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting as about;
use Carbon\Carbon;
use EasyBanglaDate\Types\BnDateTime;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
date_default_timezone_set('Asia/Dhaka');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/details/{slug}', [HomeController::class, 'details'])->name('home.details');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('home.category');

// Admin
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');

    // Tag
    Route::get('tag', [TagController::class, 'index'])->name('tag.index');
    Route::post('tag/store', [TagController::class, 'store'])->name('tag.store');
    Route::post('tag/update', [TagController::class, 'update'])->name('tag.update');
    Route::get('tag/unpublished/{id}', [TagController::class, 'unpublished'])->name('tag.unpublished');
    Route::get('tag/published/{id}', [TagController::class, 'published'])->name('tag.published');

    // Category
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/unpublished/{id}', [CategoryController::class, 'unpublished'])->name('category.unpublished');
    Route::get('category/published/{id}', [CategoryController::class, 'published'])->name('category.published');
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // Post
    Route::get('post', [PostController::class, 'index'])->name('post.index');
    Route::get('post/show/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('post/store', [PostController::class, 'store'])->name('post.store');
    Route::post('post/update', [PostController::class, 'update'])->name('post.update');
    Route::get('post/unpublished/{id}', [PostController::class, 'unpublished'])->name('post.unpublished');
    Route::get('post/published/{id}', [PostController::class, 'published'])->name('post.published');
    Route::get('post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
    Route::get('approve/posts/pending/', [PostController::class, 'pending'])->name('post.pending');
    Route::get('approve/posts/approve/{id}', [PostController::class, 'approve'])->name('post.approve');

    // Subscriber
    Route::get('subscriber', [App\Http\Controllers\Admin\SubscriberController::class, 'index'])->name('subscriber.index');
    Route::get('subscriber/delete/{id}', [App\Http\Controllers\Admin\SubscriberController::class, 'delete'])->name('subscriber.delete');

    // Setting

    // Setting Controller
    Route::get('settings', [setting::class, 'index'])->name('settings');
    Route::put('profile_update', [setting::class, 'updateProfile'])->name('profile.update');
    Route::put('password_update', [setting::class, 'updatepassword'])->name('password.update');

    // Fllow
    Route::get('/flow', [FollowController::class, 'index'])->name('flow');
    Route::post('/flow/create/store', [FollowController::class, 'store'])->name('flow.store');
    Route::post('/flow/create/update/', [FollowController::class, 'update'])->name('flow.update');
    Route::get('/flow/create/unpublished/{id}', [FollowController::class, 'unpublished'])->name('flow.unpublished');
    Route::get('/flow/create/published/{id}', [FollowController::class, 'published'])->name('flow.published');
    Route::get('/flow/create/delete/{id}', [FollowController::class, 'delete'])->name('flow.delete');

    // Add
    Route::get('/add/tall', [Add1Controller::class, 'index'])->name('add1');
    Route::post('/add/tall/create/store', [Add1Controller::class, 'store'])->name('add1.store');
    Route::post('/add/tall/create/update/', [Add1Controller::class, 'update'])->name('add1.update');
    Route::get('/add/tall/create/unpublished/{id}', [Add1Controller::class, 'unpublished'])->name('add1.unpublished');
    Route::get('/add/tall/create/published/{id}', [Add1Controller::class, 'published'])->name('add1.published');
    Route::get('/add/tall/create/delete/{id}', [Add1Controller::class, 'delete'])->name('add1.delete');

// Add2
    Route::get('/add/sidebar', [Add2Controller::class, 'index'])->name('add2');
    Route::post('/add/sidebar/create/store', [Add2Controller::class, 'store'])->name('add2.store');
    Route::post('/add/sidebar/create/update/', [Add2Controller::class, 'update'])->name('add2.update');
    Route::get('/add/sidebar/create/unpublished/{id}', [Add2Controller::class, 'unpublished'])->name('add2.unpublished');
    Route::get('/add/sidebar/create/published/{id}', [Add2Controller::class, 'published'])->name('add2.published');
    Route::get('/add/sidebar/create/delete/{id}', [Add2Controller::class, 'delete'])->name('add2.delete');

    // Fllow
    Route::get('/setting/website', [websitesetting::class, 'index'])->name('website');
    Route::post('/setting/websitecreate/store', [websitesetting::class, 'store'])->name('website.store');
    Route::post('/setting/websitecreate/update/', [websitesetting::class, 'update'])->name('website.update');

});

// Author
Route::group(['as' => 'author.', 'prefix' => 'author', 'middleware' => ['auth', 'author']], function () {
    Route::get('dashboard', [App\Http\Controllers\Author\DashboardController::class, 'index'])->name('index');

    // Post
    Route::get('post', [App\Http\Controllers\Author\PostController::class, 'index'])->name('post.index');
    Route::get('post/show/{id}', [App\Http\Controllers\Author\PostController::class, 'show'])->name('post.show');
    Route::get('post/create', [App\Http\Controllers\Author\PostController::class, 'create'])->name('post.create');
    Route::get('post/edit/{id}', [App\Http\Controllers\Author\PostController::class, 'edit'])->name('post.edit');
    Route::post('post/store', [App\Http\Controllers\Author\PostController::class, 'store'])->name('post.store');
    Route::post('post/update', [App\Http\Controllers\Author\PostController::class, 'update'])->name('post.update');
    Route::get('post/unpublished/{id}', [App\Http\Controllers\Author\PostController::class, 'unpublished'])->name('post.unpublished');
    Route::get('post/published/{id}', [App\Http\Controllers\Author\PostController::class, 'published'])->name('post.published');
    Route::get('post/delete/{id}', [App\Http\Controllers\Author\PostController::class, 'delete'])->name('post.delete');

    // Setting Controller
    Route::get('settings', [settingauthor::class, 'index'])->name('settings');
    Route::put('profile_update', [settingauthor::class, 'updateProfile'])->name('profile.update');
    Route::put('password_update', [settingauthor::class, 'updatepassword'])->name('password.update');

});

//Ckeditor
Route::post('ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');

// Subscribe
Route::post('/subscriber/store', [App\Http\Controllers\SubscriberController::class, 'store'])->name('subscriber.store');






// Include Post here
view()->composer('frontend.include.menu', function ($view) {
    $categories = Category::where('status', 1)->get();
    $view->with('categories', $categories);
});
view()->composer('frontend.include.header', function ($view) {
    $mydate = new BnDateTime('now', new DateTimeZone('Asia/Dhaka'));
    $view->with('mydate', $mydate);
});

view()->composer('frontend.include.breaking', function ($view) {
    $posts = Post::latest()->where('is_approved', 1)->where('status', 1)->take(6)->get();
    $view->with('posts', $posts);
});

view()->composer('frontend.include.follow', function ($view) {
    $follow = Follow::where('status', 1)->get();
    $view->with('follow', $follow);
});

view()->composer('frontend.include.long_add', function ($view) {
    $add1 = Add1::where('status', 1)->first();
    $view->with('add1', $add1);
});


view()->composer('frontend.include.sidebar_add', function ($view) {
    $add2 = Add2::where('status', 1)->first();
    $view->with('add2', $add2);
});

view()->composer('frontend.include.latest', function ($view) {
    $latest = Post::latest()->where('is_approved', 1)->where('status', 1)->take(6)->get();
    $popular_posts = Post::where('is_approved', 1)
        ->where('status', 1)
        ->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())
        ->orderBy('view_count', 'desc')
        ->take(5)
        ->get();

    $view->with('latest', $latest);
    $view->with('popular_posts', $popular_posts);
});

view()->composer('frontend.include.header', function ($view) {
    $setting = about::first();
    $follow = Follow::where('status', 1)->get();
    $view->with('follow', $follow);
    $view->with('setting', $setting);
});

view()->composer('frontend.include.footer', function ($view) {
    $popular_posts_footer = Post::where('is_approved', 1)
        ->where('status', 1)
        ->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay())
        ->orderBy('view_count', 'desc')
        ->take(3)
        ->get();
    $latest_footer = Post::latest()->where('is_approved', 1)->where('status', 1)->take(3)->get();
    $setting = about::first();
    $view->with('popular_posts_footer', $popular_posts_footer);
    $follow = Follow::where('status', 1)->get();
    $view->with('latest_footer', $latest_footer);
    $view->with('follow', $follow);
    $view->with('setting', $setting);
});
