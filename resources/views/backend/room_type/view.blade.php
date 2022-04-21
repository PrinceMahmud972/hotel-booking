@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <a href="{{ route('room.type') }}" class="btn btn-primary float-right">Back</a><br><br>
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h4">RoomType: <span class="badge badge-info">{{ $view_data->room_type_title }}</span></h4>
            </div>
            <div class="card-body">
                <ul>
                    <li class="list-group-item"><strong>RoomType Price:</strong> {{ $view_data->room_type_price }}tk</li>
                    <li class="list-group-item"><strong>Prepared By:</strong> <span class="badge badge-info">{{ $view_data->prepared_by }}</span></li>
                    <li class="list-group-item"><strong>RoomType Details:</strong><br>{{ $view_data->room_type_details }}</li>
                </ul>
            </div>
            
            <div class="card-footer">
                <strong>RoomType Images</strong>
                <div class="col-md-12 d-flex flex-row align-items-center justify-content-start">
                    @foreach ($view_data->roomTypeImages as $img)
                        <div class="card col-md-2 mr-2">
                            <div class="card-body">
                                <img src="{{ asset($img->img_src) }}" height="150px" width="150px" alt="">
                            </div>
                        </div>
                    @endforeach
               </div>
            </div>
        </div>
    </div>
</div>

@endsection