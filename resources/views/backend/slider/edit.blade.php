@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Slider Information</h6>
                <a href="{{ route('backend.slider') }}" class="btn btn-primary float-right">Back</a>
            </div>
            <!------ Form Error Message Show-------->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first() }}</strong>
                <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('backend.slider.update', $edit_data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="newSliderImage">New Slider Image</label>
                        <input type="file" name="new_slider_image"  class="form-control" id="newSliderImage" />
                    </div>
                    <div class="form-group">
                        <h6>New Slider Image</h6>
                        <img src="{{ asset($edit_data->slider_image) }}" height="150px" width="100%" style="object-fit: cover" alt="">
                    </div>
                    <div class="form-group">
                        <label for="sliderTitle">Slider Title</label>
                        <input type="text" name="slider_title" value="{{ $edit_data->slider_title }}" class="form-control" id="sliderTitle" />
                    </div>
                    <div class="form-group">
                        <label for="sliderDesc">Slider Short Description</label>
                        <textarea class="form-control" name="slider_short_desc" id="sliderDesc" cols="30" rows="4">
                            {{ $edit_data->slider_short_desc }}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection