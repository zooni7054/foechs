@extends('layouts.user')

@section('title', 'Edit Society Update')


@section('content')

    <div class="back-area mb-3">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Society Update Images</h3>

            <div class="card-tools">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-upload">
                    <i class="fas fa-upload"></i> Upload
                </a>
            </div>
        </div>


        <div class="card-body">

            @if (count($post->images) > 0)

                <div class="row uploads">

                    @foreach ($post->images as $item)
                        <div class="col-md-3">
                            <div class="item">
                                <img src="{{ asset('uploads/posts/' . $post->id . '/' . $item->path) }}" class="img-thumbnail"
                                    alt="{{ $item->id }}">
                                <a href="{{ route('posts.image-delete', $item->id) }}"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    @endforeach

                </div>

            @else
                <h4 class="text-center">No images found!</h4>
            @endif

        </div>


    </div>
    <!-- /.card -->

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Society Update</h3>
        </div>

        <form action="{{ route('posts.update', $post->id) }}" method="post" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Title <span>*</span></label>
                    <input type="text" class="form-control" value="{{ $post->title }}" name="title"
                        placeholder="Enter Event Title" required>
                </div>
                @error('title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Short Description <span>*</span></label>
                    <textarea name="short_description" rows="4" class="form-control" placeholder="Enter Short Description"
                        required>{{ $post->short_description }}</textarea>
                </div>
                @error('short_description')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Description <span>*</span></label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Enter Short Description"
                        required>{{ $post->description }}</textarea>
                </div>
                @error('description')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Select Status</label>
                    <select name="status" class="form-control select2">
                        <option value="1" @if ($post->status == 1) selected @endif>Active</option>
                        <option value="2" @if ($post->status == 2) selected @endif>Inactive</option>
                    </select>
                </div>
                @error('status')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $post->meta_title }}" name="meta_title"
                        placeholder="Enter Meta Title">
                </div>
                @error('meta_title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="4"
                        placeholder="Enter Meta Description">{{ $post->meta_description }}</textarea>
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


    <div class="modal fade" id="modal-upload">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Images</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">

                    <p>Refresh the page after completing uploads</p>

                    <form action="{{ route('posts.images-upload', $post->id) }}" method="post" autocomplete="off"
                        class="dropzone" id="post-dropzone" enctype="multipart/form-data">
                        @csrf
                    </form>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection
