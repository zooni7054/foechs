
@extends('layouts.user')

@section('title', 'Pages')


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

    <form action="{{ route('pages.index') }}" method="get" autocomplete="off">
        <input type="hidden" name="search" value="1">
        @php
            $name = '';

            if(isset($_GET['search'])){
                if(!empty($_GET['name'])){
                    $name = $_GET['name'];
                }
            }

        @endphp

        <div class="card card-success card-outline mt-3" id="search" @if(isset($_GET['search'])) style="display: block;" @endif>
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">Enter Name</label>
                        <input type="text" name="name" value="{{ $name }}" class="form-control">
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Search</button>
                <a href="{{ route('pages.index') }}" class="ml-5">Clear Search</a>
            </div>
        </div>
    </form>

</div>

<!-- Default box -->
<div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Pages List</h3>

        <div class="card-tools">
            <a href="{{ route('pages.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Create Page
            </a>
        </div>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Page Name</th>
                <th>Slug</th>
                <th>View</th>
                <th>Created At</th>
                <th class="action">Action</th>
              </tr>
            </thead>
            <tbody>

                @if(count($pages) > 0)

                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->name ?? '0' }}</td>
                            <td>{{ $page->slug ?? 'undefined' }}</td>
                            <td>{{ $page->view_name }}</td>
                            <td>{{ $page->created_at->format('d-m-Y g:i:s A') }}</td>
                            <td>
                                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('pages.destroy', $page->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="5" class="text-center">No record found!</td></tr>
                @endif

            </tbody>
        </table>

    </div>

    @if($pages->total() > 15)
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $pages->links() }}
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
