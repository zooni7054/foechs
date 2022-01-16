<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Ticker;
use App\Models\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class TickerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Ticker;

        $query = $this->search($query, $request);

        $query = $query->orderBy('created_at', 'desc');

        $tickers = $query->paginate(15);

        return view('tickers.index')->with(compact('tickers'));
    }

    public function search($query, $request)
    {
        if ($request->has('title')) {
            if (!empty($request->title)) {
                $query = $query->where('content', 'LIKE', "%{$request->title}%");
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
        return view('tickers.create');
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
            'content' => 'required',
            'path' => 'required'
        ];

        $request->validate($rules);

        $ticker = Ticker::create($request->all());

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);

        if ($ticker) {
            Session::flash('success', 'Ticker created successfully!');
            return redirect()->route('tickers.edit', $ticker->id);
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
        $ticker = Ticker::findOrFail($id);
        return view('tickers.edit')->with(compact('ticker'));
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
        $tender = Ticker::findOrFail($id);

        $rules = [
            'content' => 'required',
            'path' => 'required'
        ];

        $request->validate($rules);

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);

        if ($tender->update($request->all())) {
            Session::flash('success', 'Ticker updated successfully!');
            return redirect()->route('tickers.index');
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
        $ticker = Ticker::findOrFail($id);

        if ($ticker->delete()) {
            Session::flash('success', 'Ticker Update deleted successfully!');
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
        $ticker = Ticker::withTrashed()->findOrFail($id);

        if ($ticker->restore()) {
            Session::flash('success', 'Ticker restored successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }
}
