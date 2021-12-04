@extends('layouts.user')

@section('title', 'Upload Images')


@section('content')

    <div class="back-area mb-3">
        <a href="{{ route('albums.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $album->title }} - <small>Album Images</small></h3>

            <div class="card-tools">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-upload">
                    <i class="fas fa-upload"></i> Upload
                </a>
            </div>
        </div>


        <div class="card-body">

            @if(count($album->images) > 0)

                <div class="row uploads">

                    @foreach ($album->images as $item)
                        <div class="col-md-3">
                            <div class="item">
                                <img src="{{ asset('uploads/albums/'.$album->id.'/'.$item->path) }}" class="img-thumbnail" alt="{{ $item->id }}">
                                <a href="{{ route('albums.image-delete', $item->id) }}"><i class="fas fa-trash"></i></a>
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

                    <form action="{{ route('albums.images-upload', $album->id) }}" method="post" autocomplete="off"
                        class="dropzone" id="album-dropzone" enctype="multipart/form-data">
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


@section('scripts')
    <script>
        $(function() {


            // $("#album-dropzone").dropzone({ url: "/file/post" });

        });
    </script>

@endsection
