<?php
$creativex_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php  
if ( have_posts() ) : 
while (have_posts()): the_post(); 
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
                                        <div class="animated-text-content-r"><?php printf( esc_html__( 'Author: %s', 'creativex' ), get_the_author() );?> <?php echo esc_html__( '&nbsp;', 'creativex' );?></div>
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
                        	<div class="excerpt">
                                <?php if(isset($creativex_redux_demo['blog_excerpt'])){?>
                                <?php echo esc_attr(creativex_excerpt($creativex_redux_demo['blog_excerpt'])); ?>
                                <?php }else{?>
                                <?php echo esc_attr(creativex_excerpt(80)); 
                                }
                                ?>
                            </div>
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
                            <div class="more-wraper-center">
                                <a class="more-button-wrapper" href="<?php the_permalink(); ?>">
                                    <div class="more-button-bg-center more-button-bg-center-color-rev more-button-circle"></div>
                                    <div class="more-button-txt-center more-button-txt-center-color-rev">
                                        <span><?php echo esc_html__( 'Read more', 'creativex' );?></span>
                                    </div>
                                </a>
                            </div>
                            <div class="divider-xl"></div>
                            <div class="animated-text-wrapper-l">
                                <div class="animated-text-l">
                                    <?php for ($i=0; $i<=4 ; $i++) {?>
                                        <div class="animated-text-content-l"><?php printf( esc_html__( 'Author: %s', 'creativex' ), get_the_author() );?> <?php echo esc_html__( '&nbsp;', 'creativex' );?></div>
                                    <?php } ?>
                                    <?php for ($i=0; $i<=4 ; $i++) {?>
                                        <div class="animated-text-content-r"><?php printf( esc_html__( 'Author: %s', 'creativex' ), get_the_author() );?> <?php echo esc_html__( '&nbsp;', 'creativex' );?></div>
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
<?php endif;?>
<div class="divider-m"></div>
	<div class="pagination-wrap">
		<?php creativex_pagination();?>
	</div>
<div class="divider-xl"></div>
<?php get_footer(); ?>