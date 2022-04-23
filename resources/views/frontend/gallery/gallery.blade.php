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
                                <li class="active">Gallery</li>
                            </ol>
                            <h1>Gallery</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <!-- Filter -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-pills" id="filters">
                    <li class="active"><a href="#" data-filter="*">All</a></li>
                    <li><a href="#" data-filter=".rooms">Rooms</a></li>
                    <li><a href="#" data-filter=".restaurant">Restaurant</a></li>
                    <li><a href="#" data-filter=".pool">Swimming Pool</a></li>
                    <li><a href="#" data-filter=".business">Business</a></li>
                </ul>
            </div>
        </div>
    </div> --}}

    <!-- Gallery -->
    <section id="gallery" class="mt50">
        <div class="container">
            <div class="row gallery">
                <!-- Image 1 -->
                @foreach ($gallery_data as $gallery)
                <div class="col-sm-3 restaurant fadeIn appear" data-start="200">

                    <a href="{{ asset($gallery->img_src) }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset($gallery->img_src) }}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a>
                </div>
                @endforeach
                
                {{-- <!-- Image 2 -->
                <div class="col-sm-3 pool fadeIn appear" data-start="200">
                    <a href="{{ asset('frontend/assets/images/gallery/2.jpg') }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset('frontend/assets/images/gallery/2.jpg') }}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a>
                </div>
                <!-- Image 3 -->
                <div class="col-sm-3 restaurant fadeIn appear" data-start="200">
                    <a href="{{ asset('frontend/assets/images/gallery/3.jpg') }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset('frontend/assets/images/gallery/3.jpg') }}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a>
                </div>
                <!-- Image 4 -->
                <div class="col-sm-3 pool fadeIn appear" data-start="200">
                    <a href="{{ asset('frontend/assets/images/gallery/4.jpg') }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset('frontend/assets/images/gallery/4.jpg') }}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a>
                </div>
                <!-- Image 5 -->
                <div class="col-sm-3 business fadeIn appear" data-start="200">
                    <a href="{{ asset('frontend/asstes/images/gallery/5.jpg') }}" data-rel="prettyPhoto[gallery1]"><img src="{{ asset('frontend/assets/images/gallery/5.jpg') }}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a>
                </div> --}}
            </div>
        </div>
    </section>
@endsection