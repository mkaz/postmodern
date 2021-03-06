<?php if ( $comments ) : ?>

    <div class="comments">

        <h4 class="comment-reply-title"><?php _e( 'Comments', 'postmodern' ) ?></h4>

        <?php wp_list_comments(array(
            'style' => 'div',
            'avatar_size' => '144',
        ) ); ?>

        <?php if ( paginate_comments_links( 'echo=0' ) ) : ?>
            <div class="pagination"><?php paginate_comments_links(); ?></div>
        <?php endif; ?>

    </div>

<?php endif; ?>

<?php if ( comments_open() || pings_open() ) : ?>

    <?php comment_form( 'comment_notes_before=&comment_notes_after=' ); ?>

<?php elseif ( $comments ) : ?>

    <div id="respond">
        <p class="closed"><?php _e( 'Comments closed', 'postmodern' ); ?></p>
    </div>

<?php endif; ?>