<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>AmiratHotel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="shortcut icon" href="{{ asset('1.png') }}" />

       <!-- css -->
       @include('frontend.layouts.partials.css') 
        <!-- Javascripts -->
        @include('frontend.layouts.partials.js')
        
    </head>

    <body>
        <!-- Top header -->
        @include('frontend.layouts.top_header')

        <!-- Header -->
        @include('frontend.layouts.header')

        <!-- Main Content -->
        @yield('frontend-content')

        <!-- Footer -->
        @include('frontend.layouts.footer')

        <!-- Go-top Button -->
        <div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>
        @yield('frontend-script')
    </body>
</html>
