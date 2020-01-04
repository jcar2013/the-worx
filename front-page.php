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
								<div class="top-slide-img-holder" data-img-url="<?php echo esc_attr( $slide->slide_mobile_img ); ?>" style="background-image:linear-gradient(rgba(0, 0, 0, 0.65),rgba(0, 0, 0, 0.65)), url('<?php echo esc_url( $slide->slide_mobile_img ); ?>');">
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
											<div class="top-slide-img-holder" data-img-url="<?php echo esc_attr( $slide->slide_img ); ?>" style="background-image:linear-gradient(rgba(0, 0, 0, 0.65),rgba(0, 0, 0, 0.65)), url('<?php echo esc_url( $slide->slide_img ); ?>');">
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
												<h1 class="img-header-text text-center"><?php echo wp_kses_data( $slide->slide_header_message ); ?></h1>
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

				<?php
				if ( $top_slider->slides->enable_cta_popup ) :
					?>
					<div class="top-slider-booknow">
						<div class="row booknow-row">
							<div class="col-4 booknow-service-col">
								<h3 class="service-title"><?php echo wp_kses_data( $top_slider->slides->cta_popup_title_1 ); ?></h3>
								<p class="service-details"><?php echo wp_kses_data( $top_slider->slides->cta_popup_description_1 ); ?></p>
							</div>
							<div class="col-4 booknow-service-col">
								<h3 class="service-title"><?php echo wp_kses_data( $top_slider->slides->cta_popup_title_2 ); ?></h3>
								<p class="service-details"><?php echo wp_kses_data( $top_slider->slides->cta_popup_description_2 ); ?></p>
							</div>
							<div class="col-4 booknow-service-col">
								<h3 class="service-title"><?php echo wp_kses_data( $top_slider->slides->cta_popup_title_3 ); ?></h3>
								<p class="service-details"><?php echo wp_kses_data( $top_slider->slides->cta_popup_description_3 ); ?></p>
							</div>
							<div class="col-12"></div>
						</div>
					</div>
				<?php endif; ?>


			</section><!-- .header-slider-section -->


		<?php endif; ?>

		<?php
		do_action( 'get_mods_before_section', 'about' );
		$about_me_section = get_section_mods( 'about' );

		if ( ! empty( $about_me_section->about_mods->about_me_message ) ) :
			?>
			<section class="about">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 mx-auto text-center">
							<h2 class="about-title"><?php echo wp_kses_post( $about_me_section->about_mods->about_me_header ); ?></h2>
							<hr class="light my-4">
							<p class="text-faded mb-4"><?php echo wp_kses_post( $about_me_section->about_mods->about_me_message ); ?></p>
							<?php
							if ( ! empty( $about_me_section->about_mods->github_btn_link ) ) : ?>
								<a class="btn btn-secondary btn-xl js-scroll-trigger" href="<?php echo esc_url( $about_me_section->about_mods->github_btn_link ); ?>"><?php echo wp_kses_post( $about_me_section->about_mods->github_btn_text ); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

 

		<?php
		do_action( 'get_mods_before_section', 'services' );
		$services_section = get_section_mods( 'services' );

		/* Check for Cause object */
		if ( ! empty( $services_section->services_mods ) ) :
			?>


			<section class="container-fluid services" style="background-image:linear-gradient(rgba(0, 0, 0, 0.65),rgba(0, 0, 0, 0.65)), url(<?php echo esc_url( $services_section->services_mods->services_background_image ); ?>)">


				<div class="row wonka-row">
					<div class="col-12 text-center">
						<h3 class="service-title"><?php echo wp_kses_data( $services_section->services_mods->services_section_header ); ?></h3>
					</div>
				</div>
				<div class="row wonka-row justify-content-center text-center">
					<?php
					foreach ( $services_section->services as $services ) :
						if ( ! empty( $services->service_title ) ) : ?>



						<div class="card" style="width: 18rem;">
							<!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
							<div class="card-body">
								<h5 class="card-title"><?php echo wp_kses_data( $services->service_title ); ?></h5>
								<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
							</div>
							<ul class="list-group list-group-flush">

							<?php
							if ( ! empty( $services->service_descriptions ) ) :
								foreach ( $services->service_descriptions as $description ) : ?>
								<li class="list-group-item"><?php echo wp_kses_post( $description ); ?></li>
								<?php endforeach; ?>
																	<?php endif; ?>
							</ul>

						</div>

						<?php endif; ?>
					<?php endforeach; ?>
				</div>

				


			</section><!-- .our-cause-section -->
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
