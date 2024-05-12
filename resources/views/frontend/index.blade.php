@extends('frontend.layouts.homepage')

@section('title','Trang chủ - Kiến trúc Khương Lâm')

@section('content')
<main class="wrapper">
            <div class="theme_slider bg-black">
                <div class="container">
                    <div class="swiper swiper_theme_slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="slider" style="background-image: url('<?php echo url("frontend"); ?>/assets/img/slider/slide01.jpg')">
                                    <div class="slide_content">
                                        <div class="slide_content_wrapper mb-0 h-auto bg-dark-100">
                                            <div class="slide_content_inner">
                                                <div class="meta m-0">
                                                    <div class="category text-olive text-uppercase">Chung cư</div>
                                                </div>
                                                <h4><a href="project-details.html" class="text-white">Chung cư Mr. Hiển</a></h4>
                                                <div class="details_link">
                                                    <a href="<?php echo url()->current(); ?>">
                                                        <span class="link_text">Chi tiết</span> 
                                                        <span class="link_icon">
                                                            <span class="line"></span> 
                                                            <span class="circle"></span>
                                                            <span class="dot"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="slider" style="background-image: url('<?php echo url("/frontend/"); ?>/assets/img/slider/slide02.jpg')">
                                    <div class="slide_content">
                                        <div class="slide_content_wrapper mb-0 h-auto bg-dark-100">
                                            <div class="slide_content_inner">
                                                <div class="meta m-0">
                                                    <div class="category text-olive text-uppercase">House</div>
                                                </div>
                                                <h4><a href="project-details.html" class="text-white">Gia Miêu House - Hà Trung, Thanh Hóa</a></h4>
                                                <div class="details_link">
                                                    <a href="<?php echo url()->current(); ?>">
                                                        <span class="link_text">Chi tiết</span> 
                                                        <span class="link_icon">
                                                            <span class="line"></span> 
                                                            <span class="circle"></span>
                                                            <span class="dot"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="slider" style="background-image: url('<?php echo url(""); ?>/frontend/assets/img/slider/slide03.jpg')">
                                    <div class="slide_content">
                                        <div class="slide_content_wrapper mb-0 h-auto bg-dark-100">
                                            <div class="slide_content_inner">
                                                <div class="meta m-0">
                                                    <div class="category text-olive text-uppercase">Villa</div>
                                                </div>
                                                <h4><a href="<?php echo url()->current(); ?>" class="text-white">Concept 3 - Villa 2 tầng</a></h4>
                                                <div class="details_link">
                                                    <a href="project-details.html">
                                                        <span class="link_text">Chi tiết</span> 
                                                        <span class="link_icon">
                                                            <span class="line"></span> 
                                                            <span class="circle"></span>
                                                            <span class="dot"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- Add Buttons -->
                        <div class="swiper-navigation">
                            <div class="swiper-button-prev"><i class="bi bi-arrow-left"></i></div>
                            <div class="swiper-button-next"><i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="divider_bg bg-dark-100"></div>
            </div>

            <!-- Service -->
            @include('frontend.partials.services')

            <!-- About -->
            @include('frontend.partials.about')

            <!-- Funfacts -->
            @include('frontend.partials.funfacts')

            <!-- ----- running projects ----- -->
            

            <!-- ***** danh muc du an noi bat ***** -->
            <section class="projects packery">
                <!-- Section Grid Lines -->
                <ul class="grid_lines d-none d-md-flex justify-content-between">
                    <li class="grid_line"></li>
                    <li class="grid_line"></li>
                    <li class="grid_line"></li>
                    <li class="grid_line"></li>
                    <li class="grid_line"></li>
                    <li class="grid_line"></li>
                    <li class="grid_line"></li>
                </ul>
                <div class="large_font">
                    <h2 class="floating_element text-dark-200 d-flex justify-content-center" data-aos="fade-right" data-aos-duration="1000"><?php echo __('frontend/homepage.project'); ?></h2>
                </div>
                <div class="container">
                    <div class="section-header text-center has_line">
                        <h2 class="text-white">Danh mục dự án</h2>
                        <div class="section-desc row align-items-center justify-content-center">
                            <div class="col-lg-6 text-end">
                                <p>Với triết lý kinh doanh không chạy theo lợi nhuận và thương mại, Công ty luôn đặt tiêu chí "chất lượng, chữ tâm và sự uy tín" lên hàng đầu.</p>
                            </div>
                            <div class="col-lg-6 text-start">
                                <p>Khương Lâm Architecture tự hào là đơn vị tổng thể, tập trung hoàn thiện căn hộ, nhà ở, các dạng công trình chung cư, nhà phố, nhà vườn, biệt thự...</p>
                            </div>
                        </div>
                    </div>

                    <div class="portfolio-filters-content">
                        <div class="filters-button-group">
                            <button class="button is-checked" data-filter="*">Tất cả<sup class="filter-count"></sup></button>
                            <?php foreach($projectCategories as $projectCategory) { ?>
                            <button class="button" data-filter=".<?php echo $projectCategory->icon; ?>"><?php echo $projectCategory->name; ?><sup class="filter-count"></sup></button>
                            
                            <?php } ?>
                        </div>
                    </div>
                    <div class="grid gutter-20 clearfix"> 
                        <div class="grid-sizer"></div>
                        <?php foreach($newestProjects as $newestProject) { ?>                         
                        <div class="grid-item width-50 <?php echo $newestProject->category_icon; ?>">
                            <div class="thumb">
                                <img class="item_image" src="<?php echo asset('storage/' .$newestProject->image); ?>" alt="">
                                <div class="works-info">
                                    <div class="label-text">
                                        <h6><a href="#"><?php echo $newestProject->category_name; ?></a></h6>
                                        <h5><a href="<?php echo route('project.detail', ['slug'=>$newestProject->slug_key]); ?>"><?php echo $newestProject->title; ?></a></h5>
                                        <div class="details_link"><a href="<?php echo route('project.detail', ['slug'=>$newestProject->slug_key]); ?>"><span class="link_text">Chi tiết</span> <span class="link_icon"><span class="line"></span> <span class="circle"></span><span class="dot"></span></span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>                         
                        
                    </div>
                    <div class="btn_group mt-4 w-100 text-center">
                        <button id="load-more" class="btn olive w-100">Show More Project(s)</button>
                    </div>
                </div>
            </section>

            <!-- Testimonial -->
            @include('frontend.partials.testimonial')

            <section class="blog pt-lg bg-dark-100">
                <div class="large_font">
                    <h2 class="floating_element text-dark-200 d-flex justify-content-center">tin tức</h2>
                </div>
                <div class="container">
                    <div class="section-header text-center has_line">
                        <h2 class="text-white">TIN TỨC - CHIA SẺ</h2>
                    </div>
                    <div class="row">
                        <?php $newsCount = 0; foreach($newestPosts as $newestPost) { $newsCount++; ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="blog_post mb-0">
                                <img src="<?php echo asset('storage/' .$newestPost->image); ?>" alt="img">
                                <div class="blog_content">                                    
                                    <h2 class="post-count"><?php echo $newsCount; ?></h2>
                                    <div class="meta">
                                        <time class="text-olive" datetime="2022-10-20"><?php echo $newestPost->created_at; ?></time>
                                    </div>
                                    <h5><a href="<?php echo route('news.detail', ['slug'=>$newestPost->slug_key]); ?>" class="text-white"><?php echo $newestPost->title; ?></a></h5>
                                    <p><?php echo $newestPost->description; ?></p>
                                    <div class="details_link"><a href="<?php echo route('news.detail', ['slug'=>$newestPost->slug_key]); ?>"><span class="link_text"><?php echo __('frontend\homepage.details'); ?></span> <span class="link_icon"><span class="line"></span> <span class="circle"></span><span class="dot"></span></span></a></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </section>

            <!-- Contact Form -->
            @include('frontend.partials.contact-form')

        </main>
@endsection

