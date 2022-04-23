@extends('backend.admin_master')
@section('backend_content')
    <div class="row">
        <div class="card col-md-10 col-sm-12">
            <div class="card-header">
                <h2>Contact Details
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </h2>
                
                <hr>
            </div>
           <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Full Name: </strong> {{ $single_view_data->full_name }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $single_view_data->email }} </li>
                    <li class="list-group-item"><strong>Phone:</strong> {{ $single_view_data->phone }}</li>
                    <li class="list-group-item"><strong>Subject:</strong> {{ $single_view_data->subject }}</li>
                    <li class="list-group-item"><strong>Created Date:</strong> {{ date('d-m-Y h:i:s A', strtotime($single_view_data->created_at)) }}</li>
                    <li class="list-group-item"><strong>Updated Date:</strong> {{ date('d-m-Y h:i:s A', strtotime($single_view_data->updated_at)) }}</li>
                    <li class="list-group-item"><strong>Message:</strong> <br> {{ $single_view_data->message }}</li>
                </ul>
           </div>
        </div>
    </div>
@endsection