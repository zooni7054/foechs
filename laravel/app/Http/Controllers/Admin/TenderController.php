<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tender;
use App\Models\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Tender;

        $query = $this->search($query, $request);

        $query = $query->orderBy('created_at', 'desc');

        $tenders = $query->paginate(15);

        return view('tenders.index')->with(compact('tenders'));
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
        return view('tenders.create');
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
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'opening_date' => 'required',
            'closing_date' => 'required',
        ];

        if ($request->has('file')) {
            $rules['file'] = 'required|image|mimes:jpeg,png,jpg';
        }

        $request->validate($rules);

        if ($request->has('file')) {
            $filename = $this->uploadImage($request);
            // update request
            $request->request->add(['path' => $filename]);
        }

        // set data
        $opening_date = Carbon::createFromFormat('d-m-Y', $request->opening_date);
        $closing_date = Carbon::createFromFormat('d-m-Y', $request->closing_date);
        // update request
        $request->request->add(['opening_date' => $opening_date, 'closing_date' => $closing_date]);

        $tender = Tender::create($request->except('file'));

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);

        if ($tender) {
            Session::flash('success', 'Tender created successfully!');
            return redirect()->route('tenders.edit', $tender->id);
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
        $tender = Tender::findOrFail($id);
        return view('tenders.edit')->with(compact('tender'));
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
        $tender = Tender::findOrFail($id);

        $rules = [
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'opening_date' => 'required',
            'closing_date' => 'required',
        ];

        if ($request->has('file')) {
            $rules['file'] = 'required|image|mimes:jpeg,png,jpg';
        }

        $request->validate($rules);

        if ($request->has('file')) {
            $filename = $this->uploadImage($request);
            // update request
            $request->request->add(['path' => $filename]);
        }

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);

        // set data
        $opening_date = Carbon::createFromFormat('d-m-Y', $request->opening_date);
        $closing_date = Carbon::createFromFormat('d-m-Y', $request->closing_date);
        // update request
        $request->request->add(['opening_date' => $opening_date, 'closing_date' => $closing_date]);

        if ($tender->update($request->except('file'))) {
            Session::flash('success', 'Tender Update updated successfully!');
            return redirect()->route('tenders.index');
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    public function uploadImage($request)
    {
        $pathtocreate = public_path('uploads/tenders');

        $image = $request->file('file');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $location = $pathtocreate . '/' . $filename;

        Image::make($image)->fit(1050, 1050, function ($constraint) {
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
        $tender = Tender::findOrFail($id);

        if ($tender->delete()) {
            Session::flash('success', 'Tender Update deleted successfully!');
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
        $tender = Tender::withTrashed()->findOrFail($id);

        if ($tender->restore()) {
            Session::flash('success', 'Tender restored successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }
}
