<?php

$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));



if ( file_exists( $root.'/wp-load.php' ) ) {

    require_once( $root.'/wp-load.php' );

} elseif ( file_exists( $root.'/wp-config.php' ) ) {

    require_once( $root.'/wp-config.php' );

}

header("Content-type: text/css; charset=utf-8");

function hex2rgb($hex) {

   $hex = str_replace("#", "", $hex);



   if(strlen($hex) == 3) {

      $r = hexdec(substr($hex,0,1).substr($hex,0,1));

      $g = hexdec(substr($hex,1,1).substr($hex,1,1));

      $b = hexdec(substr($hex,2,1).substr($hex,2,1));

   } else {

      $r = hexdec(substr($hex,0,2));

      $g = hexdec(substr($hex,2,2));

      $b = hexdec(substr($hex,4,2));

   }

   $rgb = array($r, $g, $b);

   //return implode(",", $rgb); // returns the rgb values separated by commas

   return $rgb; // returns an array with the rgb values

}

global $deppex_redux_demo; 

$b=$deppex_redux_demo['main-color-1'];

$rgba = hex2rgb($b);  

?>

.header-navigation .container .right-side-box a.rqa-btn{

    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;

}
.btn{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.section-title .sub-title{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.section-title::before,
.services-content h4::before{
  display:none;
}
.services-icon::after{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.services-icon{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.services-content > a.read-more{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.pack-price-info .pack-sub-title{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.package-pricing-box .pricing-tab{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.pack-pricing-head .icon{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.package-pricing-box .pricing-tab .pricing-tab-switcher:before{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.faq-set > a.active {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
    border-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.faq-set > a i::after{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.scroll-top{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.blog-post-tag i {
    color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.blog-content-bottom ul li.link a{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.faq-set > a.active i{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.blog-post-content-left a:hover, .blog-post-right-content .title a:hover, .copyright-social ul li a:hover, .copyright-text p a:hover{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.navbar-wrap > ul > li.active > a, .navbar-wrap > ul > li:hover > a, .navbar-wrap ul li .submenu li.active > a, .navbar-wrap ul li .submenu li:hover > a, .mobile-menu .navigation li.active > a, .mobile-menu .navigation li ul li.active > a{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.home2 .domain-search-two .domain-search-form .btn{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>!important;
}
.blog-post-two .blog-content-bottom .d-link a{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.blog-post-two .blog-post-content .title a:hover{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.testimonial-thumb::before {
    border: 12.5px solid <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.testimonial-active .slick-dots li.slick-active button{
  background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.breadcrumb-item+.breadcrumb-item::before {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.footer-style-three .newsletter-title h5 span, .footer-style-three .fw-link ul li a:hover, .footer-style-three .fw-post-content h5 a:hover, .footer-style-three .fw-post-content span i, .footer-style-three .copyright-text p span{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.footer-style-three .newsletter-form input.wpcf7-submit {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.footer-style-three .newsletter-form button, .footer-style-three .fw-title-two .title::after, .footer-style-three .fw-address .btn {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.footer-style-three .newsletter-form button, .footer-style-three .fw-title-two .title::after, .footer-style-three .fw-address .btn {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.pricing-icon i, .pricing-list h5{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.blog--post--thumb .blog-post-date{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.blog--post--meta ul li i ,
.blog--post--bottom > a span{
    color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.blog--post--content h4 a:hover, .blog--post--meta ul li a:hover, .blog--post--bottom > a:hover, .blog--post--bottom .blog-post-share a:hover {
    color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.pagination-wrap ul li a::before{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.tag-list ul li a:hover {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.rc-post-content h5 a:hover {
    color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.sidebar-about-social ul li a:hover {
    color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.fw-link ul li a:hover {
    color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.hosting-features-area .title-style-two .sub-title{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.hosting-services-content h4 a:hover{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.blog-post-two .blog-post-content::before {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.newsletter-title h5 span {
    color:<?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.fw-title-two .title::after{
  background:<?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.copyright-wrap-two .copyright-text p span{
  color:<?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.footer-style-two .fw-link ul li a:hover {
    color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.services-content h4 a:hover {
    color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.white-title .sub-title{
  color:#fff!important;
}
.pricing-list h5::before{
  display:none;
}
.sidebar-form form button{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.widget_categories ul li a:hover {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.wp-tag-cloud a:hover {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
ul.pagination li span.current{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.related-tag ul li a:hover, .post-avatar-content ul li a:hover {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
a:hover{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.blog-comment .widget-title::before, .blog-comment .widget-title::after, .comment-reply-box .widget-title::before, .comment-reply-box .widget-title::after {
    background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.conatct-post-form p.form-submit input.submit{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.comment-reply-link:hover {
    color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.pricing-box-tabs .nav-tabs li a.active{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.contact-form-wrap form input.wpcf7-submit,
.contact-info-wrap::before{
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}
.contact-info-list ul li .icon,
.contact-info-bottom .btn{
  color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.btn:hover,
.conatct-post-form p.form-submit input.submit:hover{
  background-color: #031a75!important;
}
.hosting-services-icon::before{
  background: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
}
.header-top-offer .time-count span {
  background-color: <?php echo esc_attr($deppex_redux_demo['main-color-1']); ?>;
  background-image:none;
}