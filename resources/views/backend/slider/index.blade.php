@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12">
        <h3>
            Services List
            <a href="{{ route('backend.slider.create') }}" class="btn btn-primary btn-sm float-right">Add New Slider</a>
        </h3>
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
                        <th scope="col">Slider Image</th>
                        <th scope="col">Slider Title</th>
                        <th scope="col">Slider Short Desc</th>
                        <th scope="col" style="width: 15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_data as $data)
                        <tr>
                            <th>{{ $loop->index+1 }}</th>
                            <th><img src="{{ asset($data->slider_image) }}" height="50px" width="100px" style="object-fit: cover" alt=""></th>
                            <th>{{ $data->slider_title }}</th>
                            <th>{{ $data->slider_short_desc }}</th>
                            <th>
                               @if (Auth::user()->role == '1')
                                    <a href="{{ route('backend.slider.edit',$data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a onclick="return confirm('Are You Sure?')" href="{{ route('backend.slider.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
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