@extends('layouts.user')

@section('title', 'Edit Tender & procurement')


@section('content')

    <div class="back-area mb-3">
        <a href="{{ route('tenders.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Tender & Procurement</h3>
        </div>

        <form action="{{ route('tenders.update', $tender->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Type <span>*</span></label>
                    <select name="type" class="form-control select2">
                        <option value="tender" @if($tender->type == 'tender') selected @endif>Tender</option>
                        <option value="procurement" @if($tender->type == 'procurement') selected @endif>Procurement</option>
                    </select>
                </div>
                @error('type')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter Title <span>*</span></label>
                    <input type="text" class="form-control" name="title" value="{{ $tender->title }}" placeholder="Enter Title" required>
                </div>
                @error('title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter Description <span>*</span></label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Enter Description">{{ $tender->type }}</textarea>
                </div>
                @error('description')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputFile">Tender Picture</label><br>
                    <img src="{{ asset('uploads/tenders/'.$tender->path) }}" width="100px" class="img-thumbnail">
                    <input type="file" name="file" class="form-control" accept="image/png, image/jpg, image/jpeg">
                </div>
                @error('file')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ $tender->meta_title }}"
                        placeholder="Enter Meta Title">
                </div>
                @error('meta_title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="4"
                        placeholder="Enter Meta Description">{{ $tender->meta_description }}</textarea>
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
