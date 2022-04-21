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
        <div class="row">
            <!-- Slider -->
            <section class="room-slider standard-slider mt50">
                <div class="col-sm-12 col-md-8">
                    <div id="owl-standard" class="owl-carousel">
                        <div class="item">
                            <a href="{{ asset('frontend/assets/images/rooms/slider/room-slider-02.jpg') }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset('frontend/assets/images/rooms/slider/room-slider-02.jpg') }}" alt="Bed" class="img-responsive" /></a>
                        </div>
                        <div class="item">
                            <a href="{{ asset('frontend/assets/images/rooms/slider/room-slider-03.jpg') }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset('frontend/assets/images/rooms/slider/room-slider-03.jpg') }}" alt="Bathroom" class="img-responsive" /></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reservation form -->
            <section id="reservation-form" class="mt50 clearfix">
                <div class="col-sm-12 col-md-4">
                    <form action="{{ route('booking.store') }}" class="reservation-vertical clearfix" method="POST">
                        <h2 class="lined-heading"><span>Reservation</span></h2>
                        <div class="price">
                            {{-- <h4>Double Room</h4> --}}
                            <h4>{{ $single_room_data->roomType->room_type_title }}</h4>
                            {{ $single_room_data->roomType->room_type_price }},-<span> a night</span>
                        </div>
                        {{-- <div id="message"></div> --}}
                        <!-- Error message display -->
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
                            <h3 class="mt50">Table overview</h3>
                            <table class="table table-striped mt30">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-check-circle"></i> Double Bed</td>
                                        <td><i class="fa fa-check-circle"></i> Free Internet</td>
                                        <td><i class="fa fa-check-circle"></i> Free Newspaper</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-check-circle"></i> 60 square meter</td>
                                        <td><i class="fa fa-check-circle"></i> Beach view</td>
                                        <td><i class="fa fa-check-circle"></i> 2 persons</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-check-circle"></i> Double Bed</td>
                                        <td><i class="fa fa-check-circle"></i> Free Internet</td>
                                        <td><i class="fa fa-check-circle"></i> Breakfast included</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-check-circle"></i> Private Balcony</td>
                                        <td><i class="fa fa-check-circle"></i> Flat Screen TV</td>
                                        <td><i class="fa fa-check-circle"></i> Jacuzzi</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="mt50">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ligula nibh, cursus id euismod non, scelerisque nec nibh. Nam semper, ligula a rhoncus fermentum, libero lacus vulputate felis, id auctor
                                mauris urna quis diam.
                            </p>
                        </div>
                        <div class="col-sm-5 mt50">
                            <h2 class="lined-heading"><span>Overview</span></h2>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                                <li><a href="#facilities" data-toggle="tab">Facilities</a></li>
                                <li><a href="#extra" data-toggle="tab">Extra</a></li>
                            </ul>
                            <!-- Tab panels -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="overview">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum. In hendrerit risus arcu, in eleifend metus dapibus varius. Nulla dolor
                                        sapien, laoreet vel tincidunt non, egestas non justo. Phasellus et mattis lectus, et gravida urna.
                                    </p>
                                    <p>
                                        <img src="{{ asset('frontend/assets/images/tab/restaurant-01.jpg') }}" alt="food" class="pull-right" /> Donec pretium sem non tincidunt iaculis. Nunc at pharetra eros, a varius leo. Mauris id hendrerit justo. Mauris egestas
                                        magna vitae nisi ultricies semper. Nam vitae suscipit magna. Nam et felis nulla. Ut nec magna tortor. Nulla dolor sapien, laoreet vel tincidunt non, egestas non justo.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="facilities">
                                    Phasellus sodales justo felis, a vestibulum risus mattis vitae. Aliquam vitae varius elit, non facilisis massa. Vestibulum luctus diam mollis gravida bibendum. Aliquam mattis velit dolor, sit amet
                                    semper erat auctor vel. Integer auctor in dui ac vehicula. Integer fermentum nunc ut arcu feugiat, nec placerat nunc tincidunt. Pellentesque in massa eu augue placerat cursus sed quis magna.
                                </div>
                                <div class="tab-pane fade" id="extra">
                                    Aa vestibulum risus mattis vitae. Aliquam vitae varius elit, non facilisis massa. Vestibulum luctus diam mollis gravida bibendum. Aliquam mattis velit dolor, sit amet semper erat auctor vel. Integer
                                    auctor in dui ac vehicula. Integer fermentum nunc ut arcu feugiat, nec placerat nunc tincidunt. Pellentesque in massa eu augue placerat cursus sed quis magna.
                                </div>
                            </div>
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
                <div class="col-sm-4">
                    <div class="room-thumb">
                        <img src="{{ asset('frontend/assets/images/rooms/room-01.jpg') }}" alt="room 1" class="img-responsive" />
                        <div class="mask">
                            <div class="main">
                                <h5>Double bedroom</h5>
                                <div class="price">&euro; 99<span>a night</span></div>
                            </div>
                            <div class="content">
                                <p><span>A modern hotel room in Star Hotel</span> Nunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.</p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                            <li><i class="fa fa-check-circle"></i> Private balcony</li>
                                            <li><i class="fa fa-check-circle"></i> Sea view</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i> Free Wi-Fi</li>
                                            <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                            <li><i class="fa fa-check-circle"></i> Bathroom</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="##" class="btn btn-primary btn-block">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Room -->
                <div class="col-sm-4">
                    <div class="room-thumb">
                        <img src="{{ asset('frontend/assets/images/rooms/room-02.jpg') }}" alt="room 2" class="img-responsive" />
                        <div class="mask">
                            <div class="main">
                                <h5>King Size Bedroom</h5>
                                <div class="price">&euro; 149<span>a night</span></div>
                            </div>
                            <div class="content">
                                <p><span>A modern hotel room in Star Hotel</span> Nunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.</p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                            <li><i class="fa fa-check-circle"></i> Private balcony</li>
                                            <li><i class="fa fa-check-circle"></i> Sea view</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i> Free Wi-Fi</li>
                                            <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                            <li><i class="fa fa-check-circle"></i> Bathroom</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="##" class="btn btn-primary btn-block">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Room -->
                <div class="col-sm-4">
                    <div class="room-thumb">
                        <img src="{{ asset('frontend/assets/images/rooms/room-03.jpg') }}" alt="room 3" class="img-responsive" />
                        <div class="mask">
                            <div class="main">
                                <h5>Single room</h5>
                                <div class="price">&euro; 120<span>a night</span></div>
                            </div>
                            <div class="content">
                                <p><span>A modern hotel room in Star Hotel</span> Nunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.</p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                            <li><i class="fa fa-check-circle"></i> Private balcony</li>
                                            <li><i class="fa fa-check-circle"></i> Sea view</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i> Free Wi-Fi</li>
                                            <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                            <li><i class="fa fa-check-circle"></i> Bathroom</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="##" class="btn btn-primary btn-block">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('frontend-script')
    <script>
        $(document).ready(function(){
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
                        // console.log(res);
                        let htmldata = '';
                        $.each(res.data, function(index, row){
                            htmldata += '<option value="'+row.id+'">'+row.room_title+'</option>';
                        });
                        $('.room-list-id').html(htmldata);
                    }
                });
            });
        });
    </script>
    @endsection

@endsection