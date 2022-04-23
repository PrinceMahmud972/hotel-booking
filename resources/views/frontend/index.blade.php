@extends('frontend.frontend_master')
@section('frontend-content')
    <!-- Revolution Slider -->
    @include('frontend.layouts.slider')

    <!-- Reservation form -->
    
    <!--------- Success Message Show--------->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
    @endif
    <section id="reservation-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline reservation-horizontal clearfix" action="{{ route('booking.store') }}" role="form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="customerPhone" accesskey="E">Phone Number <strong class="text-danger">*</strong></label>
                                    <input name="customer_phone" type="text" id="customerPhone" value="" class="form-control" placeholder="Please enter your Phone Number" />
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="checkin">Room Check-in<strong class="text-danger">*</strong></label>
                                    <input name="checkin_date" type="datetime-local" id="checkin" class="form-control checkindate" placeholder="Check-in" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="checkout">Room Check-out<strong class="text-danger">*</strong></label>
                                    <input name="checkout_date" type="datetime-local" id="checkout" class="form-control" placeholder="Check-out" />
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="roomAvailable">Room Available<span class="text-danger">*</span></label>
                                    <select class="form-control room-list-id" name="room_id" id="roomAvailable" >
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-block">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card col-md-10">
                        <div class="card-header">
                            <h2>Booking Form</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customerPhone">Customer Phone No.<span class="text-danger">*</span></label>
                                        <input type="text" name="customer_phone" class="form-control" id="customerPhone" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customerPhone">Customer Phone No.<span class="text-danger">*</span></label>
                                        <input type="text" name="customer_phone" class="form-control" id="customerPhone" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Room Checkin Date<span class="text-danger">*</span></label>
                                        <input type="datetime-local" name="checkin_date" class="form-control checkindate" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Room Checkout Date<span class="text-danger">*</span></label>
                                        <input type="datetime-local" name="checkout_date" class="form-control checkoutdate" />                    
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Select Rooms</label>
                                    <select name="room_id" class="form-control room-list-id" id="">
                                        <option value="">choose</option>
                                        <option value="">1</option>
                                        <option value="">1</option>
                                        <option value="">1</option>
                                    </select>
                                </div>

                                <div class="col-md-6">

                                </div>

                                
                                
                                
                                <div class="form-group">
                                    <label for="roomAvailable">Room Available<span class="text-danger">*</span></label>
                                    <select class="form-select form-control room-list" name="room_id" id="roomAvailable">
                                        
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Rooms -->
    <section class="rooms mt50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="lined-heading"><span>Guests Favorite Rooms</span></h2>
                </div>
                <!-- Room -->
                @foreach ($room_data as $room)
                <div class="col-sm-4">
                    <div class="room-thumb">
                        {{-- <img src="{{ asset('frontend/assets/images/rooms/room-01.jpg') }}" alt="room 1" class="img-responsive" /> --}}
                        @foreach ($room->roomTypeImages as $img)
                            <img src="{{ asset($img->img_src) }}" alt="room 1" style="object-fit: cover" class="img-responsive" />
                        @endforeach
                        <div class="mask">
                            <div class="main">
                                <h5>{{ $room->roomType->room_type_title }}</h5>
                                <div class="price">  {{ $room->roomType->room_type_price }} BDT<span>a night</span></div>
                            </div>
                            <div class="content">
                                <p>{{ $room->roomType->room_type_details }}</p>
                                {{-- <div class="row">
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
                                </div> --}}
                                {{-- <a href="{{ route('frontend.room.details', $room->id) }}" class="btn btn-primary btn-block">Read More</a> --}}
                                <a href="{{ route('details', $room->id) }}" class="btn btn-primary btn-block">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- USP's -->
    <section class="usp mt100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="lined-heading"><span>USP section</span></h2>
                </div>
                @foreach ($services as $item)
                <div class="col-sm-3 bounceIn appear" data-start="0">
                    <div class="box-icon">
                        <div class="circle"><i class="{{ $item->service_icon }} fa-lg"></i></div>
                        <h3>{{ $item->service_title }}</h3>
                        <p>{{ $item->service_desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="gallery-slider mt100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="lined-heading"><span>Gallery</span></h2>
                </div>
            </div>
        </div>
        <div id="owl-gallery" class="owl-carousel">
            @foreach ($gallery_data as $gallery)
            <div class="item">
                <a href="{{ asset($gallery->img_src) }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset($gallery->img_src) }}" alt="Image 1" /><i class="fa fa-search"></i></a>
            </div>
            @endforeach

            {{-- <div class="item">
                <a href="{{ asset('frontend/assets/images/gallery/2.jpg') }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset('frontend/assets/images/gallery/2.jpg') }}" alt="Image 2" /><i class="fa fa-search"></i></a>
            </div>
            <div class="item">
                <a href="{{ asset('frontend/assets/images/gallery/3.jpg') }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset('frontend/assets/images/gallery/3.jpg') }}" alt="Image 3" /><i class="fa fa-search"></i></a>
            </div>
            <div class="item">
                <a href="{{ asset('frontend/assets/images/gallery/4.jpg') }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset('frontend/assets/images/gallery/4.jpg') }}" alt="Image 4" /><i class="fa fa-search"></i></a>
            </div> --}}
        </div>
    </section>

    <div class="container">
        <div class="row">
            <!-- Testimonials -->
            <section class="testimonials mt100">
                <div class="col-md-6">
                    <h2 class="lined-heading bounceInLeft appear" data-start="0"><span>What Other Visitors Experienced</span></h2>
                    <div id="owl-reviews" class="owl-carousel">
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-2 col-xs-12"><img src="{{ asset('frontend/assets/images/reviews/review-01.jpg') }}" alt="Review 1" class="img-circle" /></div>
                                <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
                                    <div class="text-balloon">Searched the internet and i found, booked and visited this hotel that i like to call utopia... <span>Kim Jones, Single Room</span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-2 col-xs-12"><img src="{{ asset('frontend/assets/images/reviews/review-02.jpg') }}" alt="Review 2" class="img-circle" /></div>
                                <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
                                    <div class="text-balloon">I give it a 5 out of 5! Great hotel, friendly staff, clean, relaxing... Yep i'm coming back! ;-) <span>Sandra Donnathan, Double Room</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-2 col-xs-12"><img src="{{ asset('frontend/assets/images/reviews/review-03.jpg') }}" alt="Review 3" class="img-circle" /></div>
                                <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
                                    <div class="text-balloon">Such a nice place... Next time i will book a 3 weeks stay at this place. <span>Rosanne O'Donald, Single Room</span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-2 col-xs-12"><img src="{{ asset('frontend/assets/images/reviews/review-04.jpg') }}" alt="Review 4" class="img-circle" /></div>
                                <div class="col-lg-9 col-md-8 col-sm-10 col-xs-12">
                                    <div class="text-balloon">By far the best hotel in the city! Location is nice and the service is great! <span>Carl Adams, Single Room</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- About -->
            <section class="about mt100">
                <div class="col-md-6">
                    <h2 class="lined-heading bounceInRight appear" data-start="800"><span>Hotel Tabs</span></h2>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#hotel" data-toggle="tab">Our hotels</a></li>
                        <li><a href="#events" data-toggle="tab">Events</a></li>
                        <li><a href="#kids" data-toggle="tab">Kids</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="hotel">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum. In hendrerit risus arcu, in eleifend metus dapibus varius. Nulla dolor sapien,
                                laoreet vel tincidunt non, egestas non justo. Phasellus et mattis lectus, et gravida urna.
                            </p>
                            <p>
                                <img src="{{ asset('frontend/assets/images/tab/restaurant-01.jpg') }}" alt="food" class="pull-right" /> Donec pretium sem non tincidunt iaculis. Nunc at pharetra eros, a varius leo. Mauris id hendrerit justo. Mauris egestas magna vitae
                                nisi ultricies semper. Nam vitae suscipit magna. Nam et felis nulla. Ut nec magna tortor. Nulla dolor sapien, laoreet vel tincidunt non, egestas non justo.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="events">
                            Phasellus sodales justo felis, a vestibulum risus mattis vitae. Aliquam vitae varius elit, non facilisis massa. Vestibulum luctus diam mollis gravida bibendum. Aliquam mattis velit dolor, sit amet semper erat
                            auctor vel. Integer auctor in dui ac vehicula. Integer fermentum nunc ut arcu feugiat, nec placerat nunc tincidunt. Pellentesque in massa eu augue placerat cursus sed quis magna.
                        </div>
                        <div class="tab-pane fade" id="kids">
                            Aa vestibulum risus mattis vitae. Aliquam vitae varius elit, non facilisis massa. Vestibulum luctus diam mollis gravida bibendum. Aliquam mattis velit dolor, sit amet semper erat auctor vel. Integer auctor in
                            dui ac vehicula. Integer fermentum nunc ut arcu feugiat, nec placerat nunc tincidunt. Pellentesque in massa eu augue placerat cursus sed quis magna.
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

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
                        htmldata += '<option value="'+row.room.id+'">'+row.room.room_title +'-'+row.roomtype.room_type_title+'</option>';
                    });
                    $('.room-list-id').html(htmldata);
                }
            });
        });
    });
</script>
@endsection

@endsection