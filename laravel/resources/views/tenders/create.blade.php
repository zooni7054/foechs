
@extends('layouts.user')

@section('title', 'Add Tender & procurement')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('tenders.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Tender & Procurement</h3>
    </div>

    <form action="{{ route('tenders.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Type <span>*</span></label>
                <select name="type" class="form-control select2">
                    <option value="tender">Tender</option>
                    <option value="procurement">Procurement</option>
                </select>
            </div>
            @error('type')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Enter Title <span>*</span></label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
            </div>
            @error('title')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Enter Description <span>*</span></label>
                <textarea name="description" class="form-control" rows="4" placeholder="Enter Description"></textarea>
            </div>
            @error('description')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputFile">Tender Picture</label>
                <input type="file" name="file" class="form-control" accept="image/png, image/jpg, image/jpeg">
            </div>
            @error('file')
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
