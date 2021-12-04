
@extends('layouts.user')

@section('title', 'Edit Reason')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('reasons.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Reason</h3>
    </div>

    <form action="{{ route('reasons.update', $reason->id) }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Reason</label>
                <input type="text" class="form-control" name="name" value="{{ $reason->name }}" placeholder="Enter Reason Name" required>
            </div>
            @error('name')
                <div class="validate-error">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">Select Status</label>
                <select name="status" class="form-control select2" required>
                    <option value="1" @if($reason->status == 1) selected @endif>Active</option>
                    <option value="0" @if($reason->status == 0) selected @endif>Inactive</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-footer-->

    </form>
</div>
<!-- /.card -->

@endsection
