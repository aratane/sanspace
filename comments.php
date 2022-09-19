<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?> 
<?php if ( have_comments() ) : ?>
<div class="container">
    <div class="extra-margin-container-minus">
        <div class="divider-xl"></div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="section-header section-header-post">
                    <?php echo esc_html__( 'Recent Comments', 'creativex' );?>
                </h1>
                <div class="blog-comments">
                    <div class="comments">
                        <?php wp_list_comments('callback=creativex_theme_comment'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="container">
    <div class="extra-margin-container-minus">
        <div class="row">
            <div>
<?php
  if ( is_singular() ) wp_enqueue_script( "comment-reply" );
      $aria_req = ( $req ? " aria-required='true'" : '' );
      $comment_args = array(
        'id_form' => 'form',        
        'class_form' => 'comment-form',                         
        'title_reply'=>esc_html__( 'Leave a comment', 'creativex' ),
        'title_reply_before' =>'<div class="container">
                                    <div class="extra-margin-container-minus">
                                        <div class="row">
                                            <div>
                                                <div class="col-lg-12">
                                                    <div class="divider-xl"></div>
                                                    <h1 class="section-header section-header-post">',
        'title_reply_after' => '</h1>
                            <div class="divider-l"></div>
                        </div>
                        <div id="contact-form">',
        'fields' => apply_filters( 'comment_form_default_fields', array(
            'author' => '<div class="col-sm-6 col-md-6 col-lg-6">
                            <input class="requiredField name" id="name" name="name" placeholder="'.esc_attr__('Name', 'creativex').'" type="text">
                        </div>                 
                        ',
            'email' => '<div class="col-sm-6 col-md-6 col-lg-6">
                            <input class="requiredField email" id="email" name="email" placeholder="'.esc_attr__('Email', 'creativex').'" type="text">
                        </div>
                        ',
        ) ),   
        'comment_field' => '<div class="make-space">
                            <textarea class="requiredField message" id="message" name="comment" placeholder="'.esc_attr__('Comment', 'creativex').'"></textarea>
                        </div>
                            ',                 
        'label_submit' => esc_html__( 'Submit', 'creativex' ),
        'submit_button' =>  '<button class="more-button-txt-center more-button-txt-center-color-rev %3$s" name="%1$s" id="submit %2$s" type="submit"><span>%4$s</span></button>',
        'submit_field' => '<div>
                            <div class="more-wraper-center more-wraper-center-form">
                                <div class="more-button-bg-center more-button-bg-center-color-rev more-button-circle"></div>
                                %1$s %2$s
                            </div>
                        </div>',
        'comment_notes_before' => '',
        'comment_notes_after' => '',               
      )
?>
<?php if ( comments_open() ) : ?>
<?php comment_form($comment_args); ?>
<?php endif; ?> 
            </div>
        </div>
        <div class="divider-xl"></div>
    </div>
</div>