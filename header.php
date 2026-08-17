<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<meta property="og:title" content="<?php the_field( 'open_graph_title', 'option' ); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="<?php if ( get_field( 'open_graph_image', 'option' ) ) { the_field( 'open_graph_image', 'option' ); } ?>" />
		<meta property="og:url" content="<?php the_field( 'open_graph_url', 'option' ); ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />

		<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
		
		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
		<?php if ( ! function_exists( 'wp_body_open' ) ) {
			function wp_body_open() {
				do_action( 'wp_body_open' );
			}
		} ?>

		<!-- wrapper -->
		<div id="content-wrapper" class="wrapper">

			<header id="header" class="flex flex-row w-full h-auto bg-transparent fixed top-0 z-50 header-onload" role="banner">

				<div class="contained w-full justify-around">
					<div class="flex flex-row items-center w-full h-28 justify-between relative">

						<div class="flex flex-row items-center w-24 lg:w-auto py-4 order-1 z-20">
							<?php if (has_custom_logo()) : ?>
								<div class="flex flex-row lg:mr-4 w-24 2xl:w-36"><?php the_custom_logo(); ?></div>
							<?php else : ?>
								<p class="text-base"><?php bloginfo('title');?></p>
								<p class="text-xs"><?php bloginfo('description');?></p>
							<?php endif; ?>
						</div>

						<div class="visible lg:invisible block lg:hidden order-2 lg:order-3 w-8 h-4 lg:w-0 justify-center items-center z-20">
							<!-- button -->
							<button id="menu-button" class="hamburger w-8 flex flex-col focus:outline-none" type="button" name="navigation button" aria-label="navigation button">
								<span class="w-8 h-1 bg-white inline-block mb-2 transition-transform ease-out duration-200 origin-custom"></span>
								<span class="w-8 h-1 bg-white inline-block transition-transform ease-out duration-200 origin-custom"></span>
							</button>
							<!-- /button -->
						</div>

						<div id="menu" class="fixed lg:relative top-0 right-0 order-3 lg:order-2 w-full lg:w-auto lg:h-auto lg:min-h-0 z-10 lg:z-20 flex flex-col lg:flex-row lg:justify-end shadow-lg lg:shadow-none p-6 pt-36 lg:p-0 transform translate-x-full lg:transform-none lg:translate-x-0 transition-transform duration-0 lg:duration-0 lg:opacity-100 bg-brand-medium lg:bg-transparent">
							<nav class="flex flex-row items-center justify-end text-white" role="navigation">
								<?php webokstarter_nav(); ?>
							</nav>
						</div>

					</div>
				</div>
				
			</header>
			
			<!-- <section id="gradient" class="h-128 transition-all duration-150"></section> -->

			<script type="module">
				// let box = document.getElementById("gradient");
				// let wp = 0;
				// let hp = 0
				// box.addEventListener('mousemove', (e) => {
				// 	var w = box.clientWidth,
				// 		h = box.clientHeight,
				// 		x = (e.pageX - box.offsetLeft) * .1 + 50,
				// 		y = e.pageY - box.offsetTop,

				// 		xy = x + y;
				// 		// bg = "linear-gradient(" + xy + "deg, #47D4F5, #070468)";
				// 		wp = (360 * x) / w;
				// 		hp = (100 * y) / h;
				// 		var bg = "linear-gradient(" + wp + "deg, #070468 " + hp + "%, #47D4F5 100%)";

				// 		// pct = 360 * (+e.pageX) / w,
				// 		// bg = "linear-gradient(" + pct + "deg, #47D4F5, #070468)";
				// 		box.style.backgroundImage = bg;
				// });
				// box.addEventListener('mouseout', (event) => {
				// 	var bg = "linear-gradient(" + wp + "deg,#47D4F5,#070468)";
				// 	box.style.backgroundImage = bg;
				// });
			</script>

