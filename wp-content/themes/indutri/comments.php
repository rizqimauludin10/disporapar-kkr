<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2020 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
?>

<?php
   if ( post_password_required() ){
      return;
   }
?>
<div id="comments">

    <?php if ( have_comments() ) { ?>
        <h2 class="comments-title">
          <?php
            printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'indutri' ),
              number_format_i18n( get_comments_number() ), get_the_title() );
          ?>
        </h2>
        
        <div class="gav-comment-list clearfix">
          
          <ol class="pingbacklist">
            <?php
                wp_list_comments( array( 'type' => 'pingback', 'callback' => 'indutri_comment_template', 'short_ping'  => true ) );
            ?>
         </ol>
          <ol class="comment-list">
              <?php wp_list_comments('type=comment&callback=indutri_comment_template'); ?>
          </ol>
          <?php
          if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
          ?>
          <footer class="navigation comment-navigation" role="navigation">
              <div class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'indutri') ); ?></div>
              <div class="next right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'indutri') ); ?></div>
          </footer>
          <?php endif; ?>

          <?php if ( ! comments_open() && get_comments_number() ) : ?>
              <p class="no-comments"><?php echo esc_html__( 'Comments are closed.' , 'indutri'); ?></p>
          <?php endif; ?>
        </div>
    <?php } ?>

   <?php
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_field = '
          <div class="form-group">
            <textarea placeholder="' . esc_attr__('Write Your Comment', 'indutri') . '" rows="8" id="comment" class="form-control"  name="comment"'.$aria_req.'></textarea>
          </div>
        ';
        if(class_exists('Indutri_Themer_Comment')){
          $comment_field = Indutri_Themer_Comment::getInstance()->comment_field($aria_req) . $comment_field;
        }
        $comment_args = array(
          'title_reply'=> ('<div class="title">'.esc_html__('Add a Comment','indutri').'</div>'),
          'comment_field' => $comment_field,
                        
          'fields' => apply_filters(
            'comment_form_default_fields',
            array(
              'author' => '<div class="row"><div class="form-group col-sm-6 col-xs-12">
                <input type="text" name="author" placeholder="'.esc_attr__('Your Name *', 'indutri').'" class="form-control" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
                </div>',
              'email' => ' <div class="form-group col-sm-6 col-xs-12">
                <input id="email" name="email" placeholder="'.esc_attr__('Email *', 'indutri').'" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
                </div></div>',
              'url' => '<div class="form-group">
                <input id="url" placeholder="'.esc_attr__('Website', 'indutri').'" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />
                </div>',         
            )),
            'label_submit' => 'Post Comment',
            'comment_notes_before' => '<div class="form-group h-info">'.esc_html__('Your email address will not be published.','indutri').'</div>',
            'comment_notes_after' => '',
        );
    ?>
   <?php global $post; ?>
   <?php if('open' == $post->comment_status){ ?>
   <div class="commentform reset-button-default">
      <div class="commentform-inner">
         <?php indutri_comment_form($comment_args); ?>
      </div>
    </div><!-- end commentform -->
   <?php } ?>
</div><!-- end comments -->
