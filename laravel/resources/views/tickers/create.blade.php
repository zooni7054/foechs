
@extends('layouts.user')

@section('title', 'Add Ticker')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('tickers.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Ticker</h3>
    </div>

    <form action="{{ route('tickers.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Enter Ticker <span>*</span></label>
                <textarea name="content" class="form-control" rows="4" placeholder="Enter Ticker"></textarea>
            </div>
            @error('content')
                <div class="validate-error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleInputFile">Enter Path</label>
                <input type="text" name="path" class="form-control" required>
            </div>
            @error('path')
                <div class="validate-error">{{ $message }}</div>
            @enderror
    
            <div class="form-group">
                <label for="exampleInputFile">Order</label>
                <input type="number" min="0" name="order" value="1" class="form-control">
            </div>
            @error('order')
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
