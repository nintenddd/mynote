<?php
/**
 * Template Name: Homepage - simple
 *
 * @author Terry Lin
 * @link https://terryl.in/githuber
 *
 * @package WordPress
 * @subpackage Githuber
 * @since 1.0
 * @version 1.0
 */

if ( is_active_sidebar( 'sidebar-5' ) ) {
	$css_left = 'col-12 col-md-7 text-center text-md-left';
} else {
	$css_left = 'col-12 col-md-12 text-center text-md-left';
}
get_header(); ?>

<div class="data-schema">
	<main role="main">
		<div class="section-intro d-flex align-items-center">
			<div class="container px-responsive">
				<div class="d-md-flex align-items-center">
					<div class="<?php echo esc_attr( $css_left ); ?>" style="min-height: 100%; overflow: hidden" >
						<h1 class="mb-3"><?php the_title(); ?></h1>
						<p class="mb4 desc-text"><?php echo get_the_excerpt(); ?></p>
					</div>
					<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
					<div class="col-12 col-md-5">
						<aside class="home-intro-sidebar">
							<div class="container px-responsive">
								<div class="row my-4">
									<?php dynamic_sidebar( 'sidebar-5' ); ?>
								</div>
							</div>
						</aside>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="container my-4">
			<div class="row">
				<section id="main-container" class="col" role="main">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<?php githuber_post_figure(); ?>
						<?php endif; ?>
						<div itemprop="articleBody">
							<?php the_content(); ?>
							<?php
								wp_link_pages(
									array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'githuber' ),
										'after'  => '</div>',
									)
								);
							?>
						</div>
					</article>
					<?php endwhile; ?>
				<?php else : ?>
					<article>
						<h1><?php esc_html_e( 'Sorry, nothing to display.', 'githuber' ); ?></h1>
					</article>
				<?php endif; ?>
				</section>
			</div><!-- .row -->
		</div><!-- .container -->
	</main>
	<br class="clearfix" />
<?php get_footer(); ?>
