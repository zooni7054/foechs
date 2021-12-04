@extends('layouts.user')

@section('title', 'Edit Document')


@section('content')

    <div class="back-area mb-3">
        <a href="{{ route('documents.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Document</h3>
        </div>

        <form action="{{ route('documents.update', $document->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Title <span>*</span></label>
                    <input type="text" class="form-control" value="{{ $document->title }}" name="title" placeholder="Enter document Title" required>
                </div>
                @error('title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Description <span>*</span></label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Enter Short Description" required>{{ $document->description }}</textarea>
                </div>
                @error('description')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Document Type <span>*</span></label>
                    <select name="type" class="form-control select2">
                        <option value="">Select Option</option>
                        <option value="document" @if($document->type == 'document') selected @endif>Document</option>
                        <option value="form" @if($document->type == 'form') selected @endif>Form</option>
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

