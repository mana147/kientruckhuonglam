@extends('frontend.layouts.default')

@section('title', 'Tin tức - Khương Huy Architecture')

@section('content')

        <!-- Page Header -->
        <div class="page_header">
            <div class="page_header_inner">
                <div class="container">
                    <div class="page_header_content d-flex align-items-center justify-content-between">
                        <h2 class="heading"><?php echo __('frontend/homepage.news'); ?></h2>
                        <ul class="breadcrumb d-flex align-items-center">
                            <li><a href="index.html"><?php echo __('frontend/homepage.home'); ?></a></li>
                            <li class="active"><?php echo __('frontend/homepage.news'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>        
        </div>

        
        <!-- Main Wrapper-->
        <main class="wrapper">
            <!-- Scroll Progress -->
            
            <section class="blog">
                <div class="container">
                    <div class="row">
                        <?php
                        $count = 0;
                        foreach($posts as $post) {
                            $count++;
                            $post_id        = $post->id;
                            $post_slug_key  = $post->slug_key;
                            $post_title     = $post->title;
                            $post_description = $post->description;
                            $post_avatar    = $post->image;
                            $post_created_at = $post->created_at;              
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="blog_post">
                                <img src="<?php echo asset('storage/' .$post_avatar); ?>" alt="img">
                                <div class="blog_content">                                    
                                    <h2 class="post-count"><?php echo $count; ?></h2>
                                    <div class="meta">
                                        <time class="text-olive" datetime="2022-10-20"><?php echo $post_created_at; ?></time>
                                    </div>
                                    <h5><a href="<?php echo route('news.detail', ['slug'=>$post_slug_key]); ?>" class="text-white"><?php echo $post_title; ?></a></h5>
                                    <p><?php echo $post_description; ?></p>
                                    <div class="details_link"><a href="<?php echo route('news.detail', ['slug'=>$post_slug_key]); ?>"><span class="link_text"><?php echo __('frontend\homepage.details'); ?></span> <span class="link_icon"><span class="line"></span> <span class="circle"><span class="dot"></span></span></span></a></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="pagination-div">
                        <ul class="pagination">
                            <li><a href="#"><i class="ion-chevron-left"></i></a></li>
                            <li><a class="page-number current" href="#">01</a></li>
                            <li><a class="page-number" href="#">02</a></li>
                            <li>...</li>
                            <li><a class="page-number" href="#">10</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Contact Form -->
            @include('frontend.partials.contact-form')

        </main>

@endsection