<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Setting;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Member;

        $query = $this->search($query, $request);

        $query = $query->orderBy('sort', 'desc');

        $members = $query->paginate(15);

        return view('members.index')->with(compact('members'));
    }

    public function search($query, $request)
    {
        if ($request->has('name')) {
            if (!empty($request->name)) {
                $query = $query->where('name', 'LIKE', "%{$request->name}%");
            }
        }

        if ($request->has('designation')) {
            if (!empty($request->name)) {
                $query = $query->where('designation', 'LIKE', "%{$request->designation}%");
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
        return view('members.create');
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
            'name' => 'required',
            'designation' => 'required',
            'sort' => 'required'
        ];

        if($request->has('file')){
            $rules['file'] = 'required|image|mimes:jpeg,png,jpg|max:1200';
        }

        $request->validate($rules);

        if($request->has('file')){
            $filename = $this->uploadImage($request);
            // update request
            $request->request->add(['image' => $filename]);
        }

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);

        if (Member::create($request->except('file'))) {
            Session::flash('success', 'Member created successfully!');
            return redirect()->route('members.index');
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
        $member = Member::findOrFail($id);
        return view('members.edit')->with(compact('member'));
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
        $member = Member::findOrFail($id);

        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'sort' => 'required'
        ];

        if($request->has('file')){
            $rules['file'] = 'required|image|mimes:jpeg,png,jpg|max:1200';
        }

        $request->validate($rules);

        if($request->has('file')){
            $filename = $this->uploadImage($request);
            // update request
            $request->request->add(['image' => $filename]);
        }

        Setting::where('key', 'updated')->update(['value' => Carbon::now()->format('M, d Y')]);


        if ($member->update($request->except('file'))) {
            Session::flash('success', 'Member updated successfully!');
            return redirect()->route('members.index');
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    public function uploadImage($request){
        $pathtocreate = public_path('uploads/members');

        $image = $request->file('file');
        $filename = uniqid(). '.'. $image->getClientOriginalExtension();
        $location = $pathtocreate. '/' . $filename;

        Image::make($image)->fit(500, 500, function ($constraint) {
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
        $member = Member::findOrFail($id);

        if ($member->delete()) {
            Session::flash('success', 'Member deleted successfully!');
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
        $member = Member::withTrashed()->findOrFail($id);

        if ($member->restore()) {
            Session::flash('success', 'Member restored successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }
}
