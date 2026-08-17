<?php /* Template Name: Flexible Content Template */ get_header(); ?>

	<main role="main">
		<?php // <section> added inside row loop
		if (have_rows('rows')):
			// loop through the rows of data
			while (have_rows('rows')) : the_row();
				$layout = get_row_layout();
				include 'rows/row-' . $layout . '.php';
			endwhile;
		endif; ?>
	</main>

<?php get_footer(); ?>
