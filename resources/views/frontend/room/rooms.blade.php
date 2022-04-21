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
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Rooms list view</li>
                            </ol>
                            <h1>Rooms list view</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-pills" id="filters">
                    <li class="active"><a href="#" data-filter="*">All</a></li>
                    <li><a href="#" data-filter=".single">Single Room</a></li>
                    <li><a href="#" data-filter=".double">Double Room</a></li>
                    <li><a href="#" data-filter=".executive">Executive Room</a></li>
                    <li><a href="#" data-filter=".apartment">Apartment</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Rooms -->
    <section class="rooms mt100">
        <div class="container">
            <div class="row room-list fadeIn appear">
                <!-- Room -->
                @foreach ($room_data as $item)
                <div class="col-sm-4 single">
                    <div class="room-thumb">
                        <img src="{{ asset('frontend/assets/images/rooms/room-01.jpg') }}" alt="room 1" class="img-responsive" />
                        <div class="mask">
                            <div class="main">
                                <h5>{{ $item->roomType->room_type_title }}</h5>
                                <div class="price">{{ $item->roomType->room_type_price }} BDT<span>a night</span></div>
                            </div>
                            <div class="content">
                                <p>{{ $item->roomType->room_type_details }}</p>
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
                                {{-- <a href="{{ route('frontend.room.details', $item->id) }}" class="btn btn-primary btn-block">Book Now</a> --}}
                                <a href="{{ route('details', $item->id) }}" class="btn btn-primary btn-block">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection