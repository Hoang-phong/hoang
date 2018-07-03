<?php
   /**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 */
   if ( post_password_required() ) {
   	return;
   }
   ?>
	<div class="card my-4">
	   <h5 class="card-header">Leave a Comment:</h5>
	   <?php if ( comments_open() ) : ?>
	   <div class="card-body">
	      <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	      <p><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('Đăng nhập','Startbootstrap')?></a> để bình luận.</p>
	      <?php else : ?>
	      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	         <div class="form-group">
	            <textarea class="form-control"  name="comment" id="comment"  rows="3" tabindex="4" placeholder="<?php _e('comments','Startbootstrap')?>"></textarea>
	         </div>
	         <button type="submit" id="submit" class="btn btn-primary">Submit</button>
	         <?php comment_id_fields(); ?>
	         </p>
	         <?php do_action('comment_form', $post->ID); ?>
	      </form>
	      <?php endif; // If registration required and not logged in ?>
	   </div>
	   <?php endif; ?>
	</div>
	<?php if ( have_comments() ) : ?>
	<?php wp_list_comments('type=comment&callback=Startbootstrap_comment'); ?>
	<?php endif; // Check for have_comments(). ?>