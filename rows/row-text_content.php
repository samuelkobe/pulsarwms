<?php
    $icon = get_sub_field( 'icon_option' );
    $alignment = get_sub_field( 'alignment_option' );
    if ($alignment == 'center') : 
        $left_margin = '0';
        $right_margin = '0';
        $text_alignment = 'center';
        $list_margin_style = 'xl:w-1/4 xl:mx-1/8';
    elseif ($alignment == 'end') :
        $left_margin = 'lg:w-1/6';
        $right_margin = 'lg:w-1/12';
        $text_alignment = 'right';
        $list_margin_style = 'xl:w-1/2';
    elseif ($alignment == 'start') :
        $left_margin = 'lg:w-1/12';
        $right_margin = 'lg:w-1/6';
        $text_alignment = 'left';
        $list_margin_style = 'xl:w-1/2';
    endif;
    $background_icon = get_sub_field( 'background_icon' );
    $background_icon_svg = get_sub_field( 'background_icon_svg' );
?>

<section class="flex contained items-center justify-center">
    <div class="w-full py-4 lg:pb-8 pt-8 lg:pt-16 flex flex-col lg:flex-row items-center justify-center relative">

        <?php if ( get_sub_field( 'background_icon_type' ) == 1 ) : ?>
            <?php if ( $background_icon ) : ?>
                <img class="absolute lg:self-start -mt-16 w-full sm:w-3/4 md:w-1/2 lg:w-auto h-auto lg:h-108 min-h-50p opacity-80 -z-1 pointer-events-none" src="<?php echo esc_url( $background_icon['url'] ); ?>" alt="<?php echo esc_attr( $background_icon['alt'] ); ?>" />
            <?php endif; ?>
		<?php else : ?>
            <?php if ( $background_icon_svg ) : ?>
                <img class="absolute lg:self-start -mt-16 w-full sm:w-3/4 md:w-1/2 lg:w-auto h-auto lg:h-108 min-h-50p opacity-80 -z-1 pointer-events-none" src="<?php echo esc_url( $background_icon_svg['url'] ); ?>" alt="<?php echo esc_attr( $background_icon_svg['alt'] ); ?>"" />
            <?php endif; ?>
		<?php endif; ?>

        <div class="hidden w-0 lg:flex <?php echo $left_margin ;?>"></div>

        <div class="flex flex-col w-full lg:w-3/4 md:items-<?php echo $alignment ;?> justify-center relative">
            <div class="hexagon hexagon--<?php echo $icon; ?>"></div>
            
			<?php if ( get_sub_field( 'subtitle_toggle' ) == 1 ) : ?>
                <h3 class="text-lg lg:text-3xl font-title font-light uppercase text-brand-medium mt-4 xl:mt-8 md:text-<?php echo $text_alignment ;?>"><?php the_sub_field( 'subtitle' ); ?></h3>
			<?php else : ?>
			<?php endif; ?>
                <h2 class="text-2xl sm:text-3xl xl:text-4.5xl xl:leading-snug my-2 xl:my-4 font-title font-semibold uppercase text-brand-dark md:text-<?php echo $text_alignment ;?>"><?php the_sub_field( 'title' ); ?></h2>
			<?php if ( get_sub_field( 'content_toggle' ) == 1 ) : ?>
                <p class="mt-2 text-base lg:text-xl text-grey-dim font-light md:text-<?php echo $text_alignment ;?>"><?php the_sub_field( 'content' ); ?></p>
			<?php else : ?>
			<?php endif; ?>

            <?php if ( have_rows( 'list_items' ) ) : ?>
                <ul class="my-4 md:my-6 xl:my-8 text-brand-dark font-semibold text-base xl:text-lg w-full flex flex-col md:flex-row md:flex-wrap md:text-<?php echo $text_alignment ;?>">
                    <?php while ( have_rows( 'list_items' ) ) : the_row(); ?>
                        <li class="flex flex-row mb-2 md:mb-4 w-full md:w-1/3 <?php echo $list_margin_style; ?>">
                            <span class="relative ml-9">
                                <span class="absolute w-9 -top-1 -left-9 hexagon hexagon--dark hexagon--bullet"></span>
                                <?php the_sub_field( 'item_content' ); ?>
                            </span>
                        </li>
                    <?php endwhile; ?>
                </ul>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>

			<?php if ( get_sub_field( 'link_toggle' ) == 1 ) : ?>
            <div class="mt-4">
                <?php if ( get_sub_field( 'link_or_file' ) == 1 ) : ?>
                    <?php $page_link = get_sub_field( 'page_link' ); ?>
                    <?php if ( $page_link ) : ?>
                        <a class="text-brand-medium text-base lg:text-2xl" href="<?php echo esc_url( $page_link['url'] ); ?>" target="<?php echo esc_attr( $page_link['target'] ); ?>"><?php echo esc_html( $page_link['title'] ); ?></a>
                    <?php endif; ?>
                <?php else : ?>
                    <?php $download_file = get_sub_field( 'download_file' ); ?>
                    <?php if ( $download_file ) : ?>
                        <a class="text-brand-medium text-base lg:text-2xl" href="<?php echo esc_url( $download_file['url'] ); ?>" download><?php echo esc_html( $download_file['title'] ); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
			<?php else : ?>
			<?php endif; ?>

        </div>

        <div class="hidden w-0 lg:flex <?php echo $right_margin ;?>"></div>

    </div>
</section>
