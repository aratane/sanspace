<?php 
$creativex_redux_demo = get_option('redux_demo');
get_header(''); ?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
<div class="blog-side-launcher" data-id="blog-side">
    <span class="ion-ios-arrow-left"></span>
</div>
<div class="blog-side panel-overlay-from-right-blog blog-side-launch"></div>
<div class="blog-side panel-from-left-blog">
    <div class="blog-sidebar-wrapper">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php } ?>
<?php 
while (have_posts()): the_post(); 
    $post_container = get_post_meta(get_the_ID(),'_cmb_post_container', true);
    $blog_owl = get_post_meta(get_the_ID(),'_cmb_blog_owl', true);
?>
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
                                        <div class="animated-text-content-r"><?php echo wp_specialchars_decode(esc_attr($creativex_redux_demo['animated_text_content']));?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="divider-xl"></div>
                            <div class="news-info">
                                <h3>
                                    <?php the_time(get_option( 'date_format' ));?> 
                                </h3>
                            </div>
                            <div class="divider-l"></div>
                            <h1 class="section-header-news section-header-news-modal">
                                <?php the_title(); ?>
                            </h1>
                            <div class="divider-l"></div>
                            <div class="dot"></div>
                            <div class="divider-xl"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="extra-margin-container-minus">
                    <div class="row">
                        <div class="col-md-12">
                        <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid nopadding">
                <div class="divider-l"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="box-img">
                            <div class="img-fullwidth-all">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php print wp_specialchars_decode($post_container); ?>
            <?php print wp_specialchars_decode($blog_content); ?>
            <?php comments_template();?>
            <div class="container-fluid nopadding">
                <div class="extra-margin-container">
                    <div class="dots">
                        <div class="the-dots"></div>
                    </div>
                    <div class="dots-reverse">
                        <div class="the-dots"></div>
                    </div>
                    <div class="divider-l"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading section-heading-dot section-heading-center-true">
                                <div class="section-heading-span">
                                    <div class="dot"></div>
                                </div>
                                <div class="move-up-dot"><?php echo esc_html__( 'Stay in the know', 'creativex' );?></div>
                            </div>
                            <div class="divider-l"></div>
                            <h1 class="section-header-news">
                                <?php echo esc_html__( 'Read', 'creativex' );?> <span><?php echo esc_html__( 'our blog', 'creativex' );?></span>
                            </h1>
                            <div class="divider-l"></div>
                            <div class="more-wraper-center">
                                <a class="more-button-wrapper" href="<?php echo esc_url(home_url('/')); ?>/?page_id=27">
                                    <div class="more-button-bg-center more-button-bg-center-color-rev more-button-circle"></div>
                                    <div class="more-button-txt-center more-button-txt-center-color-rev">
                                        <span><?php echo esc_html__( 'All entries', 'creativex' );?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="divider-xl"></div>
                            <div class="animated-text-wrapper-l">
                                <div class="animated-text-l">
                                    <?php for ($i=0; $i<=4 ; $i++) {?>
                                        <div class="animated-text-content-l"><?php echo wp_specialchars_decode(esc_attr($creativex_redux_demo['animated_text_content']));?></div>
                                    <?php } ?>
                                    <?php for ($i=0; $i<=4 ; $i++) {?>
                                        <div class="animated-text-content-r"><?php echo wp_specialchars_decode(esc_attr($creativex_redux_demo['animated_text_content']));?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider-xl"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>