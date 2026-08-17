<?php 
	$footer_menu_1 = wp_get_nav_menu_object("Explore");
	$footer_menu_2 = wp_get_nav_menu_object("Resources");
	$footer_menu_3 = wp_get_nav_menu_object("More Info");
?>

<!-- footer -->
			<footer class="footer text-brand-dark" role="contentinfo">

				<div class="contained mt-16 md:mt-32">
					<div class="hidden w-0 xl:flex xl:w-1/6"></div>
					<div class="flex flex-col lg:flex-row lg:items-start justify-start w-full xl:w-5/6">

						<div class="flex flex-col sm:flex-row lg:flex-col items-center lg:items-start justify-center lg:justify-start w-full lg:w-2/5">

							<div class="mb-8 sm:mb-8 2xl:mb-12">
								<?php if ( get_field( 'text_or_logo_file_toggle', 'option' ) == 1 ) : ?>
									<?php $footer_logo = get_field( 'footer_logo', 'option' ); ?>
									<?php if ( $footer_logo ) : ?>
										<img class="w-48 2xl:w-72" src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" />
									<?php endif; ?>
								<?php else : ?>
									<h1><?php the_field( 'footer_title', 'option' ); ?></h1>
								<?php endif; ?>
							</div>

							<div class="flex flex-row lg:flex-col ml-6 lg:ml-0">
								<?php if ( have_rows( 'social_media', 'option' ) ) : ?>
									<?php while ( have_rows( 'social_media', 'option' ) ) : the_row(); ?>
									<a class="flex flex-row mx-4 lg:mx-0 mb-8 lg:mb-4" href="<?php the_sub_field( 'url' ); ?>" target="_blank" rel="noreferrer">
										<?php $icon = get_sub_field( 'icon' ); ?>
										<?php if ( $icon ) : ?>
											<img class="w-6" src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
										<?php endif; ?>
										<span class="ml-4"><?php the_sub_field( 'title' ); ?></span>
									</a>
									<?php endwhile; ?>
								<?php else : ?>
									<?php // no rows found ?>
								<?php endif; ?>
							</div>

						</div>

						<div class="flex flex-col md:flex-row md:flex-wrap items-center md:items-start justify-center w-full mx-auto my-6 md:my-0 md:w-4/5 xl:w-3/5">

							<div class="flex flex-col items-center md:items-start justify-center text-center lg:text-left w-40 max-w-full md:w-1/3">
								<h4 class="w-full text-lg lg:text-xl font-semibold uppercase mb-2"><?php echo $footer_menu_1 -> name; ?></h4>
								<div class="w-full flex flex-col">
									<?php footer_nav_one(); ?>
								</div>
							</div>

							<div class="flex flex-col items-center md:items-start justify-center text-center lg:text-left w-40 max-w-full md:w-1/3">
								<h4 class="w-full text-lg lg:text-xl font-semibold uppercase mt-6 mb-2 md:mt-0"><?php echo $footer_menu_2 -> name; ?></h4>
								<div class="w-full flex flex-col">
									<?php footer_nav_two(); ?>
								</div>
							</div>

							<div class="flex flex-col items-center md:items-start justify-center text-center lg:text-left w-40 max-w-full md:w-1/3">
								<h4 class="w-full text-lg lg:text-xl font-semibold uppercase mt-6 mb-2 md:mt-0"><?php echo $footer_menu_3 -> name; ?></h4>
								<div class="w-full flex flex-col">
									<?php footer_nav_three(); ?>
								</div>
							</div>
						</div>

					</div>
				</div>


				<!-- copyright -->
				<div class="w-full mt-16 copyright gradient gradient--absolute-darkest text-center">
					<p class="text-white p-2 text-xs">&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.
					<?php _e('Powered by', 'web-ok-starter'); ?> <a href="https://webok.ca" target="_blank" class="text-xs hover:text-brand-dev transition-colors duration-200 ">Web Ok Solutions Inc.</a>
					</p>
				</div>
				<!-- /copyright -->
			
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>
