@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12">
        <h3>
            Services List
            <a href="{{ route('backend.service.create') }}" class="btn btn-primary btn-sm float-right">Add New Service</a>
        </h3>
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
                            <th scope="col">Service Icon</th>
                            <th scope="col">Title</th>
                            <th scope="col">Service Desc</th>
                            <th scope="col" style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_data as $data)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <th>{{ $data->service_icon }}</th>
                                <th>{{ $data->service_title }}</th>
                                <th>{{ $data->service_desc }}</th>
                                <th>
                                   @if (Auth::user()->role == '1')
                                        <a href="{{ route('backend.service.edit',$data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a onclick="return confirm('Are You Sure?')" href="{{ route('backend.service.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
