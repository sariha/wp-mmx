<?php if ( comments_open() ) : ?>

    <div id="respond">

        <h3><?php comment_form_title( __('Participer à la discussion'), __('Leave a Reply to %s' ) ); ?></h3>

        <div id="cancel-comment-reply">
            <small><?php cancel_comment_reply_link() ?></small>
        </div>

        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
            <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() )); ?></p>
        <?php else : ?>

            <form action="<?php echo site_url(); ?>/wp-comments-post.php" method="post" id="commentform">

                <?php if ( is_user_logged_in() ) : ?>

                    <p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.'), get_edit_user_link(), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('Log out of this account'); ?>"><?php _e('Log out &raquo;'); ?></a></p>

                <?php else : ?>

                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <label for="author"><small><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></small></label>
                                <input type="text" name="author" id="author" placeholder="<?php echo __('Name'); ?>" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>  class="form-control"/>

                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <label for="email"><small><?php _e('Mail (will not be published)'); ?> <?php if ($req) _e('(required)'); ?></small></label>
                                <input type="text" name="email" id="email" placeholder="<?php _e('Mail (will not be published)'); ?>" value="<?php echo esc_attr($comment_author_email); ?>"  tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> class="form-control" />
                            </p>
                        </div>
                    </div>

                <?php endif; ?>

                <p><textarea name="comment" id="comment" tabindex="3" class="form-control"></textarea></p>

                <p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Envoyer le message'); ?>" />
                    <?php comment_id_fields(); ?>
                </p>
                <?php do_action('comment_form', $post->ID); ?>

            </form>

        <?php endif; // If registration required and not logged in ?>
    </div>

<?php endif; // if you delete this the sky will fall on your head ?>




<?php if ( have_comments() ) : ?>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

    <ul class="media-list">
        <?php wp_list_comments(array('walker' => new Roots_Walker_Comment)); ?>
    </ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.'); ?></p>

	<?php endif; ?>
<?php endif; ?>


