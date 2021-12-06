<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Album;
use App\Models\Event;

use App\Models\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Event;

        $query = $this->search($query, $request);

        $query = $query->orderBy('schedule_date', 'desc');

        $events = $query->paginate(15);

        return view('events.index')->with(compact('events'));
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
        $albums = Album::orderBy('id', 'desc')->get();
        return view('events.create')->with(compact('albums'));
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
            'schedule_date' => 'required',
            'status' => 'required'
        ];

        if($request->has('file')){
            $rules['file'] = 'required|image|mimes:jpeg,png,jpg|max:12000';
        }

        $request->validate($rules);

        // set data
        $event_date = Carbon::createFromFormat('d-m-Y', $request->schedule_date);

        // update request
        $request->request->add(['schedule_date' => $event_date]);

        if($request->has('file')){
            $filename = $this->uploadImage($request);
            // update request
            $request->request->add(['image' => $filename]);
        }

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);

        if (Event::create($request->except('file'))) {
            Session::flash('success', 'Event created successfully!');
            return redirect()->route('events.index');
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
        $event = Event::findOrFail($id);

        $albums = Album::orderBy('id', 'desc')->get();
        return view('events.edit')->with(compact('event', 'albums'));
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
        $event = Event::findOrFail($id);

        $rules = [
            'title' => 'required',
            'short_description' => 'required',
            'schedule_date' => 'required',
            'status' => 'required'
        ];

        if($request->has('file')){
            $rules['file'] = 'required|image|mimes:jpeg,png,jpg|max:2000';
        }

        $request->validate($rules);

        // set data
        $event_date = Carbon::createFromFormat('d-m-Y', $request->schedule_date);

        // update request
        $request->request->add(['schedule_date' => $event_date]);

        if($request->has('file')){
            $filename = $this->uploadImage($request);
            // update request
            $request->request->add(['image' => $filename]);
        }

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);

        if ($event->update($request->except('file'))) {
            Session::flash('success', 'Event updated successfully!');
            return redirect()->route('events.index');
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    public function uploadImage($request){
        $pathtocreate = public_path('uploads/events');

        $image = $request->file('file');
        $filename = uniqid(). '.'. $image->getClientOriginalExtension();
        $location = $pathtocreate. '/' . $filename;

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
        $event = Event::findOrFail($id);

        if ($event->delete()) {
            Session::flash('success', 'Event deleted successfully!');
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
        $event = Event::withTrashed()->findOrFail($id);

        if ($event->restore()) {
            Session::flash('success', 'Event restored successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }
}
