@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create New Room</h6>
            </div>
            <!------ Form Error Message Show-------->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first() }}</strong>
                <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('room.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="selectRoomType">Select Room Type<span class="text-danger">*</span></label>
                        <select class="form-control" name="room_type_id" id="selectRoomType">
                          <option selected>--choose room type--</option>
                          @foreach ($room_type_data as $room_type)
                            <option value="{{ $room_type->id }}">{{ $room_type->room_type_title }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roomTitle">Room Title<span class="text-danger">*</span></label>
                        <input type="text" name="room_title" class="form-control" id="roomTitle" required/>
                    </div>
                    <div class="form-group">
                        <label for="preparedBy">Prepared By<span class="text-danger"></span></label>
                        <input type="text" name="prepared_by" value="{{ Auth::user()->name; }}" class="form-control" id="preparedBy" readonly />
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection