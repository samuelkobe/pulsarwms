<?php /* Template Name: Form Template */ get_header(); ?>

	<main role="main">

		<section class="mt-8 xl:mt-16">
    		<div class="flex contained">
				<h1 class="text-2xl sm:text-3xl xl:text-4.5xl xl:leading-snug my-4 xl:my-8 font-title font-semibold uppercase text-brand-dark text-center"><?php the_title(); ?></h1>

				<div class="w-full flex flex-col sm:flex-row mt-8 mb-32">
				
					<div class="w-full sm:w-1/2 sm:ml-1/12">
						<h3 class="text-lg xl:text-3xl font-title font-light uppercase text-brand-medium mb-2 xl:mb-4"><?php the_field( 'form_title' ); ?></h3>
						<?php the_field( 'form_embed' ); ?>
					</div>

					<div class="flex flex-row w-full sm:flex-col sm:w-1/3 sm:ml-1/12 lg:w-1/3">
	
						<div class="w-full flex flex-col mb-8 lg:mb-12">
							<div class="hexagon hexagon--dark"></div>
							<h3 class="text-lg xl:text-3xl font-title font-light uppercase text-brand-medium mt-2 xl:mt-4">Email us today</h3>
							<a class="hover:underline" href="mailto:<?php the_field( 'contact_email' ); ?>" target="_blank"><?php the_field( 'contact_email' ); ?></a>
						</div>

						<div class="w-full">
							<div class="hexagon hexagon--thin"></div>
							<h3 class="text-lg xl:text-3xl font-title font-light uppercase text-brand-medium mt-2 xl:mt-4">Call us today</h3>
							<a class="hover:underline" href="tel:<?php the_field( 'contact_phone' ); ?>" target="_blank"><?php the_field( 'contact_phone_text' ); ?></a>
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
