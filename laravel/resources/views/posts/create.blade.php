
@extends('layouts.user')

@section('title', 'Create Society Update')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Society Update</h3>
    </div>

    <form action="{{ route('posts.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Title <span>*</span></label>
                <input type="text" class="form-control" name="title" placeholder="Enter Event Title" required>
            </div>
            @error('title')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Short Description <span>*</span></label>
                <textarea name="short_description" rows="4" class="form-control" placeholder="Enter Short Description" required></textarea>
            </div>
            @error('short_description')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Description <span>*</span></label>
                <textarea name="description" rows="4" class="form-control" placeholder="Enter Short Description" required></textarea>
            </div>
            @error('description')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Select Status</label>
                <select name="status" class="form-control select2">
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </select>
            </div>
            @error('status')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title">
            </div>
            @error('meta_title')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="4" placeholder="Enter Meta Description"></textarea>
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
