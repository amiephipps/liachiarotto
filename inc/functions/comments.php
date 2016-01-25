<?php
/**
 * Comments & Pingbacks Template
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @package master_theme
 */

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
                <div class="comment-author vcard">
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

                </div><!-- .comment-author .vcard -->

                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'master_theme' ); ?></em>
                    <br />
                <?php endif; ?>
            </header>

            <div class="comment-content"><?php comment_text(); ?></div>

            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'master_theme' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->

    <?php
            break;
    endswitch;

}
endif; // ends check for master_theme_comment()