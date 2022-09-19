<?php
$creativex_redux_demo = get_option('redux_demo');
get_header(); ?>
<div class="news-modal">
    <div class="lower-page lower-page-modal">
        <div class="modal-content">
            <div class="container-fluid nopadding">
                <div class="extra-margin-container">
                    <div class="dots">
                        <div class="the-dots"></div>
                    </div>
                    <div class="dots-reverse">
                        <div class="the-dots"></div>
                    </div>
                    <div class="divider-xl"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="animated-text-wrapper-r">
                                <div class="animated-text-r">
                                    <?php for ($i=0; $i<=9 ; $i++) {?>
                                        <div class="animated-text-content-r"><?php echo wp_specialchars_decode(esc_attr($creativex_redux_demo['404_animated']));?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="divider-l"></div>
                            <h1 class="section-header-news section-header-news-modal">
                                <?php echo wp_specialchars_decode(esc_attr($creativex_redux_demo['404_title']));?>
                            </h1>
                            <div class="divider-l"></div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="container-fluid nopadding">
                <div class="extra-margin-container">
                    <div class="divider-l"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="more-wraper-center">
                                <a class="more-button-wrapper" href="<?php echo esc_url(home_url('/')); ?>">
                                    <div class="more-button-bg-center more-button-bg-center-color-rev more-button-circle"></div>
                                    <div class="more-button-txt-center more-button-txt-center-color-rev">
                                        <span><?php echo wp_specialchars_decode(esc_attr($creativex_redux_demo['404_button']));?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>