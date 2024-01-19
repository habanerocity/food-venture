<div class="custom_header" style="background-image: url('<?php header_image();?>');background-size: cover; background-position: 50%;background-repeat: no-repeat;height: <?php echo get_custom_header()->height; ?>px;width: 100%;">
    <div class="container" style="height:100%;position:relative;">
        <div class="navbar_wrapper secondary_white">
            <?php include 'navbar.php'?>
        </div>
        <div class="header_banner">
            <h1 class="secondary_white banner-text">
            <?php 
            if(is_404()){
                echo '404 - Page Not Found!';
            } else {
                the_title();
            }
            ?></h1>
        </div>
    </div>    
</div>