<section class="revolution-slider">
    <div class="bannercontainer">
        <div class="banner">
            <ul>
                <!-- Slide 1 -->
                @foreach ($slider as $item)
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1000">
                    <!-- Main Image -->
                    <img src="{{ asset($item->slider_image) }}" style="opacity: 0;" alt="slidebg1" data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat" />
                    <!-- Layers -->
                    <!-- Layer 1 -->
                    <div class="caption sft revolution-starhotel bigtext" data-x="505" data-y="30" data-speed="700" data-start="1700" data-easing="easeOutBack">
                        <span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> {{ $item->slider_title }}
                        <span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span>
                    </div>
                    <!-- Layer 2 -->
                    <div class="caption sft revolution-starhotel smalltext" data-x="605" data-y="105" data-speed="800" data-start="1700" data-easing="easeOutBack">
                        <span>{{ $item->slider_short_desc }}</span>
                    </div>
                    <!-- Layer 3 -->
                    <div class="caption sft" data-x="775" data-y="175" data-speed="1000" data-start="1900" data-easing="easeOutBack">
                        <a class="button btn btn-purple btn-lg">For Booking Fillup The form</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>