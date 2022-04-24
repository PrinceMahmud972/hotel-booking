@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12">
        <h3>All Contact Message From Customer</h3>
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Status</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact_data as $data)
                            <tr>
                                <th scope="row">{{ $loop->index+1; }}</th>
                                <td>{{ $data->full_name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>
                                    @if ($data->status == 0)
                                        <span class="badge badge-danger">Not Yet</span>
                                        @else
                                        <span class="badge badge-success">Done</span>
                                    @endif
                                </td>
                                <td>{{ $data->subject }}</td>
                                <td>{{ $data->message }}</td>
                                @if (Auth::user()->role == '1')
                                    <td>
                                        <a href="{{ route('contact.view', $data->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('contact.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a onclick="return confirm('Are You Sure');" href="{{ route('contact.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                    @else
                                    <td>
                                        <a href="{{ route('contact.view', $data->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('contact.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
