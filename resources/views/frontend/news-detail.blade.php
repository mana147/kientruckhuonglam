@extends('frontend.layouts.default')

@section('title', 'Tin tức - Khương Huy Architecture')

@section('content')

        <!-- Page Header -->
        <div class="page_header">
            <div class="page_header_inner">
                <div class="container">
                    <div class="page_header_content d-flex align-items-center justify-content-between">
                        <h2 class="heading"><a href="<?php echo route('news'); ?>"><?php echo __('frontend/homepage.news'); ?></a></h2>
                        <ul class="breadcrumb d-flex align-items-center">
                            <li><a href="<?php echo url(""); ?>"><?php echo __('frontend/homepage.home'); ?></a></li>
                            <li class="active"><?php echo __('frontend/homepage.news'); ?></li>
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
                    <div class="row">                        
                        <div class="col-lg-8 col-md-8">
                            <div class="project-details_inner">
                                <div class="post_content">
									<div class="post-header">
										<h3 class="post-title"><?php echo $post->title; ?></h3>
									</div>
                                    
									<div class="fulltext">
                                        <figure class="block-gallery mb-0">
											<ul class="blocks-gallery-grid">
												<li class="blocks-gallery-item mb-0 me-0">
                                                    <figure>
                                                        <a href="#"><img src="<?php echo asset('storage/' .$post->image); ?>" alt="img" class="block-image"></a>
                                                    </figure>
                                                </li>
											</ul>
										</figure>

										<h6 class="widget-title">
											Nội dung chi tiết
											<span class="title-line"></span>
										</h6>
										
                                        <?php echo $post->content; ?>

                                        <div class="post-footer">
                                            <div class="post-share">
                                                <ul class="share-list">
                                                    <li>Share:</li>
                                                    <li class="facebook aos-init aos-animate" data-aos="fade-up" data-aos-duration="500"><a href="#">Facebook</a></li>
                                                    <li class="twitter aos-init aos-animate" data-aos="fade-up" data-aos-duration="800"><a href="#">Twitter</a></li>
                                                    <li class="pinterest aos-init aos-animate" data-aos="fade-up" data-aos-duration="1100"><a href="#">Pinterest</a></li>
                                                    <li class="instagram aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400"><a href="#">Instagram</a></li>
                                                    <li class="linkedin aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400"><a href="#">Linkedin</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Comment List -->
                                        
                                    </div>
								</div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4">
                            <div class="sidebar">
								
                                <div class="widget widget_block widget_search">
                                    <form method="get" class="wp-block-search">
                                        <div class="wp-block-search__inside-wrapper ">
                                            <input type="search" class="wp-block-search__input" name="search" value="" placeholder="Search" required="">
                                            <button type="submit" class="wp-block-search__button"><i class="bi bi-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end widget -->

                                <!-- ----- tin tức mới nhất ----- -->
                                <div class="widget widget_block">
                                    <div class="wp-block-group__inner-container">
                                        <h2 class="widget-title"><?php echo __('frontend\homepage.recent-news'); ?><span class="title-line"></span></h2>                                            
                                        <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                                            <?php foreach($recentPosts as $recentPost) { ?>
                                                <li><a href="<?php echo route('news.detail', ['slug'=>$recentPost->slug_key]); ?>"><?php echo $recentPost->title; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- ----- tin tức mới nhất ----- -->

                                <!-- ----- dự án mới nhất ----- -->
                                <div class="widget widget_block">
                                    <div class="wp-block-group__inner-container">
                                        <h2 class="widget-title"><?php echo __('frontend\homepage.recent-project'); ?> <span class="title-line"></span></h2>                                            
                                        <ol class="wp-block-latest-comments">
                                            <?php foreach($recentProjects as $recentProject) { ?>
                                            <li><a href="<?php echo route('project.detail', ['slug'=>$recentProject->slug_key]); ?>"><?php echo $recentProject->title; ?></a></li>
                                            <?php } ?>
                                        </ol>
                                    </div>
                                </div>
                                <!-- ----- dự án mới nhất ----- -->

                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>


@endsection