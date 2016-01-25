<?php
/**
 * The template for displaying Comments.
 *
 * @package master_theme
 */

if ( post_password_required() ) {
   return;
}

?>

<div id="comments" class="commentsArea">

   <?php if ( have_comments() ) : ?>

      <h2 class="comments-title">
         <?php
            printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'master_theme' ),
               number_format_i18n( get_comments_number() ), get_the_title() );
         ?>
      </h2>

      <ol class="commentList">
      <?php
      /* See master_theme_comment() in inc/functions/comments.php for more.  */
      //wp_list_comments( array( 'callback' => 'master_theme_comment' ) );


      if ( ! function_exists( 'master_theme_comment' ) ) :

      function master_theme_comment( $comment, $args, $depth ) {
         $GLOBALS['comment'] = $comment;
         switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
         ?>
         <li class="post pingback">
            <p><?php esc_html_e( 'Pingback:', 'master_theme' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'master_theme' ), '<span class="edit-link">', '</span>' ); ?></p>
         <?php
               break;
            default :
         ?>
         <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <article id="comment-<?php comment_ID(); ?>" class="comment">
               <header class="comment-meta">
                  <div class="commentAuthor vcard">

                     <?php
                        $avatar_size = 35;
                        echo get_avatar( $comment, $avatar_size );

                        /* translators: 1: comment author, 2: date and time */
                        printf( __( '%1$s %2$s', 'master_theme' ),
                           sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
                           sprintf( '<time pubdate datetime="%2$s">%3$s</time>',
                              esc_url( get_comment_link( $comment->comment_ID ) ),
                              get_comment_time( 'c' ),
                              /* translators: 1: date, 2: time */
                              sprintf( __( '%1$s at %2$s', 'master_theme' ), get_comment_date(), get_comment_time() )
                           )
                        );
                     ?>

                  </div><!-- comment-author .vcard -->

                  <?php if ( $comment->comment_approved == '0' ) : ?>
                  
                  <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'master_theme' ); ?></em>

                  <?php endif; ?>
               </header>

               <div class="comment-content">
                  <?php comment_text(); ?>
               </div>

               <div class="reply">
                  <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'master_theme' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
               </div><!-- reply -->
            </article><!-- comment -->

         <?php
               break;
            endswitch;

      }
      endif; // ends check for master_theme_comment()
      ?>
      </ol> <!-- commentList -->

      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
      <nav id="comment-nav-below" role="navigation" class="commentNavigation">
      <h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'master_theme' ); ?></h1>
      <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'master_theme' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'master_theme' ) ); ?></div>
      </nav>
      <?php endif; // check for comment navigation ?>

   <?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

      <p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'master_theme' ); ?></p>

   <?php endif; ?> <!-- end if have comments -->

   <?php 
      $fields = array (
         'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . ' /><label for="author">Name (Required)</label></p>',
         'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . ' /><label for="email">Email (Required)</label></p>',
         'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><label for="url">URL</label></p>',
      );

      comment_form( 
         array(
            'title_reply' => '<div class="comment-form-title">Leave a Comment</div>',
            'comment_notes_before' => '',
            'label_submit' => 'SUBMIT',
            'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
            'fields' => $fields
         ) 
   ); ?>

</div> <!-- #comments -->