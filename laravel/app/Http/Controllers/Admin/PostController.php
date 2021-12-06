<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Setting;

use App\Models\PostImage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Post;

        $query = $this->search($query, $request);

        $query = $query->orderBy('created_at', 'desc');

        $posts = $query->paginate(15);

        return view('posts.index')->with(compact('posts'));
    }

    public function search($query, $request)
    {
        if ($request->has('title')) {
            if (!empty($request->title)) {
                $query = $query->where('title', 'LIKE', "%{$request->title}%");
            }
        }

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'status' => 'required'
        ];

        if ($request->has('file')) {
            $rules['file'] = 'required|image|mimes:jpeg,png,jpg|max:1200';
        }

        $request->validate($rules);

        if ($request->has('file')) {
            $filename = $this->uploadImage($request);
            // update request
            $request->request->add(['image' => $filename]);
        }

        $post = Post::create($request->except('file'));

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);

        if ($post) {
            Session::flash('success', 'Society Update created successfully!');
            return redirect()->route('posts.edit', $post->id);
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit')->with(compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $rules = [
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'status' => 'required'
        ];

        if ($request->has('file')) {
            $rules['file'] = 'required|image|mimes:jpeg,png,jpg|max:2000';
        }

        $request->validate($rules);

        if ($request->has('file')) {
            $filename = $this->uploadImage($request);
            // update request
            $request->request->add(['image' => $filename]);
        }

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);

        if ($post->update($request->except('file'))) {
            Session::flash('success', 'Society Update updated successfully!');
            return redirect()->route('posts.index');
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    public function uploadImage($request)
    {
        $pathtocreate = public_path('uploads/posts');

        $image = $request->file('file');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $location = $pathtocreate . '/' . $filename;

        Image::make($image)->fit(850, 650, function ($constraint) {
            $constraint->upsize();
        })->save($location);

        return $filename;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->delete()) {
            Session::flash('success', 'Society Update deleted successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        if ($post->restore()) {
            Session::flash('success', 'Society Update restored successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    public function uploadImages(Request $request, $id)
    {

        $post = Post::findOrFail($id);

        $rules = array(
            'file' => 'required|image|mimes:jpeg,png,jpg|max:20000',
        );

        $request->validate($rules);

        $pathtocreate = public_path('uploads/posts/' . $post->id);
        if (!File::exists($pathtocreate)) {
            File::makeDirectory($pathtocreate);
        }

        $image = $request->file('file');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $location = $pathtocreate . '/' . $filename;

        $width = 1000;
        $height = 1000;

        $image_obj = Image::make($image);

        $image_obj->width() > $image_obj->height() ? $width = null : $height = null;

        $image_obj->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image_obj->save($location);

        // save in DB
        $post_image = new PostImage;
        $post_image->post_id = $post->id;
        $post_image->path = $filename;
        $post_image->save();

        return $filename;
    }

    public function deleteImage($id)
    {
        $image = PostImage::findOrFail($id);

        $file_path = 'uploads/posts/' . $image->post_id . '/' . $image->path;


        if (File::exists($file_path)) {
            File::delete(public_path($file_path));
        }

        if ($image->delete()) {
            Session::flash('success', 'Post Image deleted successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }
}
