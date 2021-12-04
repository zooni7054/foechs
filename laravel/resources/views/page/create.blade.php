
@extends('layouts.user')

@section('title', 'Create Reason')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('pages.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Page</h3>
    </div>

    <form action="{{ route('pages.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Page Name <span>*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Enter Page Name" required>
            </div>
            @error('name')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Slug <span>*</span></label>
                <input type="text" class="form-control" name="slug" placeholder="Enter Slug" required>
            </div>
            @error('slug')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">View Name <span>*</span></label>
                <input type="text" class="form-control" name="view_name" placeholder="Enter View Name" required>
            </div>
            @error('view_name')
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
