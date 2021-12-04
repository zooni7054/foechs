@extends('layouts.user')

@section('title', 'Edit Album')


@section('content')

    <div class="back-area mb-3">
        <a href="{{ route('albums.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Album</h3>
        </div>

        <form action="{{ route('albums.update', $album->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Title <span>*</span></label>
                    <input type="text" class="form-control" value="{{ $album->title }}" name="title" placeholder="Enter Event Title" required>
                </div>
                @error('title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Status</label>
                    <select name="status" class="form-control select2">
                        <option value="1" @if($album->status == 1) selected @endif>Active</option>
                        <option value="2" @if($album->status == 2) selected @endif>Inactive</option>
                    </select>
                </div>
                @error('status')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $album->meta_title }}" name="meta_title" placeholder="Enter Meta Title">
                </div>
                @error('meta_title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="4" placeholder="Enter Meta Description">{{ $album->meta_description }}</textarea>
                </div>
                @error('meta_description')
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
