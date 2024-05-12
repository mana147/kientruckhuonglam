@extends('frontend.layouts.default')

@section('title', 'Liên hệ - Khương Huy Architecture')

@section('content')

        <!-- Page Header -->
        <div class="page_header">
            <div class="page_header_inner">
                <div class="container">
                    <div class="page_header_content d-flex align-items-center justify-content-between">
                        <h2 class="heading"><?php echo __('frontend/homepage.contact'); ?></h2>
                        <ul class="breadcrumb d-flex align-items-center">
                            <li><a href="index.html"><?php echo __('frontend/homepage.home'); ?></a></li>
                            <li class="active"><?php echo __('frontend/homepage.contact'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>        
        </div>

        
        <!-- Main Wrapper-->
        <main class="wrapper">
            <section class="gmap box_padding">
				<div class="gmapbox" data-aos="zoom-in" data-aos-duration="1000">
                    <div id="googleMap" class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.555269228481!2d105.82220067587217!3d21.010457088405868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab7e22f72327%3A0xc7ff0c696c365ba1!2zMTc4IFAuIFTDonkgU8ahbiwgVHJ1bmcgTGnhu4d0LCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1713779537231!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
			</section>

            <!-- Contact Form -->
            @include('frontend.partials.contact-form')

        </main>

@endsection