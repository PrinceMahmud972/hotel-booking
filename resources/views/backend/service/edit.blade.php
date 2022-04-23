@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Service Data</h6>
            </div>
            <!------ Form Error Message Show-------->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first() }}</strong>
                <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('backend.service.update', $edit_data->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="serviceIcon">Service Icon(Icon class only)<span class="text-danger">*</span></label>
                        <input type="text" name="service_icon" value="{{ $edit_data->service_icon }}" class="form-control" id="serviceIcon" />
                    </div>
                    <div class="form-group">
                        <label for="serviceTitle">Service Title<span class="text-danger">*</span></label>
                        <input type="text" name="service_title" value="{{ $edit_data->service_title }}" class="form-control" id="serviceTitle" />
                    </div>
                    <div class="form-group">
                        <label for="serviceDesc">Service Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="service_desc" id="serviceDesc" cols="30" rows="4">
                            {{ $edit_data->service_desc }}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection