@extends('frontend.layouts.default')

@section('title', 'Dự án - Khương Huy Architecture')

@section('content')

        <!-- Page Header -->
        <div class="page_header">
            <div class="page_header_inner">
                <div class="container">
                    <div class="page_header_content d-flex align-items-center justify-content-between">
                        <h2 class="heading"><a href="<?php echo route('project'); ?>"><?php echo __('frontend/homepage.project'); ?></a></h2>
                        <ul class="breadcrumb d-flex align-items-center">
                            <li><a href="<?php echo url(""); ?>"><?php echo __('frontend/homepage.home'); ?></a></li>
                            <li class="active"><?php echo __('frontend/homepage.project'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>        
        </div>

        
        <!-- Main Wrapper-->
        <main class="wrapper">
            <!-- Scroll Progress -->
            
            <section class="project-details bg-dark-200">
                <div class="container">
                    <div class="gallery_slider">
                        <div class="swiper swiper_gallery">
                            <div class="swiper-wrapper">
                                <?php foreach($projectImages as $projectImage) { ?>
                                <div class="swiper-slide">
                                    <div class="gallery-image">
                                        <img src="<?php echo asset('storage/' .$projectImage->image_path); ?>" alt="img">
                                    </div>
                                </div>

                                <?php } ?>
                                
                            </div>
                            <!-- Add Pagination -->
                            <!-- <div class="swiper-pagination"></div> -->

                            <!-- Add Buttons -->
                            <div class="swiper-navigation">
                                <div class="swiper-button-prev"><i class="bi bi-arrow-left"></i></div>
                                <div class="swiper-button-next"><i class="bi bi-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="sidebar">
                                <div class="project-information">
                                    <h6 class="widget-title">
                                        <?php echo "Thông tin dự án"; ?>
                                        <span class="title-line"></span>
                                    </h6>
                                    <ul>
                                        <?php echo $project->content; ?>
                                        
                                    </ul>

                                    <div class="project-share">
                                        <ul>
                                            <li>Share:</li>
                                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                                            <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-8 col-md-8">
                            <div class="project-details_inner">
                                <div class="post_content">
									<div class="post-header">
										<h3 class="post-title"><?php echo $project->title; ?></h3>
									</div>
									<div class="fulltext">
										<p>
											<?php echo $project->description; ?> 
										</p>

										<h6 class="widget-title">
                                            Nội dung chi tiết
											<span class="title-line"></span>
										</h6>
										<?php echo $project->content; ?>

                                        <div class="post-footer">
                                            <nav class="d-flex align-items-center justify-content-between">
                                                <div class="details_link l-dir pagination-previous"><a href="#"><span class="link_icon"><span class="line"></span> <span class="circle"></span><span class="dot"></span></span></a></div>
                                                <div class="page-all"><a href="#"><i class="bi bi-grid"></i></a></div>
                                                <div class="details_link r-dir pagination-next"><a href="#"><span class="link_icon"><span class="line"></span> <span class="circle"></span><span class="dot"></span></span></a></div>
                                            </nav>
                                        </div>
									</div>

                                    <div class="related-posts">
                                        <h6 class="widget-title mb-2">
											<?php echo __('frontend\homepage.more-project'); ?>
											<span class="title-line"></span>
										</h6>
                                        <div class="grid grid-3 gutter-15 clearfix"> 
                                            <div class="grid-sizer"></div>
                                            <?php foreach($moreProjects as $moreProject) { ?>                        
                                            <div class="grid-item residences">
                                                <div class="thumb">
                                                    <img class="item_image" src="../assets/img/portfolio/4.jpg" alt="">
                                                    <div class="works-info">
                                                        <div class="label-text">
                                                            <h5><a href="<?php echo route('project.detail', ['slug'=>$moreProject->slug_key]); ?>"><?php echo $moreProject->title; ?></a></h5>
                                                            <h6><a href="<?php echo route('project.detail', ['slug'=>$moreProject->slug_key]); ?>"><?php echo $moreProject->description; ?></a></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>   
                                            <?php } ?>                       
                                            
                                        </div>
                                    </div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>


@endsection