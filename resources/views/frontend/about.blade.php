@extends('frontend.layouts.default')

@section('title','Giới thiệu - Kiến trúc Khương Lâm')

@section('content')
        <main class="wrapper">
            <!-- Scroll Progress -->
            
            <!-- Our Mission -->
            <section class="mission">
                <div class="container">         
                    <div class="mission_top_part">
                        <div class="section-header text-center">
                            <h6 class="text-white text-uppercase"><?php echo __('frontend/homepage.mission'); ?></h6>
                            <p class="text-gray-600">Với tư tưởng không chạy theo lợi nhuận và thương mại, Công ty luôn đặt tiêu chí "chất lượng, chữ tâm và sự uy tín" 
                                lên hàng đầu, mong muốn mang lại trải nghiệm sống tốt nhất cho khách hàng và đặt lợi ích của khách hàng lên hàng đầu. Luôn cố gắng dung hòa
                                được mong muốn của khách hàng và thiết kế để mang đến giá trị trọn vẹn nhất.
                            </p>
                        </div>
                        <div class="has_line"></div>
                        <img src="<?php echo url("frontend"); ?>/assets/img/bg/about_bg.jpg" alt="">
                    </div>

                    <div class="mission_bottom_part">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 pe-lg-4">
                                <div class="section-header">
                                    <h3 class="text-white text-uppercase border-line">Giới thiệu Khương Lâm Architecture</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 ps-lg-4">
                                <div class="mission_content">
                                    <p>Công ty TNHH kiến trúc Khương Lâm (Khương Lâm Architecture) (tên gọi tắt là KL.A) được thành lập từ năm 2022, là một trong những đơn vị chuyên sâu đi đầu trong lĩnh vực thiết kế, thi công nội thất. 
                                        Công ty cung cấp đồng bộ, quy trình khép kín từ khâu thiết kế - thi công xây dựng - sản xuất lắp đặt nội thất.</p>
                                    <p>Khương Lâm Architecture tự hào là đơn vị tổng thể, tập trung hoàn thiện căn hộ, nhà ở, các dạng công trình chung cư, nhà phố, nhà vườn, biệt thự khu vực Hà Nội, Hải Dương, Thái Nguyên...</p>
                                    <p>Khương Lâm Architecture đồng thời sở hữu nhà máy sản xuất đồ gỗ nội thất riêng, quy mô 2000m2 tại đại lộ Thăng Long.</p>
                                    <h4>CÔNG TY TNHH KIẾN TRÚC KHƯƠNG LÂM</h4>
                                    <p>VPGD: 178/22 Tây Sơn - Đống Đa - Hà Nội</p>
                                    <p>Hotline: 097 612 73 23 | 091 776 57 48</p>
                                    <p>Email: kientruckhuonglam@gmail.com </p>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </section>

            <!--<div class="video-block" data-aos="zoom-in" data-aos-duration="500">
                <div class="container">
                    <div class="video_post">
                        <div class="ytube_video">
                            <iframe id="ytvideo" src="https://www.youtube.com/embed/fEErySYqItI" allow="autoplay;" allowfullscreen></iframe>
                            <div class="post_content">
                                <div class="ytplay_btn"><i class="bi bi-play-fill"></i></div>
                                <img src="../assets/img/bg/video_bg.jpg" alt="video">
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

            <!-- Funfacts -->
            @include('frontend.partials.funfacts')

            
            <!-- Service -->
            <section class="services inner pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4" data-aos="fade-up" data-aos-duration="500">
                            <div class="icon_box">
                                <h6>01</h6>
                                <img src="<?php echo url("frontend"); ?>/assets/img/icon_box/d1.svg" alt="Icon Box">
                                <h4 class="text-white"><a href="service-1.html">Thiết kế</a></h4>
                                <p class="text-gray-600">Khương Lâm Architecture cung cấp đồng bộ, quy trình khép kín từ thiết kế, thi công xây dựng, sản xuất lắp đặt nội thất.</p>
                                <div class="arrow_effect">
                                    <a href="service-1.html"><span class="crossline1"></span><span class="crossline2"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-duration="700">
                            <div class="icon_box">
                                <h6>02</h6>
                                <img src="<?php echo url("frontend"); ?>/assets/img/icon_box/d1.svg" alt="Icon Box">
                                <h4 class="text-white"><a href="service-1.html">Thi công xây dựng</a></h4>
                                <p class="text-gray-600">Khương Lâm Architecture cung cấp đồng bộ, quy trình khép kín từ thiết kế, thi công xây dựng, sản xuất lắp đặt nội thất.</p>
                                <div class="arrow_effect">
                                    <a href="service-1.html"><span class="crossline1"></span><span class="crossline2"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-duration="900">
                            <div class="icon_box">
                                <h6>03</h6>
                                <img src="<?php echo url("frontend"); ?>/assets/img/icon_box/d1.svg" alt="Icon Box">
                                <h4 class="text-white"><a href="service-1.html">Sản xuất lắp đặt nội thất</a></h4>
                                <p class="text-gray-600">Khương Lâm Architecture cung cấp đồng bộ, quy trình khép kín từ thiết kế, thi công xây dựng, sản xuất lắp đặt nội thất.    </p>
                                <div class="arrow_effect">
                                    <a href="service-1.html"><span class="crossline1"></span><span class="crossline2"></span></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

            <section class="highlight_banner bg-dark-200">
                <div class="container">
                    <div class="row justify-content-center" data-aos="flip-up" data-aos-duration="500">
                        <div class="col-lg-11 p-lg-0">
                            <p class="about_para text-center">chúng tôi luôn đặt tiêu chí <span><a href="#">chất lượng, chữ tâm</a></span> và <span><a href="#">sự uy tín </a></span> lên hàng đầu !</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Our Team -->
            

            <!-- Testimonial -->
           

            <!-- Contact -->
            @include('frontend.partials.contact-form')

        </main>

@endsection