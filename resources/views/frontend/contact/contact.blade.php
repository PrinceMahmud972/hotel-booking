@extends('frontend.frontend_master')
@section('frontend-content')
            {{-- <!-- GMap -->
            <div id="map">
                <p>This will be replaced with the Google Map.</p>
            </div> --}}
            <div class="container">
                <div class="row">
                    <!-- Contact form -->
                    <section id="contact-form" class="mt50">
                        <div class="col-md-8">
                            <h2 class="lined-heading"><span>Send a message</span></h2>
                            <p>
                                Send Your Message to Admin
                            </p>
                            <!------ Form Error Message Show-------->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $errors->first() }}</strong>
                                <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                </div>
                            @endif

                            {{-- @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                            </div>
                            @endif --}}

                            @if (session('success'))
                            <p>{{ session('success') }}</p>
                            @endif

                            <form class="clearfix mt50" method="post" action="{{ route('contact.store') }}" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" accesskey="U"><span class="required">*</span> Your Name</label>
                                            <input name="full_name" type="text" id="name" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" accesskey="E"><span class="required">*</span> E-mail</label>
                                            <input name="email" type="email" id="email" value="" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" accesskey="E"><span class="required">*</span> Phone</label>
                                            <input name="phone" type="phone" id="phone" value="" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subject" accesskey="S">Subject</label>
                                            <select name="subject" id="subject" class="form-control">
                                                <option value="booking">Booking</option>
                                                <option value="a Room">Room</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="comments" accesskey="C"><span class="required">*</span> Your message</label>
                                    <textarea name="message" rows="9" id="comments" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary">Send message</button>
                            </form>
                        </div>
                    </section>

                    <!-- Contact details -->
                    <section class="contact-details mt50">
                        <div class="col-md-4">
                            <h2 class="lined-heading"><span>Address</span></h2>
                            <a href="{{ asset('2.jpg') }}" data-rel="prettyPhoto"><img src="{{ asset('2.jpg') }}" alt="Our pool" class="img-thumbnail img-responsive" /></a>
                            <address class="mt50">
                                <strong>Amirat Hotel</strong><br />
                                Darshana, Chuadanga<br />
                                Bangladesh<br />
                                <abbr title="Phone">P:</abbr> <a href="#">+8801739-772375</a><br />
                                <abbr title="Email">E:</abbr> <a href="#">kowel.centralknit@gmail.com</a><br />
                                <abbr title="Website">W:</abbr> <a href="#">www.slashdown.nl</a><br />
                            </address>
                            <h2 class="lined-heading mt50"><span>Social</span></h2>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="box-icon">
                                        <a href="https://www.facebook.com/AmiratHotel">
                                            <div class="circle"><i class="fa fa-facebook fa-lg"></i></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="box-icon">
                                        <a href="https://www.facebook.com/AmiratHotel">
                                            <div class="circle"><i class="fa fa-twitter fa-lg"></i></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="box-icon">
                                        <a href="https://www.facebook.com/AmiratHotel">
                                            <div class="circle"><i class="fa fa-linkedin fa-lg"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
@endsection
