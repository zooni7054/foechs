
@extends('layouts.user')

@section('title', 'Edit Setting')


@section('content')


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Setting</h3>
    </div>

    <form action="{{ route('settings.update') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">

            @foreach($settings as $key => $value)
                <div class="form-group">
                    <label for="exampleInputEmail1" style="text-transform: capitalize;">{{ str_replace('_', ' ', $key) }}</label>
                    <input type="text" class="form-control" name="{{ $key }}" value="{{ $value }}" required>
                </div>
                @error($key)
                    <div class="validate-error">{{ $message }}</div>
                @enderror
            @endforeach
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
