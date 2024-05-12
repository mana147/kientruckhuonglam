<!DOCTYPE html>
<html lang="zxx">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="Công ty TNHH kiến trúc Khương Lâm (Khương Lâm Architecture)">
        <meta name="author" content="Ztech DevTeam - ztech.com.vn">

        <!-- Favicon and touch Icons -->
        <link href="<?php echo url("/frontend/"); ?>/assets/img/favicon.png" rel="shortcut icon" type="image/png">
        <link href="<?php echo url("/frontend/"); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="<?php echo url("/frontend/"); ?>/assets/img/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
        <link href="<?php echo url("/frontend/"); ?>/assets/img/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
        <link href="<?php echo url("/frontend/"); ?>/assets/img/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

        <!-- Page Title -->
        <title>@yield('title')</title>    
        
        <!-- Styles Include -->
        <link rel="stylesheet" href="<?php echo url("/frontend"); ?>/assets/css/style.css">
        
    </head>


    <body class="bg-dark">
        

        <!-- Preloader -->
        <div id="preloader">
			<div class="preloader-inner">
				<div class="spinner"></div>
				<div class="loading-text">
					<span data-preloader-text="K" class="characters">K</span>
					
					<span data-preloader-text="H" class="characters">H</span>
					
					<span data-preloader-text="U" class="characters">U</span>
					
					<span data-preloader-text="O" class="characters">O</span>
					
					<span data-preloader-text="N" class="characters">N</span>

					<span data-preloader-text="G" class="characters">G</span><br/>

					<span data-preloader-text="L" class="characters">L</span>

                    <span data-preloader-text="A" class="characters">A</span>

                    <span data-preloader-text="M" class="characters">M</span>
				</div>
			</div>
		</div>

        

        <!-- Color Mode Switcher -->
		<!--<div id="mode_switcher">
			<span><i class="bi bi-moon-fill"></i></span>	
		</div>-->        

        <!-- Cursor Effect -->
        <div class="pointer bnz-pointer" id="bnz-pointer"></div>

        <!-- Header -->
		@include('frontend.partials.main-menu')
