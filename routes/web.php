<?php

use App\Http\Controllers\Dashboard\Blog\AuthorController;
use App\Http\Controllers\Dashboard\Blog\SponsorController;
use App\Http\Controllers\Dashboard\Blog\CategoryController;
use App\Http\Controllers\Dashboard\Blog\PostController;
use App\Http\Controllers\Dashboard\Blog\TagController;
use App\Http\Controllers\Dashboard\CountryStateCityController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DonationsController;
use App\Http\Controllers\Front\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\NewsletterController;
use App\Http\Controllers\Front\SermonsController;
use App\Http\Controllers\RolePermission\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Dashboard\LightDark;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/clear', function() {
Artisan::call('cache:clear');
Artisan::call('route:clear');
Artisan::call('config:clear');
Artisan::call('view:clear');
return "Cache is cleared";
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', 'HomeController@index')->name('home');

//************************************ FRONT PAGES ******************************** */

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/about', [IndexController::class, 'about'])->name('about');


//Route::get('/events', [EventsController::class, 'index']);
//Route::get('/events/details/{id}', [EventsController::class, 'index'])
//-> name('activity.details');

//STATE COUNTRY CITY
Route::post('/get-states-by-country', [CountryStateCityController::class, 'getState']);
Route::post('/get-cities-by-state', [CountryStateCityController::class, 'getCity']);

//EVENT-VIEW-FRONT
Route::get('events', [EventsController::class, 'blog'])->name('event.index');
Route::get('post-events/{slug}', [EventsController::class, 'post'])->name('event.post');

Route::get('category-events/{slug}', [EventsController::class, 'category'])->name('event.category');
Route::get('tag-event/{slug}', [EventsController::class, 'tag'])->name('event.tag');
Route::post('comment-events/{post_id}', [EventsController::class, 'comment'])->name('comment.submit');
Route::get('reply-events', [EventsController::class, 'reply'])->name('reply.submit');
Route::get('like-events/{slug}', [EventsController::class, 'like'])->name('event.like');
Route::get('dislike-events/{slug}', [EventsController::class, 'dislike'])->name('event.dislike');
/*********************** */
//estar pendiente para quedar claro
Route::get('categorie-events/{slug}', [EventsController::class, 'categories'])->name('event.categories');
Route::get('tag-events/{slug}', [EventsController::class, 'tag'])->name('event.tags');
//******************************** */

/*Route::get('/events/details/{id}', [EventsController::class, 'viewdetails'])
-> name('events.details');
*/


//SERMON-VIEW-FRONT
Route::get('sermons', [SermonsController::class, 'blog'])->name('sermon.index');
Route::get('post-sermons/{slug}', [SermonsController::class, 'post'])->name('sermon.post');
Route::get('category-sermons/{slug}', [SermonsController::class, 'category'])->name('sermon.category');
Route::get('tag-sermon/{slug}', [SermonsController::class, 'tag'])->name('sermon.tag');
Route::post('comment-sermons/{post_id}', [SermonsController::class, 'comment'])->name('comment.submit');
Route::get('reply-sermons', [SermonsController::class, 'reply'])->name('reply.submit');
Route::get('like-sermons/{slug}', [SermonsController::class, 'like'])->name('sermon.like');
Route::get('dislike-sermons/{slug}', [SermonsController::class, 'dislike'])->name('sermon.dislike');
/*********************** */
//estar pendiente para quedar claro
Route::get('categorie-sermons/{slug}', [SermonsController::class, 'categories'])->name('sermon.categories');
Route::get('tag-sermons/{slug}', [SermonsController::class, 'tag'])->name('sermon.tags');
//******************************** */
/*Route::get('/sermons/details/{id}', [SermonsController::class, 'viewdetails'])
-> name('sermons.details');
*/





//BLOG-VIEW-FRONT
Route::get('/blog', [BlogController::class, 'blog'])->name('blog.index');
Route::get('/post/{slug}', [BlogController::class, 'post'])->name('blog.post');
Route::get('/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/tag-{slug}', [BlogController::class, 'tag'])->name('blog.tag');
Route::post('/comment/{post_id}', [BlogController::class, 'comment'])->name('comment.submit');
Route::get('/reply', [BlogController::class, 'reply'])->name('reply.submit');
Route::get('/like/{slug}', [BlogController::class, 'like'])->name('blog.like');
Route::get('/dislike/{slug}', [BlogController::class, 'dislike'])->name('blog.dislike');


//estar pendiente para quedar claro
Route::get('/categorie/{slug}', [BlogController::class, 'categories'])->name('blog.categories');
Route::get('/tag/{slug}', [BlogController::class, 'tag'])->name('blog.tags');
//******************************** */

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.submit');

Route::get('/donation', [DonationsController::class, 'index']);

Route::get('/contact', [ContactController::class, 'contact']);
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.submit');




Route::get('/home', [HomeController::class, 'index'])->name('home');

//Roles
Route::get('/role', [RoleController::class, 'index'])->name('roles.index');
Route::get('/role/show/{role}', [RoleController::class, 'show'])->name('roles.show');
Route::get('/role/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/role/store', [RoleController::class, 'store'])->name('roles.store');
Route::get('/role/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/role/update/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/role/destroy/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

//TEST
Route::get('/test', function () {
    //return User::get();
    $user = User::find(2);
    //return $user;
    // $user->roles()->sync([2]);
    // return $user->roles;
    // return $user->havePermission('roles.index');
    Gate::authorize('haveaccess', 'roles.show');
    return $user;
});


Route::resource('/user', UserController::class)->except([
    'create', 'store'
])->names('users');



//DASHBOARD
Route::get('/light', [HomeController::class, 'update'])->name('update.light');

//AUTHOR SPONSOR-DASHBOARD
Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('authors/store', [AuthorController::class, 'store'])->name('authors.store');
Route::get('authors/show/{id}', [AuthorController::class, 'show'])->name('authors.show');
Route::get('authors/edit/{id}', [AuthorController::class, 'edit'])->name('authors.edit');
Route::post('authors/update/{id}', [AuthorController::class, 'update'])->name('authors.update');
Route::post('authors/delete/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');

Route::get('sponsors', [SponsorController::class, 'index'])->name('sponsors.index');
Route::get('sponsors/create', [SponsorController::class, 'create'])->name('sponsors.create');
Route::post('sponsors/store', [SponsorController::class, 'store'])->name('sponsors.store');
Route::get('sponsors/show/{id}', [SponsorController::class, 'show'])->name('sponsors.show');
Route::get('sponsors/edit/{id}', [SponsorController::class, 'edit'])->name('sponsors.edit');
Route::post('sponsors/update/{id}', [SponsorController::class, 'update'])->name('sponsors.update');
Route::post('sponsors/delete/{id}', [SponsorController::class, 'destroy'])->name('sponsors.destroy');

//BLOG-DASHBOARD
Route::get('tags_{level}', [TagController::class, 'index'])->name('tags.index');
Route::get('tags_{level}/create', [TagController::class, 'create'])->name('tags.create');
Route::post('tags_blog/store', [TagController::class, 'store'])->name('tags.store');
Route::get('tags_{level}/{id}', [TagController::class, 'show'])->name('tags.show');
Route::get('tags_{level}/edit/{id}', [TagController::class, 'edit'])->name('tags.edit');
Route::post('tags_blog/update/{id}', [TagController::class, 'update'])->name('tags.update');
Route::post('tags_{level}/delete/{id}', [TagController::class, 'destroy'])->name('tags.destroy');

Route::get('categories/{level}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create/{level}', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/show/{level}/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('categories/edit/{level}/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::post('categories/delete/{level}/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('posts/{level}', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create/{level}', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store/', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/show/{level}/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/edit/{level}/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::post('posts/delete/{level}/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


//SERMON-DASHBOARD
Route::get('tags-{level}', [TagController::class, 'index'])->name('tags-sermon.index');
Route::get('tags-{level}/create', [TagController::class, 'create'])->name('tags-sermon.create');
Route::post('tags-sermon/store', [TagController::class, 'store'])->name('tags-sermon.store');
Route::get('tags-{level}/{id}', [TagController::class, 'show'])->name('tags-sermon.show');
Route::get('tags-{level}/edit/{id}', [TagController::class, 'edit'])->name('tags-sermon.edit');
Route::post('tags-sermon/update/{id}', [TagController::class, 'update'])->name('tags-sermon.update');
Route::post('tags-{level}/delete/{id}', [TagController::class, 'destroy'])->name('tags-sermon.destroy');

Route::get('categories-{level}', [CategoryController::class, 'index'])->name('categories-sermon.index');
Route::get('categories-{level}/create', [CategoryController::class, 'create'])->name('categories-sermon.create');
Route::post('categories-sermon/store', [CategoryController::class, 'store'])->name('categories-sermon.store');
Route::get('categories-{level}/{id}', [CategoryController::class, 'show'])->name('categories-sermon.show');
Route::get('categories-{level}/edit/{id}', [CategoryController::class, 'edit'])->name('categories-sermon.edit');
Route::post('categories-sermon/update/{id}', [CategoryController::class, 'update'])->name('categories-sermon.update');
Route::post('categories-{level}/delete/{id}', [CategoryController::class, 'destroy'])->name('categories-sermon.destroy');

Route::get('posts-{level}', [PostController::class, 'index'])->name('posts-sermon.index');
Route::get('posts-{level}/create', [PostController::class, 'create'])->name('posts-sermon.create');
Route::post('posts-sermon/store', [PostController::class, 'store'])->name('posts-sermon.store');
Route::get('posts-{level}/{id}', [PostController::class, 'show'])->name('posts-sermon.show');
Route::get('posts-{level}/edit/{id}', [PostController::class, 'edit'])->name('posts-sermon.edit');
Route::post('posts-sermon/update/{id}', [PostController::class, 'update'])->name('posts-sermon.update');
Route::post('posts-{level}/delete/{id}', [PostController::class, 'destroy'])->name('posts-sermon.destroy');


//EVENT-DASHBOARD
Route::get('tags/{level}', [TagController::class, 'index'])->name('tags-event.index');
Route::get('tags/{level}/create', [TagController::class, 'create'])->name('tags-event.create');
Route::post('tags/event/store', [TagController::class, 'store'])->name('tags-event.store');
Route::get('tags/{level}/{id}', [TagController::class, 'show'])->name('tags-event.show');
Route::get('tags/{level}/edit/{id}', [TagController::class, 'edit'])->name('tags-event.edit');
Route::post('tags/event/update/{id}', [TagController::class, 'update'])->name('tags-event.update');
Route::post('tags/{level}/delete/{id}', [TagController::class, 'destroy'])->name('tags-event.destroy');


Route::get('categorie-{level}', [CategoryController::class, 'index'])->name('categories-event.index');
Route::get('categorie-{level}/create', [CategoryController::class, 'create'])->name('categories-event.create');
Route::post('categorie-event/store', [CategoryController::class, 'store'])->name('categories-event.store');
Route::get('categorie-{level}/{id}', [CategoryController::class, 'show'])->name('categories-event.show');
Route::get('categorie-{level}/edit/{id}', [CategoryController::class, 'edit'])->name('categories-event.edit');
Route::post('categorie-event/update/{id}', [CategoryController::class, 'update'])->name('categories-event.update');
Route::post('categorie-{level}/delete/{id}', [CategoryController::class, 'destroy'])->name('categories-event.destroy');


Route::get('post-{level}', [PostController::class, 'index'])->name('posts-event.index');
Route::get('post-{level}/create', [PostController::class, 'create'])->name('posts-event.create');
Route::post('post-event/store', [PostController::class, 'store'])->name('posts-event.store');
Route::get('post-{level}/{id}', [PostController::class, 'show'])->name('posts-event.show');
Route::get('post-{level}/edit/{id}', [PostController::class, 'edit'])->name('posts-event.edit');
Route::post('post-event/update/{id}', [PostController::class, 'update'])->name('posts-event.update');
Route::post('post-{level}/delete/{id}', [PostController::class, 'destroy'])->name('posts-event.destroy');


Route::get('time-{level}/{activity}/{id}', [PostController::class, 'time'])->name('time-event.update');
