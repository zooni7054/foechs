<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Document;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Document;

        $query = $this->search($query, $request);

        $query = $query->orderBy('id', 'desc');

        $documents = $query->paginate(15);

        return view('documents.index')->with(compact('documents'));
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
        return view('documents.create');
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
            'type' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx'
        ];

        $request->validate($rules);

        $filename = $this->uploadFile($request);
        // update request
        $request->request->add(['path' => $filename]);

        if (Document::create($request->except('file'))) {
            Session::flash('success', 'Document created successfully!');
            return redirect()->route('documents.index');
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
        $document = Document::findOrFail($id);

        return view('documents.edit')->with(compact('document'));
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
        $document = Document::findOrFail($id);

        $rules = [
            'title' => 'required',
            'type' => 'required'
        ];

        if($request->has('file')){
            $rules['file'] = 'required|file|mimes:pdf,doc,docx';
        }

        $request->validate($rules);

        if($request->has('file')){
            $filename = $this->uploadFile($request);
            // update request
            $request->request->add(['path' => $filename]);
        }

        if ($document->update($request->except('file'))) {
            Session::flash('success', 'Document updated successfully!');
            return redirect()->route('documents.index');
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }

    public function uploadFile($request){
        $pathtocreate = public_path('uploads/documents');

        $file = $request->file('file');

        $filename = uniqid(). '.'. $file->getClientOriginalExtension();

        $location = $pathtocreate. '/' . $filename;

        // $file->move($location);
        $request->file->move(public_path('uploads/documents'), $filename);

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
        $document = Document::findOrFail($id);

        if ($document->delete()) {
            Session::flash('success', 'Document deleted successfully!');
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
        $document = Document::withTrashed()->findOrFail($id);

        if ($document->restore()) {
            Session::flash('success', 'Document restored successfully!');
            return redirect()->back();
        } else {
            Session::flash('error', 'Some error occured. Please try again!');
            return redirect()->back();
        }
    }
}
