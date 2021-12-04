
@extends('layouts.user')

@section('title', 'Create Document')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('documents.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Document</h3>
    </div>

    <form action="{{ route('documents.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            
            <div class="form-group">
                <label for="exampleInputEmail1">Document Title <span>*</span></label>
                <input type="text" class="form-control" name="title" placeholder="Enter Document Title" required>
            </div>
            @error('title')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Description <small>Optional</small></label>
                <textarea name="description" rows="4" class="form-control" placeholder="Enter Short Description"></textarea>
            </div>
            @error('description')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputFile">Select File <small>PDF, Doc, Docx</small></label>
                <input type="file" name="file" class="form-control" accept=".pdf,.doc">
            </div>
            @error('file')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Document Type <span>*</span></label>
                <select name="type" class="form-control select2">
                    <option value="">Select Option</option>
                    <option value="document">Document</option>
                    <option value="form">Form</option>
                </select>
            </div>
            @error('type')
                <div class="validate-error">{{ $message }}</div>
            @enderror

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        <!-- /.card-footer-->

    </form>
</div>
<!-- /.card -->

@endsection
