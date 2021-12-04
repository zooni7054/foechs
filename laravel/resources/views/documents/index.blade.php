
@extends('layouts.user')

@section('title', 'Documents')


@section('content')

<div class="search-area">
    <div class="row">

        <div class="col-md-6">
            <h4 class="mb-0">Search</h4>
        </div>
        <div class="col-md-6">
            <div class="button-area">
                <button type="button" id="btn-search" class="btn btn-success"><i class="fas fa-filter"></i></button>
            </div>
        </div>

    </div>

    <form action="{{ route('documents.index') }}" method="get" autocomplete="off">
        <input type="hidden" name="search" value="1">
        @php
            $title = '';

            if(isset($_GET['search'])){
                if(!empty($_GET['title'])){
                    $title = $_GET['title'];
                }
            }

        @endphp

        <div class="card card-success card-outline mt-3" id="search" @if(isset($_GET['search'])) style="display: block;" @endif>
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">Enter Title</label>
                        <input type="text" name="title" value="{{ $title }}" class="form-control">
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Search</button>
                <a href="{{ route('documents.index') }}" class="ml-5">Clear Search</a>
            </div>
        </div>
    </form>

</div>

<!-- Default box -->
<div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Documents List</h3>

        <div class="card-tools">
            <a href="{{ route('documents.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Create Document
            </a>
        </div>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Document</th>
                <th>Created At</th>
                <th class="action">Action</th>
              </tr>
            </thead>
            <tbody>

                @if(count($documents) > 0)

                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ $document->id }}</td>
                            <td>{{ $document->title ?? '' }}</td>
                            <td>{{ $document->type }}</td>
                            <td><a href="{{ asset('uploads/documents/'.$document->path) }}" target="_blank">{{ $document->path }}</a></td>
                            <td>{{ $document->created_at->format('d-m-Y g:i:s A') }}</td>
                            <td>
                                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('documents.destroy', $document->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="6" class="text-center">No record found!</td></tr>
                @endif

            </tbody>
        </table>

    </div>

    @if($documents->total() > 15)
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $documents->links() }}
        </div>
        <!-- /.card-footer-->
    @endif
</div>
<!-- /.card -->

@endsection


@section('scripts')

<script>

    $(function () {
        $("#btn-search").click(function(e){
            e.preventDefault();
            $("#search").slideToggle();
        });

    });

</script>

@endsection
