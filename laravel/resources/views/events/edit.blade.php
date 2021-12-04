@extends('layouts.user')

@section('title', 'Edit Event')


@section('content')

    <div class="back-area mb-3">
        <a href="{{ route('events.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Event</h3>
        </div>

        <form action="{{ route('events.update', $event->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Event Date <span>*</span></label>
                    <input type="text" class="form-control datetimepicker-input datepicker" name="schedule_date" value="{{ $event->schedule_date->format('d-m-Y') }}" data-toggle="datetimepicker" data-target=".datepicker"/>
                </div>
                @error('title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Title <span>*</span></label>
                    <input type="text" class="form-control" value="{{ $event->title }}" name="title" placeholder="Enter Event Title" required>
                </div>
                @error('title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Short Description <span>*</span></label>
                    <textarea name="short_description" rows="4" class="form-control" placeholder="Enter Short Description" required>{{ $event->short_description }}</textarea>
                </div>
                @error('short_description')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Description <span>*</span></label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Enter Short Description" required>{{ $event->description }}</textarea>
                </div>
                @error('description')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputFile">Event Banner</label><br>
                    <img src="{{ asset('uploads/events/'.$event->image) }}" width="100px" class="img-thumbnail">
                    <input type="file" name="file" class="form-control" accept="image/png, image/jpg, image/jpeg">
                </div>
                @error('file')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Album (Optional)</label>
                    <select name="album_id" class="form-control select2">
                        <option value="">Select Album</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}" @if($album->id == $event->album_id) selected @endif>{{ $album->title }} - {{ $album->id }}</option>
                        @endforeach
                    </select>
                </div>
                @error('album_id')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Status</label>
                    <select name="status" class="form-control select2">
                        <option value="1" @if($event->status == 1) selected @endif>Scheduled</option>
                        <option value="2" @if($event->status == 2) selected @endif>Completed</option>
                    </select>
                </div>
                @error('status')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $event->meta_title }}" name="meta_title" placeholder="Enter Meta Title">
                </div>
                @error('meta_title')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="4" placeholder="Enter Meta Description">{{ $event->meta_description }}</textarea>
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


@section('scripts')

<script>

    $(function () {
        $('.datepicker').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY',
            keepInvalid: false
        });

    });

</script>

@endsection
