<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Models\Album;
use App\Models\Event;

use App\Models\Member;
use App\Models\Document;


use App\Models\PostImage;
use App\Models\AlbumImage;
use Spatie\Sitemap\Sitemap;
use Illuminate\Http\Request;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index()
    {


        return view('home');
    }


    public function page()
    {
        $route = Route::currentRouteName();

        $page = Page::where('slug', $route)->firstOrFail();

        // home page
        if($page->slug == '/'){
            $members = Member::orderBy('sort', 'ASC')->get();
            $events = Event::orderBy('schedule_date', 'DESC')->limit(3)->get();
            return view($page->view_name)->with(compact('page', 'members', 'events'));
        }

        // management committee
        if($page->slug == 'management-committee'){
            $members = Member::orderBy('sort', 'ASC')->get();
            return view($page->view_name)->with(compact('page', 'members'));
        }

        // organization
        if($page->slug == 'organization'){
            $members = Member::orderBy('sort', 'ASC')->get();
            return view($page->view_name)->with(compact('page', 'members'));
        }

        // events
        if($page->slug == 'events'){
            $events = Event::orderBy('schedule_date', 'DESC')->paginate(15);
            return view($page->view_name)->with(compact('page', 'events'));
        }

        // gallery page
        if($page->slug == 'gallery'){
            // $albums = Album::has('images', '>' , 0)->orderBy('id', 'DESC')->paginate(15);
            $albums = Album::orderBy('id', 'DESC')->paginate(15);
            return view($page->view_name)->with(compact('page', 'albums'));
        }

        // events
        if($page->slug == 'updates'){
            $posts = Post::orderBy('created_at', 'DESC')->paginate(15);
            return view($page->view_name)->with(compact('page', 'posts'));
        }

        // events
        if($page->slug == 'forms-documents'){
            $documents = Document::where('type', 'document')->orderBy('created_at', 'DESC')->get();
            $forms = Document::where('type', 'form')->orderBy('created_at', 'DESC')->get();
            return view($page->view_name)->with(compact('page', 'documents', 'forms'));
        }

        return view($page->view_name)->with(compact('page'));
    }

    public function singleAlbum($id){
        $album = Album::with('images')->findOrFail($id);
        $images = AlbumImage::where('album_id', $id)->orderBy('id', 'asc')->paginate(15);
        return view('pages.single-album')->with(compact('album', 'images'));
    }

    public function singleEvent($id){
        $event = Event::findOrFail($id);
        $images = AlbumImage::where('album_id', $event->album_id)->orderBy('id', 'asc')->paginate(15);
        return view('pages.single-event')->with(compact('event', 'images'));
    }

    public function singleUpdate($id){
        $post = Post::with('images')->findOrFail($id);
        $images = PostImage::where('post_id', $id)->orderBy('id', 'asc')->paginate(15);
        return view('pages.single-post')->with(compact('post', 'images'));
    }

    public function contactUs(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required'
        ];

        $request->validate($rules);
    }

    public function test()
    {
        $users = User::where('id', 1)->get();
        // $notification = Notification::send($users, new EmailNotification());
        // $notification = Notification::send($users, new WebNotification('Test Title3', 'Test Content2', 'home'));

        $notifications = Auth::user()->unreadNotifications;
        dd($notifications);
    }


    public function sitemap(){
        $path = public_path('sitemap.xml');

        $sitemap = Sitemap::create();

        Page::all()->each(function (Page $item) use ($sitemap) {
            $sitemap->add(Url::create("{$item->slug}"));
        });

        Event::all()->each(function (Event $item) use ($sitemap) {
            $sitemap->add(Url::create("event/{$item->id}"));
        });

        Album::all()->each(function (Album $item) use ($sitemap) {
            $sitemap->add(Url::create("gallery/{$item->id}"));
        });

        Post::all()->each(function (Post $item) use ($sitemap) {
            $sitemap->add(Url::create("update/{$item->id}"));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
        
        echo "Generated";
    }
    
}