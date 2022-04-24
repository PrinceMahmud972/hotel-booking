@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <a href="{{ route('room.type.create') }}" class="btn btn-primary btn-sm">Add Room Type</a><br><br>
        <div class="card mb-4">
            <!--------- Success Message Show--------->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover px-3 py-2" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Details</th>
                            <th scope="col">Price</th>
                            <th scope="col">GalleryImages</th>
                            <th scope="col">Prepared_by</th>
                            <th scope="col" style="width: 25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_data as $data)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <th>{{ $data->room_type_title }}</th>
                                <th>{{ $data->room_type_details }}</th>
                                <th>{{ $data->room_type_price }}</th>
                                <th>{{ count($data->roomTypeImages) }}</th>
                                <th>{{ $data->prepared_by }}</th>
                                <th>
                                    @if (Auth::user()->role == '1')
                                        <a href="{{ route('room.type.view',$data->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('room.type.edit',$data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a onclick="return confirm('Are You Sure to Delete this data?')" href="{{ route('room.type.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        @else
                                        <a href="{{ route('room.type.view',$data->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('room.type.edit',$data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    @endif

                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

@endsection
