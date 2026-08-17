<?php
    $icon = get_sub_field( 'icon_option' );
    $image = get_sub_field( 'image' );
    if (get_sub_field( 'image_position') == 1 ) : 
        $order = 1;
    else :
        $order = 3;
    endif;
?>

<section class="flex contained items-center justify-center">
    <div class="w-full xl:min-h-25vh py-8 lg:py-20 px-6 md:px-24 xl:px-0 flex flex-col lg:flex-row items-center justify-center relative">

        <?php
        if ($order == 1) :
            $content_margin = 'l';
            $hex_pos = 'right';
        else:
            $content_margin = 'r';
            $hex_pos = 'left';
        endif; 
        ?>

        <div class="flex flex-col w-full lg:w-1/2 xl:w-5/12 2xl:w-1/3 lg:m<?php echo $content_margin; ?>-1/12 items-start justify-center relative order-2">
            <h2 class="text-2xl sm:text-3xl xl:text-5xl xl:leading-snug mb-2 xl:mb-4 mt-6 xl:mt-8 font-title font-light uppercase text-brand-dark"><?php the_sub_field( 'title' ); ?></h2>
            <p class="text-base font-normal my-2 xl:my-4"><?php the_sub_field( 'content' ); ?></p>

            <?php if ( have_rows( 'list_items' ) ) : ?>
                <ul class="my-2 xl:my-4 text-brand-dark font-semibold text-base xl:text-lg w-full">
                    <?php while ( have_rows( 'list_items' ) ) : the_row(); ?>
                        <li class="flex flex-row items-center mb-2 md:mb-4">
                            <span class="w-1/24">
                                <span class="hexagon hexagon--dark hexagon--bullet"></span>
                            </span>
                            <span class="w-23/24 ml-4"><?php the_sub_field( 'item_content' ); ?></span>
                        </li>
                    <?php endwhile; ?>
                </ul>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
                
        </div>

        <div class="w-full lg:w-1/2 xl:w-7/12 2xl:w-3/4 relative order-1 lg:order-<?php echo $order ?>">
            <div class="relative">
                <div class="hexagon hexagon--<?php echo $icon; ?> hexagon--large absolute -<?php echo $hex_pos; ?>-hex md:-<?php echo $hex_pos; ?>-hex-md xl:-<?php echo $hex_pos; ?>-hex-xl top-4.5-50p md:top-9-50p xl:top-18-50p opacity-90"></div>
                <?php if ( $image ) : ?>
                    <img class="w-full object-cover"src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
			
