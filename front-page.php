<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theworx
 */

get_header();
?>
	<?php if ( is_home() ) : ?>
		<?php

    /* This can be used to filter slide object */
		do_action( 'get_mods_before_section', 'top' );

		/* This gets the slides as an object */
		$top_slider = get_section_mods( 'top' );

		/* This checks for slider object in order to parse slider section */
		if ( ! empty( $top_slider ) ) :
			?>
			<section class="header-slider-section desirable-slider-section">
				<div class="top-page-slider-wrap">
				<?php
				/* Foreach loop to build slider according to slides entered in the customizer */
				foreach ( $top_slider->slides as $slide ) :
					/* Checks for an img set in the slide object */
					if ( ! empty( $slide->slide_img ) ) :
						?>
						<div class="top-page-slide">
							<?php
							if ( wp_is_mobile() ) :
								?>
							<div class="top-slide-img-holder" data-img-url="<?php echo esc_attr( $slide->slide_mobile_img ); ?>" style="background-image:url('<?php echo esc_url( $slide->slide_mobile_img ); ?>');">
								<?php
							else :
								if ( strpos( $slide->slide_img, '.mp4' ) !== false ) {
									?>
										<div class="top-slide-img-holder" data-img-url="<?php echo esc_attr( $slide->slide_img ); ?>">
										<video autoplay="true" loop muted controls class="cta-slide">
											<source src="<?php echo esc_attr( $slide->slide_img ); ?>" type="video/mp4">
											Your browser does not support the video tag.
										</video>
										<?php
								} else {
									?>
										<div class="top-slide-img-holder" data-img-url="<?php echo esc_attr( $slide->slide_img ); ?>" style="background-image:url('<?php echo esc_url( $slide->slide_img ); ?>');">
										<?php
								}
							endif;
							/* Checks for an message set in the slide object */
							if ( ! empty( $slide->slide_header_message ) ) :
								?>
								<div class="row img-header-text-wrap">
									<div class="col col-12 img-header-text-container">
										<div class="text-box text-center
										<?php
										$set_text_align = ( ! empty( $slide->slide_text_position ) ) ? ' set-align-' . $slide->slide_text_position : ' set-align-center';
										echo wp_kses_data( $set_text_align );
										?>
										">
											<h2 class="img-header-text text-center"><?php echo wp_kses_data( $slide->slide_header_message ); ?></h2>
											<?php
											/* Checks for an subheader set in the slide object */
											if ( ! empty( $slide->slide_subheader ) ) :
												?>
												<h4 class="img-subheader-text text-center"><?php echo wp_kses_data( $slide->slide_subheader ); ?></h4>
											<?php endif; ?>
										</div><!-- .text-box -->
									</div><!-- .img-header-text-container -->

								</div><!-- .img-header-text-wrap -->
								
							<?php endif; ?>
							</div><!-- .top-slide-img-holder -->
						</div><!-- .top-page-slide -->
					<?php endif; ?>

				<?php endforeach; ?>

			</div><!-- .top-page-slider -->

			</section><!-- .header-slider-section -->
		<?php endif; ?>

  	<?php else : ?>
		<div id="primary" class="content-area row">
			<main id="main" class="site-main col col-12">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>

			</main><!-- #main .col-12 -->
		</div><!-- #primary .row -->
	<?php endif; ?>

		<?php
		get_footer();
