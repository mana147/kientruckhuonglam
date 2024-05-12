<header class="header">				
            <div class="container">
                <div class="header_inner d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <a href="<?php echo url(""); ?>" class="light_logo"><img src="<?php echo url("/frontend/"); ?>/assets/img/logo_khuonglam.png" alt="logo"></a>
                        
                    </div>
                    
                    <div class="mainnav d-none d-lg-block">
                        <ul class="main_menu">
                            <li class="menu-item"><a href="<?php echo url(""); ?>">TRANG CHỦ</a></li>
                            <li class="menu-item"><a href="<?php echo url("gioi-thieu"); ?>">GIỚI THIỆU</a></li>
                            <li class="menu-item"><a href="<?php echo url("du-an"); ?>">DỰ ÁN</a></li>
                            <li class="menu-item"><a href="<?php echo url("nha-may"); ?>">NHÀ MÁY</a></li>
                            <li class="menu-item"><a href="<?php echo url("tin-tuc"); ?>">TIN TỨC</a></li>
                            <li class="menu-item"><a href="<?php echo url("lien-he"); ?>">LIÊN HỆ</a></li>
                            
                        </ul>
                    </div>
                    <div class="header_right_part d-flex align-items-center">
                        <button class="aside_open">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </button>
                        <div class="header_search">								
                            <button type="submit" class="form-control-submit"><i class="bi bi-search"></i></button>
                        </div>
                        <div class="open_search">
                            <form class="search_form" action="search.php">
                                <input type="text" name="search" class="keyword form-control" placeholder="<?php echo __('frontend/homepage.search') ?>..." >
                                <button type="submit" class="form-control-submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>

                        <!-- Mobile Responsive Menu Toggle Button -->
                        <button type="button" class="mr_menu_toggle d-lg-none">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                </div>
			</div>
		</header>

        <!-- Mobile Responsive Menu -->
		<div class="mr_menu">
			<div class="mr_menu_overlay"></div>
			<button type="button" class="mr_menu_close"><i class="bi bi-x-lg"></i></button>
            <div class="logo"></div> <!-- Keep this div empty. Logo will come here by JavaScript -->
			<div class="mr_navmenu"></div> <!-- Keep this div empty. Menu will come here by JavaScript -->

            <!-- Footer-->
            <footer class="footer p-0">
                <div class="footer_inner pb-0">
                    <div class="footer_elements d-flex align-items-center justify-content-center">
                        <div class="footer_elements_inner">
                            <div class="footer_social">
                                <ul class="social_list justify-content-center">
                                    <li class="facebook"><a href="#"><i class="bi bi-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="bi bi-twitter"></i></a></li>
                                    <li class="instagram"><a href="#"><i class="bi bi-instagram"></i></a></li>
                                    <li class="youbetube"><a href="#"><i class="bi bi-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="terms_condition">
                                <!--<ul>
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">Condition</a></li>
                                    <li><a href="#">Policy</a></li>
                                </ul>-->
                            </div>
                            <div class="copyright">
                                <p>Khương Lâm Architecture @2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
		</div>

        <div class="aside_info_wrapper">
			<button class="aside_close"><i class="bi bi-x-lg"></i></button>
            <div class="aside_logo">
                <a href="index.html" class="light_logo"><img src="<?php echo url("frontend"); ?>/assets/img/logo_khuonglam.png" alt="logo"></a>
                
            </div>
			<div class="aside_info_inner">
                <p>Khương Lâm Architecture là đơn vị chuyên sâu đi đầu trong lĩnh vực thiết kế kiến trúc & thi công nội thất.</p>
                
                <div class="aside_info_inner_box">
                    <h5>Thông tin liên hệ</h5>
                    <p>097 612 7323 | 091 776 57 48</p>
                    
                    <p>kientruckhuonglam@gmail.com</p>

                    <h5>Văn phòng giao dịch</h5>
                    <p>178/22 Tây Sơn - Đống Đa - Hà Nội</p>
                    <p>Nhà máy: Km14 đại lộ Thăng Long - Hà Nội</p>
                </div>
                <div class="social_sites">
                    <ul class="d-flex align-items-center justify-content-center">
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                </div>
			</div>
		</div>