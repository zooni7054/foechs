<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Album;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\AlbumImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Album;

        $query = $this->search($query, $request);

        $query = $query->orderBy('id', 'desc');

        $albums = $query->paginate(15);

        return view('albums.index')->with(compact('albums'));
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
        return view('albums.create');
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
            'status' => 'required'
        ];


        $request->validate($rules);

        $album = Album::create($request->all());

        if ($album) {
            Session::flash('success', 'Album created successfully!');
            return redirect()->route('albums.images', $album->id);
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
        $album = Album::findOrFail($id);
        return view('albums.edit')->with(compact('album'));
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
        $album = Album::findOrFail($id);

        $rules = [
            'title' => 'required',
            'status' => 'required'
        ];

        $request->validate($rules);

        if ($album->update($request->all())) {
            Session::flash('success', 'Album updated successfully!');
            return redirect()->route('albums.index');
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);

        if ($album->delete()) {
            Session::flash('success', 'Album deleted successfully!');
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
        $album = Album::withTrashed()->findOrFail($id);

        if ($album->restore()) {
            Session::flash('success', 'Album restored successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    public function images($id){
        $album = Album::findOrFail($id);
        return view('albums.images')->with(compact('album'));
    }

    public function uploadImages(Request $request, $id){

        $album = Album::findOrFail($id);

        $rules = array(
		    'file' => 'required|image|mimes:jpeg,png,jpg|max:20000',
		);

        $request->validate($rules);

        $pathtocreate = public_path('uploads/albums/'.$album->id);
        if(!File::exists($pathtocreate)) {
            File::makeDirectory($pathtocreate);
        }

        $image = $request->file('file');
        $filename = uniqid(). '.'. $image->getClientOriginalExtension();
        $location = $pathtocreate. '/' . $filename;

        $width = 1000;
        $height = 1000;

        $image_obj = Image::make($image);

        $image_obj->width() > $image_obj->height() ? $width=null : $height=null;

        $image_obj->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image_obj->save($location);

        // save in DB
        $album_image = new AlbumImage;
        $album_image->album_id = $album->id;
        $album_image->path = $filename;
        $album_image->save();

        return $filename;

    }

    public function deleteImage($id){
        $image = AlbumImage::findOrFail($id);

        $file_path = 'uploads/albums/'.$image->album_id.'/'.$image->path;


        if(File::exists($file_path)){
            File::delete(public_path($file_path));
        }

        if ($image->delete()) {
            Session::flash('success', 'Album Image deleted successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }
}
