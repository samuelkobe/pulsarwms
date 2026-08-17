<?php /* Template Name: Contact Us Template */ get_header(); ?>

	<main role="main">

		<section class="mt-8 xl:mt-16">
    		<div class="flex contained">
				<h1 class="text-2xl sm:text-3xl xl:text-4.5xl xl:leading-snug my-2 xl:my-4 font-title font-semibold uppercase text-brand-dark text-center"><?php the_title(); ?></h1>

				<div class="w-full flex flex-col md:flex-row items-center md:items-start lg:justify-center mt-8 mb-32">
				
					<div class="w-full sm:w-3/4 md:w-1/2 lg:w-5/12 2xl:w-1/3 p-4">
						<div class="flex flex-col justify-end border-2 border-grey-light rounded-xl">
							<?php if ( have_rows( 'sales_contact' ) ) : ?>
								<?php while ( have_rows( 'sales_contact' ) ) : the_row(); ?>

									<?php $background_icon = get_sub_field( 'background_icon' ); ?>
									<div class="bg-brand-dark h-32 xl:min-h-25vh rounded-t-xl">
										<?php if ( $background_icon ) : ?>
											<img class="w-full max-h-full object-contain" src="<?php echo esc_url( $background_icon['url'] ); ?>" alt="<?php echo esc_attr( $background_icon['alt'] ); ?>" />
										<?php endif; ?>
									</div>

									<div class="bg-white h-auto rounded-b-xl p-4 xl:py-8 xl:px-6">

										<h2 class="font-title text-brand-dark text-xl xl:text-3xl uppercase lg:h-20"><?php the_sub_field( 'title' ); ?></h2>
										<p class="text-sm leading-normal xl:text-base xl:leading-relaxed font-light"><?php the_sub_field( 'content_message' ); ?></p>
										
										<?php $button_link = get_sub_field( 'button_link' ); ?>
										<?php if ( $button_link ) : ?>
											<div class="flex flex-row relative">
												<a class="button solid full mt-4 md:mt-8 mb-2" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
											</div>
										<?php endif; ?>

									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>

					<div class="w-full sm:w-3/4 md:w-1/2 lg:w-1/3 2xl:w-1/4 p-4">
						<div class="flex flex-col justify-end border-2 border-grey-light rounded-xl">
							<?php if ( have_rows( 'support_contact' ) ) : ?>
								<?php while ( have_rows( 'support_contact' ) ) : the_row(); ?>

									<?php $background_icon = get_sub_field( 'background_icon' ); ?>
									<div class="bg-brand-medium h-32 xl:min-h-25vh rounded-t-xl">
										<?php if ( $background_icon ) : ?>
											<img class="w-full max-h-full object-contain" src="<?php echo esc_url( $background_icon['url'] ); ?>" alt="<?php echo esc_attr( $background_icon['alt'] ); ?>" />
										<?php endif; ?>
									</div>

									<div class="bg-white h-auto rounded-b-xl p-4 xl:py-8 xl:px-6">

										<h2 class="font-title text-brand-dark text-lg xl:text-2xl uppercase lg:h-20"><?php the_sub_field( 'title' ); ?></h2>
										<p class="text-sm leading-normal xl:text-base xl:leading-relaxed font-light"><?php the_sub_field( 'content_message' ); ?></p>
										
										<?php $button_link = get_sub_field( 'button_link' ); ?>
										<?php if ( $button_link ) : ?>
											<div class="flex flex-row relative">
												<a class="button solid full mt-4 md:mt-8 mb-2" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
											</div>
										<?php endif; ?>

									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>

				</div>
			</div>
		</section>

		<script type="module">
			const content_header = document.getElementById("content-wrapper");
			const header_element = document.getElementById("header");
			header_element.classList.add('hold-down');
			content_header.classList.add('pt-32');
		</script>

	</main>

<?php get_footer(); ?>
