@extends('layouts.user')

@section('title', 'Edit Member')


@section('content')

    <div class="back-area mb-3">
        <a href="{{ route('members.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Member</h3>
        </div>

        <form action="{{ route('members.update', $member->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Member Name <span>*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $member->name }}"
                        placeholder="Enter Member Name" required>
                </div>
                @error('name')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Designation <span>*</span></label>
                    <input type="text" class="form-control" name="designation" value="{{ $member->designation }}"
                        placeholder="Enter Designation" required>
                </div>
                @error('designation')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Sort Order <span>*</span></label>
                    <input type="number" class="form-control" min="1" value="{{ $member->sort }}" name="sort"
                        placeholder="Enter Sort Order" required>
                </div>
                @error('sort')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputFile">Member Picture</label><br>
                    <img src="{{ asset('uploads/members/'.$member->image) }}" width="100px" class="img-thumbnail">
                    <input type="file" name="file" class="form-control" accept="image/png, image/jpg, image/jpeg">
                </div>
                @error('file')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ $member->email }}"
                        placeholder="Enter Email Address">
                </div>
                @error('email')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile" value="{{ $member->mobile }}"
                        placeholder="Enter Mobile Number">
                </div>
                @error('view_name')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Introduction</label>
                    <textarea name="intro" class="form-control" rows="4"
                        placeholder="Enter Member Introduction">{{ $member->intro }}</textarea>
                </div>
                @error('meta_description')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ $member->meta_title }}"
                        placeholder="Enter Meta Title">
                </div>
                @error('meta_title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="4"
                        placeholder="Enter Meta Description">{{ $member->intro }}</textarea>
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
