<?php /* Template Name: Pricing Calculator Template */ get_header(); ?>

	<main role="main">

		<section class="mt-8 xl:mt-16">
    		<div class="flex contained">
				<h1 class="text-brand-dark font-title font-semibold uppercase text-center text-2xl my-4 sm:text-3xl xl:my-8 xl:text-4.5xl xl:leading-snug">
					<?php the_title(); ?>
				</h1>

				<div id="calc" class="w-full flex flex-col mt-8">
					<pricing-calc></pricing-calc>
				</div>

				<div id="calculator-form-hb" class="w-full flex-col mt-8 hidden">
					<div class="w-full sm:w-2/3 sm:mx-1/6 lg:w-1/2 lg:mx-1/4">
						<div class="mt-12 text-center">
							<?php the_field( 'form_embed' ); ?>
						</div>

						<div class="w-full flex flex-col mt-24">
							<p class="text-xs">* Does not include integration or custom programming costs. These figures are estimates only.</p>
							<p class="text-xs">* Hardware to be provided by your authorized reseller.</p>
							<p class="text-xs">* Additional warehouse locations not included in estimate.</p>
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
