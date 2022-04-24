@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('booking.create') }}" class="btn btn-primary btn-sm">Add New Booking</a><br><br>
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
                            <th scope="col">Room Name</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Phone</th>
                            <th scope="col">Room Checkin Date</th>
                            <th scope="col">Room Checkout Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_data as $data)
                            <tr>
                                <th scope="row">{{ $loop->index+1; }}</th>
                                {{-- <td>{{ $data->room_id }}</td> --}}
                                <td>{{ $data->room->room_title }}</td>
                                <td>{{ ($data->customer_name == NULL) ? 'Not Given' : $data->customer_name }}</td>
                                <td>{{ $data->customer_phone }}</td>
                                <td>{{ $data->checkin_date }}</td>
                                <td>{{ $data->checkout_date }}</td>
                                <td>
                                    @if ($data->booking_status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                        @else
                                        <span class="badge badge-success">Approved</span>
                                    @endif
                                </td>
                                @if (Auth::user()->role == '1')
                                    <td>
                                        <a href="{{ route('booking.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a onclick="return confirm('Are You Sure to Delete this data?')" href="{{ route('booking.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                    @else
                                    <td>
                                        <a onclick="return confirm('Are You Sure to Delete this data?')" href="{{ route('booking.delete', $data->id) }}" class="btn btn-primary btn-sm">Delete</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

@endsection
