@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create New Room Type</h6>
            </div>
            <!------ Form Error Message Show-------->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first() }}</strong>
                <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('room.type.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="roomTypeTitle">Room Type Title<span class="text-danger">*</span></label>
                        <input type="text" name="room_type_title" class="form-control" id="roomTypeTitle" required/>
                    </div>
                    <div class="form-group">
                        <label for="roomTypeDetails">Room Type Details<span class="text-danger">*</span></label>
                        <textarea name="room_type_details" class="form-control" id="" cols="15" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="roomTypePrice">Room Type Price<span class="text-danger">*</span></label>
                        <input type="text" name="room_type_price" class="form-control" id="roomTypePrice" required/>
                    </div>
                    <div class="form-group">
                        <label for="gallery">Gallery<span class="text-danger">*</span></label>
                        <input type="file" multiple name="images[]" class="form-control" id="gallery" required/>
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