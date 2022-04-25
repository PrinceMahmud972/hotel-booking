@extends('frontend.frontend_master')
@section('frontend-content')
    <!-- Parallax Effect -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#parallax-pagetitle").parallax("50%", -0.55);
        });
    </script>

    <section class="parallax-effect">
        <div id="parallax-pagetitle" style="background-image: url(frontend/assets/images/parallax/parallax-01.jpg);">
            <div class="color-overlay">
                <!-- Page title -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('frontend.room') }}">Room list</a></li>
                                <li class="active">Room details</li>
                            </ol>
                            <h1>Room details of {{ $single_room_data->roomType->room_type_title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">

        {{-- Alert section --}}
        @if(session()->has('success'))
            <div class="alert mt-4 alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            <!-- Slider -->
            <section class="room-slider standard-slider mt50">
                <div class="col-sm-12 col-md-8">
                    <div id="owl-standard" class="owl-carousel">
                        {{-- <div class="item">
                            <a href="{{ asset($img->img_src) }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset($img->img_src) }}" alt="Bed" class="img-responsive" /></a>
                        </div> --}}

                        @foreach ($single_room_data->roomTypeImages as $img)
                            <div class="item">
                                <a href="{{ asset($img->img_src) }}" data-rel="prettyPhoto[{{ $img->id }}]"><img src="{{ asset($img->img_src) }}" alt="Bed" class="img-responsive" width="100%" style="object-fit: cover" /></a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

            <!-- Reservation form -->
            <section id="reservation-form" class="mt50 clearfix">
                <div class="col-sm-12 col-md-4">
                    <form action="{{ route('booking.store') }}" class="reservation-vertical clearfix" method="POST">
                        @csrf
                        <h2 class="lined-heading"><span>Reservation</span></h2>
                        <div class="price">
                            {{-- <h4>Double Room</h4> --}}
                            <h4>{{ $single_room_data->roomType->room_type_title }}</h4>
                            {{ $single_room_data->roomType->room_type_price }},-<span> a night</span>
                        </div>
                        {{-- <div id="message"></div> --}}
                        <!-- Error message display -->
                        <div class="form-group">
                            <label for="customerName">Name <strong class="text-danger">*</strong></label>
                            <input name="customer_name" type="text" id="customerName" value="" class="form-control" placeholder="Please enter your Name" required/>
                        </div>
                        <div class="form-group">
                            <label for="customerPhone" accesskey="E">Phone Number <strong class="text-danger">*</strong></label>
                            <input name="customer_phone" type="text" id="customerPhone" value="" class="form-control" placeholder="Please enter your Phone Number" />
                        </div>
                        <div class="form-group">
                            <select class="hidden" name="room" id="room">
                                <option selected="selected">Double Room</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="checkin">Room Check-in<strong class="text-danger">*</strong></label>
                            <input name="checkin_date" type="datetime-local" id="checkin" class="form-control checkindate" placeholder="Check-in" />
                        </div>

                        <div class="form-group">
                            <label for="checkout">Room Check-out<strong class="text-danger">*</strong></label>
                            <input name="checkout_date" type="datetime-local" id="checkout" class="form-control" placeholder="Check-out" />
                        </div>
                        <div class="form-group">
                            <label for="roomAvailable">Room Available<span class="text-danger">*</span></label>
                            <select class="form-control room-list-id" name="room_id" id="roomAvailable" >
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Book Now</button>
                    </form>
                </div>
            </section>

            <!-- Room Content -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 mt50">
                            <h2 class="lined-heading"><span>Room Details</span></h2>
                            <p class="mt50">
                                {{ $single_room_data->roomType->room_type_details }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Other Rooms -->
    <section class="rooms mt50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="lined-heading"><span>Other rooms</span></h2>
                </div>
                <!-- Room -->
                @foreach ($related_data as $data)
                <div class="col-sm-4">
                    <div class="room-thumb">
                        <img src="{{ asset('frontend/assets/images/rooms/room-01.jpg') }}" alt="room 1" class="img-responsive" />
                        <div class="mask">
                            <div class="main">
                                <h5>{{ $data->roomType->room_type_title }}</h5>
                                <div class="price">{{ $data->roomType->room_type_price }} BDT<span>a night</span></div>
                            </div>
                            <div class="content">
                                <p>{{ $data->roomType->room_type_details }}</p>
                                <a href="{{ route('details', $data->id) }}" class="btn btn-primary btn-block">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>



    @section('frontend-script')
    <script>
        $(document).ready(function(){

            // remove alert after a period of time
            setTimeout(() => {
                $('.alert').remove();
            }, 5000);


            // view room options on selcted date
            $(".checkindate").on('blur', function(){
                let checkindate = $(this).val();
                // console.log(checkindate);

                // send ajax request
                $.ajax({
                    url: '/booking/available-rooms/'+ checkindate,
                    dataType: 'json',
                    beforeSend: function(){
                        $('.room-list-id').html('<option>--Loading Data--</option>');
                    },
                    success: function(res){
                        $('#roomAvailable').find('option').remove().end();
                        $.each(res.data, function(i, row)  {
                            $('#roomAvailable').append($('<option>', {
                                value: row.room.id,
                                text: row.room.room_title + '-' + row.roomtype.room_type_title
                            }));
                        });
                    }
                });
            });
        });
    </script>
    @endsection

@endsection