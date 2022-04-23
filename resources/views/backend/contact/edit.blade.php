@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12">
        <h1>Update Contact Form</h1>
        <div class="card mb-4">
            <!--------- Success Message Show--------->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
            @endif
            
            <div class="card-body">
                <form action="{{ route('contact.update', $edit_data->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="expenseName">Update Status<span class="text-danger">*</span></label>
                        <select name="status" class="form-control" id="">
                            <option>--select status--</option>
                            <option value="0" {{ ($edit_data->status == 0) ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ ($edit_data->status == 1) ? 'selected' : '' }}>Done</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection