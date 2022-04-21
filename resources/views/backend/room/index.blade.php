@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-8">
        <a href="{{ route('room.create') }}" class="btn btn-primary btn-sm">Add Room</a><br><br>
        <div class="card mb-4">
            <!--------- Success Message Show--------->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
            @endif
            
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Room Type</th>
                        <th scope="col">Title</th>
                        <th scope="col">Prepared_by</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_data as $data)
                        <tr>
                            <th>{{ $loop->index+1 }}</th>
                            <th>{{ $data->roomType->room_type_title }}</th>
                            <th>{{ $data->room_title }}</th>
                            <th>{{ $data->prepared_by }}</th>
                            <th>
                               @if (Auth::user()->role == '1')
                                    <a href="{{ route('room.edit',$data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a onclick="return confirm('Are You Sure to Delete this data?')" href="{{ route('room.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    @else
                                    <a href="{{ route('room.edit',$data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                               @endif
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection