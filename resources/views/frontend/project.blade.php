@extends('frontend.layouts.default')

@section('title','Dự án - Khương Lâm Architecture')

@section('content')

        <!-- Page Header -->
        <div class="page_header">
            <div class="page_header_inner">
                <div class="container">
                    <div class="page_header_content d-flex align-items-center justify-content-between">
                        <h2 class="heading"><?php echo __('frontend/homepage.project'); ?></h2>
                        <ul class="breadcrumb d-flex align-items-center">
                            <li><a href="<?php echo url(""); ?>"><?php echo __('frontend/homepage.home'); ?></a></li>
                            <li class="active"><?php echo __('frontend/homepage.project'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>        
        </div>

        <main class="wrapper">
            <!-- Scroll Progress -->
            
            <section class="projects packery bg-transparent">
                <div class="container">
                    <div class="portfolio-filters-content">
                        <div class="filters-button-group">
                            <button class="button is-checked" data-filter="*">Tất cả<sup class="filter-count"></sup></button>
                            <?php foreach($projectCategories as $productCategory) { ?>
                            <button class="button" data-filter=".<?php echo $productCategory->icon; ?>"><?php echo $productCategory->name; ?><sup class="filter-count"></sup></button>                            
                            <?php } ?>
                        </div>
                    </div>
                    <div class="grid gutter-20 clearfix"> 
                        <div class="grid-sizer"></div>
                        <?php foreach($projects as $project) { ?>                       
                        <div class="grid-item width-50 <?php echo $project->category_icon; ?>">
                            <div class="thumb">
                                <img class="item_image" src="<?php echo asset('storage/' .$project->image); ?>" alt="">
                                <div class="works-info">
                                    <div class="label-text">
                                        <h6><a href="#"><?php echo $project->category_name; ?></a></h6>
                                        <h5><a href="<?php echo route('project.detail', ['slug'=>$project->slug_key]); ?>"><?php echo $project->title; ?></a></h5>
                                        <div class="details_link"><a href="<?php echo route('project.detail', ['slug'=>$project->slug_key]); ?>"><span class="link_text"><?php echo __('frontend\homepage.detail'); ?></span> <span class="link_icon"><span class="line"></span> <span class="circle"></span><span class="dot"></span></span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>                        
                         
                    </div>
                    <div class="btn_group w-100 text-center">
                        <button id="load-more" class="btn gray">Xem tiếp</button>
                    </div>
                </div>
            </section>

            <!-- Contact -->
            @include('frontend.partials.contact-form')

        </main>

@endsection