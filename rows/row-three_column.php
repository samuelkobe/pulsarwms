<?php
    $background_icon = get_sub_field( 'background_icon' );
    $background_icon_svg = get_sub_field( 'background_icon_svg' );
?>

<section class="flex contained items-center justify-center">
    <div class="w-full py-4 lg:py-16 flex flex-col lg:flex-row items-center justify-center relative">

        <?php if ( get_sub_field( 'background_icon_type' ) == 1 ) : ?>
            <?php if ( $background_icon ) : ?>
                <img class="absolute hidden lg:inline-flex lg:self-start -mt-16 w-full sm:w-3/4 md:w-1/2 lg:w-auto h-auto lg:h-full object-contain opacity-80 -z-1 pointer-events-none" src="<?php echo esc_url( $background_icon['url'] ); ?>" alt="<?php echo esc_attr( $background_icon['alt'] ); ?>" />
            <?php endif; ?>
		<?php else : ?>
            <?php if ( $background_icon_svg ) : ?>
                <img class="absolute hidden lg:inline-flex lg:self-start -mt-16 w-full sm:w-3/4 md:w-1/2 lg:w-auto h-auto lg:h-full object-contain opacity-80 -z-1 pointer-events-none" src="<?php echo esc_url( $background_icon_svg['url'] ); ?>" alt="<?php echo esc_attr( $background_icon_svg['alt'] ); ?>"" />
            <?php endif; ?>
		<?php endif; ?>

        <div class="hidden w-0 lg:flex <?php echo $left_margin ;?>"></div>

        <div class="flex flex-col w-full lg:w-3/4 md:items-center justify-center relative">
            
            <h3 class="text-lg lg:text-3xl font-title font-light uppercase text-brand-medium mt-4 xl:mt-8 text-center"><?php the_sub_field( 'subtitle' ); ?></h3>
            <h2 class="text-2xl sm:text-3xl xl:text-4.5xl xl:leading-snug my-2 xl:my-4 font-title font-semibold uppercase text-brand-dark text-center"><?php the_sub_field( 'title' ); ?></h2>

            <?php if ( have_rows( 'columns' ) ) : ?>
                <div class="flex flex-col lg:flex-row flex-wrap items-start justify-center">   
				<?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                    <div class="flex flex-col items-center w-full lg:w-1/3 pt-4 lg:pt-8">
                        <?php $column_image = get_sub_field( 'column_image' ); ?>
                        <?php if ( $column_image ) : ?>
                            <img class="w-auto h-32 sm:h-40 xl:h-64 object-contain" src="<?php echo esc_url( $column_image['url'] ); ?>" alt="<?php echo esc_attr( $column_image['alt'] ); ?>" />
                        <?php endif; ?>
                        <h4 class="text-lg xl:text-2xl xl:leading-snug mt-4 xl:mt-8 font-title font-semibold uppercase text-brand-dark text-center w-2/3 lg:w-full"><?php the_sub_field( 'column_title' ); ?></h4>
                    </div>
				<?php endwhile; ?>
                </div>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>

            <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                <?php $button_link = get_sub_field( 'button_link' ); ?>            
                <?php if ( $button_link ) : ?>
                <div class="flex flex-row relative justify-center">
                    <a class="button mt-8 lg:mt-16 mb-4 lg:mb-8" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                </div>
                <?php endif; ?>
            <?php else : ?>
            <?php endif; ?>

        </div>

        <div class="hidden w-0 lg:flex <?php echo $right_margin ;?>"></div>

    </div>
</section>
