<header>
    <!-- Navigation -->
    <div class="navbar yamm navbar-default" id="sticky">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                <a href="{{ url('/') }}" class="navbar-brand">
                    <!-- Logo -->
                    <h1>Amirat Hotel</h1>
                    {{-- <div id="logo"><img id="default-logo" src="{{ asset('frontend/assets/images/logo.jpg') }}" alt="Starhotel" style="height: 44px;" /> <img id="retina-logo" src="{{ asset('frontend/assets/images/logo.jpg') }}" alt="Starhotel" style="height: 44px;" /></div> --}}
                </a>
            </div>
            <div id="navbar-collapse-grid" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown active"><a href="{{ url('/') }}">Home</a></li>
                    <li class="dropdown"><a href="{{ route('frontend.room') }}">Rooms</a></li>
                    {{-- <li class="dropdown"><a href="{{ route('frontend.blog') }}">Blog</a></li> --}}

                    <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                    <li><a href="{{ route('frontend.contact') }}">Contact</a></li>

                </ul>
            </div>
        </div>
    </div>
</header>