
@extends('layouts.user')

@section('title', 'Edit User')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">User Detail</h3>
    </div>

    <form action="{{ route('users.update', $user->id) }}" method="post" autocomplete="off">
        @csrf

        <div class="card-body">

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>User ID</th>
                        <td>{{ $user->id ?? '' }}</td>
                        <th>HRMS ID</th>
                        <td>{{ $user->hrms_id ?? '' }}</td>
                        <th>User Name</th>
                        <td>{{ $user->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{ $user->email ?? '' }}</td>
                        <th>User Role</th>
                        <td>{{ $user->roles[0]->name ?? '' }}</td>
                        <th>Campaign</th>
                        <td>{{ $user->campaign->name ?? '' }}</td>
                    </tr>
                </tbody>
            </table>

            @php
                $user_role = $user->roles[0]->name;
            @endphp

            <div class="form-group" style="margin-top: 30px;">
                <label for="exampleInputEmail1">Select User Role</label>
                <select name="role" id="role" class="form-control select2" required>
                    <option value="">Select Option</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" @if($user_role == $role->name) selected @endif>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        <!-- /.card-footer-->

    </form>

</div>
<!-- /.card -->

@endsection


@section('scripts')
