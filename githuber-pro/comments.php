<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

/**
 * If the post type is not supprted.
 */
if ( ! post_type_supports( get_post_type(), 'comments' ) ) {
	return;
}

/*
 * If comment is not open, and comment number is 0,
 * I think it is no need to show this section.
 */
if ( ! comments_open() && 0 === (int) get_comments_number() ) {
	return;
}

?>

<div id="comments" class="discussion-wrapper">
	<h3 class="section-title"><?php esc_html_e( 'Comments', 'githuber' ); ?></h3>
	<div class="discussion-timeline">
		<?php if ( have_comments() ) : ?>
			<?php wp_list_comments( 'type=comment&callback=githuber_comment' ); ?>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'githuber' ); ?></p>
		<?php endif; ?>
		<?php comment_form(); ?>
	</div>
</div>
