<?php $creativex_redux_demo = get_option('redux_demo'); ?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta content="" name="description">
        <meta content="" name="author">
        <meta content="" name="keywords">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {?>
        <link rel="icon" href="<?php if(isset($creativex_redux_demo['favicon']['url'])){?><?php echo esc_url($creativex_redux_demo['favicon']['url']); ?><?php }?>">
        <?php }?> 
        <?php wp_head(); ?>
    </head>
    <body id="page-home"> 
        <div class="preloader-bg"></div>
        <div id="preloader">
            <div id="preloader-status">
                <div class="preloader-position loader">
                    <span></span>
                </div>
            </div>
        </div>
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
            <img alt="Logo" class="logo-img" src="<?php echo esc_url($creativex_redux_demo['logo_image']['url']);?>">
        </a>
        <div class="round-menu-wrapper">
            <div class="round-menu navigation-fire">
                <span class="dot-1"></span><span class="dot-2"></span><span class="dot-3"></span>            
            </div>
        </div>
        <div class="panel-overlay-from-left">
        </div>
        <div class="panel-from-right">
            <nav class="navigation-menu">
                <div class="center-container-menu">
                    <div class="center-block-menu">
                        <?php 
                        wp_nav_menu( 
                        array( 
                            'theme_location' => 'primary',
                            'container' => '',
                            'menu_class' => '', 
                            'menu_id' => '',
                            'menu'            => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'echo'            => true,
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new creativex_wp_bootstrap_navwalker(),
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="menu-primary-menu" class="menu %2$s">%3$s',
                            'depth'           => 0,        
                        )
                    ); ?>
                    </div>
                </div>
            </nav>
            <svg class="goo" viewBox="0 0 100 100">
                <defs>
                    <filter id='goo'>
                        <feGaussianBlur in='SourceGraphic' result='blur' stdDeviation='4' />
                        <feColorMatrix in='blur' result='goo' values='1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7' />
                    </filter>
                </defs>
                <g filter="url(#goo)">
                    <circle cx=35 cy=35 r=12>
                        <animateTransform attributeName="transform" attributeType="XML" repeatCount="indefinite"
                            type="rotate" 
                            from="0 60 50"
                            to="360 50 50"
                            dur="8s" />
                        <animate attributeName="fill" attributeType="XML" repeatCount="indefinite"
                            values="Gray; DimGray; Gray"
                            keyTimes="0; 0.5; 1"
                            dur="6s" />
                    </circle>
                    <circle cx=40 cy=35 r=12>
                        <animateTransform attributeName="transform" attributeType="XML" repeatCount="indefinite"
                            type="rotate" 
                            dur="6s"
                            from="0 60 50"
                            to="-360 50 50" />
                        <animate attributeName="fill" attributeType="XML" repeatCount="indefinite"
                            values="DimGray; Gray; DimGray"
                            keyTimes="0; 0.5; 1"
                            dur="8s" />
                    </circle>
                    <circle cx=45 cy=45 r=25>
                        <animateTransform attributeName="transform" attributeType="XML" repeatCount="indefinite"
                            dur="4s"
                            from="0 50 50"
                            to="360 50 50"
                            type="rotate" />
                        <animate attributeName="fill" attributeType="XML" repeatCount="indefinite"
                            values="DimGray; Gray; DimGray"
                            keyTimes="0; 0.5; 1"
                            dur="6s" />
                    </circle>
                    <circle cx=30 cy=60 r=20>
                        <animateTransform attributeName="transform" attributeType="XML" repeatCount="indefinite"
                            dur="10s"
                            from="0 50 50"
                            to="-360 50 50"
                            type="rotate" />
                        <animate attributeName="fill" attributeType="XML" repeatCount="indefinite"
                            values="DimGray; Gray; DimGray"
                            keyTimes="0; 0.5; 1"
                            dur="9s" />
                    </circle>
                    <circle cx=60 cy=40 r=15>
                        <animateTransform attributeName="transform" attributeType="XML" repeatCount="indefinite"
                            dur="8s"
                            from="0 40 40"
                            to="360 40 40"
                            type="rotate" />
                        <animate attributeName="fill" attributeType="XML" repeatCount="indefinite"
                            values="DimGray; Gray; DimGray"
                            keyTimes="0; 0.5; 1"
                            dur="7s" />
                    </circle>
                </g>
            </svg>
        </div>