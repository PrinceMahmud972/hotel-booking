@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-8 col-md-12 col-sm-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create New Booking </h6>
                <a href="{{ route('booking') }}" class="btn btn-primary btn-sm float-end">Back</a>
            </div>
            <!------ Form Error Message Show-------->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first() }}</strong>
                <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                </div>
            @endif
            
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="customerName">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" id="customerName"/>
                    </div> --}}
                    <div class="form-group">
                        <label for="customerPhone">Customer Phone No.<span class="text-danger">*</span></label>
                        <input type="text" name="customer_phone" class="form-control" id="customerPhone" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Room Checkin Date<span class="text-danger">*</span></label>
                        <input type="datetime-local" name="checkin_date" class="form-control checkindate" />
                    </div>
                    <div class="form-group">
                        <label for="">Room Checkout Date<span class="text-danger">*</span></label>
                        <input type="datetime-local" name="checkout_date" class="form-control checkoutdate" />                    
                    </div>
                    <div class="form-group">
                        <label for="roomAvailable">Room Available<span class="text-danger">*</span></label>
                        <select class="form-select form-control room-list" name="room_id" id="roomAvailable">
                            
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-select form-control" name="booking_status" id="status">
                            <option>--select status--</option>
                            <option value="0">Pending</option>
                            <option value="1">Approved</option>
                        </select>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".checkindate").on('blur', function(){
                let checkindate = $(this).val();
                
                // send ajax request
                $.ajax({
                    url: '/booking/available-rooms/'+ checkindate,
                    dataType: 'json',
                    beforeSend: function(){
                        $('.room-list').html('<option>--Loading Data--</option>');
                    },
                    success: function(res){
                        // console.log(res);
                        let htmldata = '';
                        $.each(res.data, function(index, row){
                            htmldata += '<option value="'+row.id+'">'+row.room_title+'</option>';
                        });
                        $('.room-list').html(htmldata);
                    }
                });
            });
        });
    </script>
@endsection

@endsection