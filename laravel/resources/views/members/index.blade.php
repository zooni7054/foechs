
@extends('layouts.user')

@section('title', 'Management Committee')


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

    <form action="{{ route('members.index') }}" method="get" autocomplete="off">
        <input type="hidden" name="search" value="1">
        @php
            $name = '';
            $designation = '';

            if(isset($_GET['search'])){
                if(!empty($_GET['name'])){
                    $name = $_GET['name'];
                }

                if(!empty($_GET['designation'])){
                    $designation = $_GET['designation'];
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

                    <div class="form-group col-md-4">
                        <label for="">Enter Designation</label>
                        <input type="text" name="designation" value="{{ $designation }}" class="form-control">
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Search</button>
                <a href="{{ route('members.index') }}" class="ml-5">Clear Search</a>
            </div>
        </div>
    </form>

</div>

<!-- Default box -->
<div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Management Committee Members</h3>

        <div class="card-tools">
            <a href="{{ route('members.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Add Member
            </a>
        </div>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Image</th>
                <th>Member Name</th>
                <th>Designation</th>
                <th>Sort Order</th>
                <th>Created At</th>
                <th class="action">Action</th>
              </tr>
            </thead>
            <tbody>

                @if(count($members) > 0)

                    @foreach ($members as $member)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/members/'.$member->image) }}" class="img-thumbnail" width="100px" alt="{{ $member->name ?? '' }}">
                            </td>
                            <td>{{ $member->name ?? '' }}</td>
                            <td>{{ $member->designation ?? 'undefined' }}</td>
                            <td>{{ $member->sort }}</td>
                            <td>{{ $member->created_at->format('d-m-Y g:i:s A') }}</td>
                            <td>
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('members.destroy', $member->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="6" class="text-center">No record found!</td></tr>
                @endif

            </tbody>
        </table>

    </div>

    @if($members->total() > 15)
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $members->links() }}
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
