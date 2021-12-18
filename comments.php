<br>
<br>
<center>
<?php

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                /* translators: %s: post title */
                printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'twentysixteen' ), get_the_title() );
            } else {
                printf(
                /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s thought on &ldquo;%2$s&rdquo;',
                        '%1$s thoughts on &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'twentysixteen'
                    ),
                    number_format_i18n( $comments_number ),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 42,
            ) );
            ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'twentysixteen' ); ?></p>
    <?php endif; ?>

    <?php
    comment_form( array(
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>',
    ) );
    ?>

</div>


<style>

    .comment-list
    {
        list-style: none;
        padding: 0;
        display: none;
    }

    .comment
    {
        box-shadow: 0 15px 20px rgba(2,9,86,.1);
        margin-top: 25px;
        border-radius: 20px;
        padding: 10px;0
    }

    #reply-title,.comment-notes,.comments-title,.logged-in-as
    {
        display: none;
    }

    #email,#author,#url
    {
        outline: none;
        width: 100%;
        border-radius: 5px;
        border: none;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
        padding: 8px;
    }

    #comment
    {
        outline: none;
        width: 100%;
        border-radius: 5px;
        border: none;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
        padding: 8px;
    }

    #submit
    {
        width: 80%;
        padding: 8px;
        background: #ed555a;
        outline: none;
        border: none;
        border-radius: 10px;
        color: #FFF;
        margin-top: 25px;
    }

</style>
</center>
<!-- .comments-area -->
