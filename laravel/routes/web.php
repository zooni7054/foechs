<?php

use App\Models\Page;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DocumentController;


use App\Http\Controllers\Admin\Users\RoleController;
use App\Http\Controllers\Admin\Users\UserController;
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



Route::middleware('auth')->get('/', function () {
    return view('welcome');
});


// secured routes
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::prefix('forms-documents')->group(function () {
        Route::get('/', [DocumentController::class, 'index'])->name('documents.index');
        Route::get('/create', [DocumentController::class, 'create'])->name('documents.create');
        Route::post('/create', [DocumentController::class, 'store'])->name('documents.store');
        Route::get('/edit/{id}', [DocumentController::class, 'edit'])->name('documents.edit');
        Route::post('/edit/{id}', [DocumentController::class, 'update'])->name('documents.update');
        Route::get('/delete/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');
        Route::get('/restore/{id}', [DocumentController::class, 'restore'])->name('documents.restore');
    });

    Route::prefix('albums')->group(function () {
        Route::get('/', [AlbumController::class, 'index'])->name('albums.index');
        Route::get('/create', [AlbumController::class, 'create'])->name('albums.create');
        Route::post('/create', [AlbumController::class, 'store'])->name('albums.store');
        Route::get('/edit/{id}', [AlbumController::class, 'edit'])->name('albums.edit');
        Route::post('/edit/{id}', [AlbumController::class, 'update'])->name('albums.update');
        Route::get('/delete/{id}', [AlbumController::class, 'destroy'])->name('albums.destroy');
        Route::get('/restore/{id}', [AlbumController::class, 'restore'])->name('albums.restore');

        
        Route::get('/upload-images/{id}', [AlbumController::class, 'images'])->name('albums.images');
        Route::post('/upload-images/{id}', [AlbumController::class, 'uploadImages'])->name('albums.images-upload');
        Route::get('/delete-images/{id}', [AlbumController::class, 'deleteImage'])->name('albums.image-delete');

    });

    Route::prefix('society-updates')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/create', [PostController::class, 'store'])->name('posts.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
        Route::post('/edit/{id}', [PostController::class, 'update'])->name('posts.update');
        Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
        Route::get('/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');

        Route::post('/upload-images/{id}', [PostController::class, 'uploadImages'])->name('posts.images-upload');
        Route::get('/delete-images/{id}', [PostController::class, 'deleteImage'])->name('posts.image-delete');
    });

    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('events.index');
        Route::get('/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/create', [EventController::class, 'store'])->name('events.store');
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
        Route::post('/edit/{id}', [EventController::class, 'update'])->name('events.update');
        Route::get('/delete/{id}', [EventController::class, 'destroy'])->name('events.destroy');
        Route::get('/restore/{id}', [EventController::class, 'restore'])->name('events.restore');
    });

    Route::prefix('management-committee')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('members.index');
        Route::get('/create', [MemberController::class, 'create'])->name('members.create');
        Route::post('/create', [MemberController::class, 'store'])->name('members.store');
        Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('members.edit');
        Route::post('/edit/{id}', [MemberController::class, 'update'])->name('members.update');
        Route::get('/delete/{id}', [MemberController::class, 'destroy'])->name('members.destroy');
        Route::get('/restore/{id}', [MemberController::class, 'restore'])->name('members.restore');
    });

    
    Route::prefix('pages')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('pages.index');
        Route::get('/create', [PageController::class, 'create'])->name('pages.create');
        Route::post('/create', [PageController::class, 'store'])->name('pages.store');
        Route::get('/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
        Route::post('/edit/{id}', [PageController::class, 'update'])->name('pages.update');
        Route::get('/delete/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
        Route::get('/restore/{id}', [PageController::class, 'restore'])->name('pages.restore');
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/create', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('/edit/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
        Route::get('/restore/{id}', [RoleController::class, 'restore'])->name('roles.restore');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('users.update');
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/update', [SettingController::class, 'update'])->name('settings.update');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', [HomeController::class, 'index'])->name('home');
});


// unsecure routes
Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

$pages = Page::get();
foreach($pages as $page){
    Route::get($page->slug, [HomeController::class, 'page'])->name($page->slug);
}

Route::post('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us.submit');

Route::get('/gallery/{id}', [HomeController::class, 'singleAlbum'])->name('single-album');
Route::get('/event/{id}', [HomeController::class, 'singleEvent'])->name('single-event');
Route::get('/update/{id}', [HomeController::class, 'singleUpdate'])->name('single-update');

Route::get('/test', [HomeController::class, 'test'])->name('test');


Route::get('sitemap', [HomeController::class, 'sitemap'])->name('sitemap');