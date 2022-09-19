<?php
/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class creativex_widget_newss extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'widget_news', 'description' => esc_html__( "The most recent posts on your site", 'creativex') );
        parent::__construct('recent-posts', esc_html__(' Recent Posts', 'creativex'), $widget_ops);
        $this->alt_option_name = 'widget_news';
    }
    function widget($args, $instance) {
        $cache = wp_cache_get('creativex_widget_newss', 'widget');
        if ( !is_array($cache) )
            $cache = array();
        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;
        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
            return;
        }
        ob_start();
        extract($args);
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( '', 'creativex' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
        <?php if ( $title ) echo wp_specialchars_decode(esc_attr($before_title),ENT_QUOTES) . esc_attr($title) . wp_specialchars_decode(esc_attr($after_title),ENT_QUOTES); ?>
        <div class="divider-l"></div>
        <div class="blog-side-heading">
            <h3>
                Recent <span>Posts</span>                    
            </h3>
        </div>
        <div class="divider-m"></div>
        <?php 
        	$i=0;
        	$count=0;
        	while ( $r->have_posts() ) : $r->the_post(); 
        		$count++;
        	endwhile;
        	while ( $r->have_posts() ) : $r->the_post(); 
        	$i++;
            $image_recent = get_post_meta(get_the_ID(),'_cmb_image_recent', true);
        ?>
        <div class="blog-side-text-wrapper">
            <div class="blog-side-text">
                <a href="<?php the_permalink() ?>">
                <?php echo get_the_title() ? get_the_title() : get_the_ID(); ?>
                </a>                    
            </div>
        </div>
        <?php endwhile; ?>
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
        endif;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('creativex_widget_newss', $cache, 'widget');
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_news']) )
            delete_option('widget_news');
        return $instance;
    }
    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'creativex' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'creativex' ); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>
        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
        <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?', 'creativex' ); ?></label></p>
<?php
    }
}

class creativex_widget_search extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'widget_search', 'description' => esc_html__( "Search on your site", 'creativex') );
        parent::__construct('search', esc_html__('Search', 'creativex'), $widget_ops);
        $this->alt_option_name = 'widget_search';
    }
    function widget($args, $instance) {
        $cache = wp_cache_get('creativex_widget_search', 'widget');
        if ( !is_array($cache) )
            $cache = array();
        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;
        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
            return;
        }
        ob_start(); 
        extract($args);
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Search', 'creativex' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        ?>
        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
            <div class="blog-search">
                <form action="#" class="">
                    <input name="s" id="search" type="text" class="search" placeholder="Type and hit enter" value="Type and hit enter" />
                    <button id="submit-btn">
                    <i class="ion-ios-search-strong"></i>
                    </button>
                </form>
            </div>
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('creativex_widget_search', $cache, 'widget');
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_search']) )
            delete_option('widget_search');
        return $instance;
    }
    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'creativex' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
    }
}
function creativex_register_custom_widgets() {
    register_widget( 'creativex_widget_search' );
    register_widget( 'creativex_widget_newss' );
}
add_action( 'widgets_init', 'creativex_register_custom_widgets' );    