<?php 
$creativex_redux_demo = get_option('redux_demo');
require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
function creativex_theme_setup(){  
/*
 * This theme uses a custom image size for featured images, displayed on
 * "standard" posts and pages.
 */
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
    $lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('creativex', $lang);
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    // This theme uses wp_nav_menu() in one location. 
    register_nav_menus( array(
    'primary' =>  esc_html__( 'Primary Navigation Menu.', 'creativex' ),
    )); 
}
add_action( 'after_setup_theme', 'creativex_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;
function creativex_theme_scripts_styles(){
    $creativex_redux_demo = get_option('redux_demo');
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style('plugins', get_template_directory_uri().'/css/plugins.css');
    wp_enqueue_style('style', get_template_directory_uri().'/css/style.css');
    wp_enqueue_style( 'googlefonts-1', 'https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900%7COswald:300,400,700', array(), null );
    wp_enqueue_style('creativex-css', get_stylesheet_uri(), array(), '2022-07-21');
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) 
    wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script('plugins', get_template_directory_uri().'/js/plugins.js', array(), false, true);
    wp_enqueue_script('creativex', get_template_directory_uri().'/js/creativex.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'creativex_theme_scripts_styles' );
// Widget Sidebar
function creativex_widgets_init() 
{
    register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar', 'creativex' ),
    'id'            => 'sidebar-1',        
    'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'creativex' ),        
    'before_widget' => '',        
    'after_widget'  => '',        
    'before_title'  => '<div class="divider-l"></div>
                        <div class="blog-side-heading">
                            <h3>',        
    'after_title'   => '</h3>
                    </div>
                    <div class="divider-m"></div>'
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Contact Widget', 'creativex' ),
    'id'            => 'contact-home',        
    'description'   => esc_html__( 'Use in home pages.', 'creativex' ),        
    'before_widget' => '',        
    'after_widget'  => '',        
    'before_title'  => '',        
    'after_title'   => ''
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget', 'creativex' ),
    'id'            => 'footer-home',        
    'description'   => esc_html__( 'Use in home pages.', 'creativex' ),        
    'before_widget' => '',        
    'after_widget'  => '',        
    'before_title'  => '',        
    'after_title'   => ''
    ) );
}
add_action( 'widgets_init', 'creativex_widgets_init' );
function creativex_search_form( $form ) 
{
    $form = '
    <div class="blog-search">
        <form action="'.esc_url(home_url('/')).'" class="">
            <input name="s" id="search" type="text" class="search" placeholder="'.esc_attr__('Type and hit enter', 'creativex').'" value="' . get_search_query() . '" />
            <button id="submit-btn">
            <i class="ion-ios-search-strong"></i>
            </button>
        </form>
    </div>
    ';
    return $form;
}
add_filter( 'get_search_form', 'creativex_search_form' );
// Comment Form
function creativex_theme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
    <?php
      if(get_avatar($comment,$size='80' )!=''){?>
        <div class="divider-l"></div>
        <article>
            <h5 class="h5-comments">
                <?php printf( get_comment_author_link()) ?>
                <span class="comment-time"><?php comment_date('F j, Y'); ?></span>  
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>                        
            </h5>
            <div class="divider-m"></div>
            <div class="profile-photo">
                <?php echo get_avatar($comment ); ?>
            </div>
            <div class="divider-m"></div>
            <p><?php comment_text(); ?></p>
        </article>
    <?php }else{?>
        <div class="divider-l"></div>
        <article>
            <h5 class="h5-comments">
                <?php printf( get_comment_author_link()) ?>
                <span class="comment-time"><?php comment_date('F j, Y'); ?></span>  
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>                        
            </h5>
            <div class="divider-m"></div>
            <p><?php comment_text(); ?></p>
        </article>
<?php }?>
<?php
}
function creativex_excerpt() {
  $creativex_redux_demo = get_option('redux_demo');
  if(isset($creativex_redux_demo['blog_excerpt'])){
    $limit = $creativex_redux_demo['blog_excerpt'];
  }else{
    $limit = 80;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function creativex_pagination($pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
        'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
        'format'    => '',
        'current'     => max( 1, get_query_var('paged') ),
        'total'     => $pages,
        'prev_text' => wp_specialchars_decode('<i class = "ion-chevron-left"></i>',ENT_QUOTES),
        'next_text' => wp_specialchars_decode('<i class = "ion-chevron-right"></i>',ENT_QUOTES),
        'type'      => 'list',
        'end_size'    => 3,
        'mid_size'    => 3
);
    $return =  paginate_links( $pagination );
    echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
} 


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'creativex_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function creativex_theme_register_required_plugins(){
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'creativex' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'creativex' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'creativex' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'creativex' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'creativex' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'creativex' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Elementor', 'creativex' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Creativex Common', 'creativex' ),
            'slug'                     => 'creativex-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/creativex-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Creativex Elementor', 'creativex' ),
            'slug'                     => 'creativex-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/creativex-elementor.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'creativex' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'creativex' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'creativex' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'creativex' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'creativex' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'creativex' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'creativex' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'creativex' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'creativex' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'creativex' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'creativex' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'creativex' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'creativex' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'creativex' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'creativex' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'creativex' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'creativex' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>