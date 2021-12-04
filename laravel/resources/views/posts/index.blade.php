
@extends('layouts.user')

@section('title', 'Society Updates')


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

    <form action="{{ route('posts.index') }}" method="get" autocomplete="off">
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
                <a href="{{ route('posts.index') }}" class="ml-5">Clear Search</a>
            </div>
        </div>
    </form>

</div>

<!-- Default box -->
<div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Society Updates List</h3>

        <div class="card-tools">
            <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Create Society Update
            </a>
        </div>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Created At</th>
                <th class="action">Action</th>
              </tr>
            </thead>
            <tbody>

                @if(count($posts) > 0)

                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title ?? '' }}</td>
                            <td>
                                @if($post->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else 
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $post->created_at->format('d-m-Y g:i:s A') }}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="5" class="text-center">No record found!</td></tr>
                @endif

            </tbody>
        </table>

    </div>

    @if($posts->total() > 15)
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $posts->links() }}
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
