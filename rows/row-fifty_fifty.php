<?php
    // set variables
    $icon = get_sub_field( 'icon_option' );
    $image = get_sub_field( 'image' );
    $top_margin = get_sub_field( 'top_margin' );
    $top_padding = get_sub_field( 'top_padding' );
    $bottom_margin = get_sub_field( 'bottom_margin' );
    $bottom_padding = get_sub_field( 'bottom_padding' );
    $bg_color = get_sub_field( 'background_color' );
    
    //check for left or right image position
    if (get_sub_field( 'image_position') == 1 ) : 
        $order = 1;
    else :
        $order = 3;
    endif;

    //check and set top margin
    if ($top_margin == 'none') :
        $mt = 'mt-0';
    elseif ($top_margin == 'moderate') :
        $mt = 'mt-8 lg:mt-20';
    elseif ($top_margin == 'ample') : 
        $mt = 'mt-12 lg:mt-32';
    endif;

    //check and set bottom margin
    if ($bottom_margin == 'none') :
        $mb = 'mb-0';
    elseif ($bottom_margin == 'moderate') :
        $mb = 'mb-8 lg:mb-20';
    elseif ($bottom_margin == 'ample') : 
        $mb = 'mb-12 lg:mb-32';
    endif;

    //check and set top padding
    if ($top_padding == 'none') :
        $pt = 'pt-8 lg:pt-0';
    elseif ($top_padding == 'moderate') :
        $pt = 'pt-8 lg:pt-20';
    elseif ($top_padding == 'ample') : 
        $pt = 'pt-12 lg:pt-32';
    endif;

    //check and set bottom padding
    if ($bottom_padding == 'none') :
        $pb = 'pb-8 lg:pb-0';
    elseif ($bottom_padding == 'moderate') :
        $pb = 'pb-8 lg:pb-20';
    elseif ($bottom_padding == 'ample') : 
        $pb = 'pb-12 lg:pb-32';
    endif;
?>

<section class="<?php echo $bg_color, ' ', $mt, ' ', $mb, ' ', $pt, ' ', $pb; ?>">
    <div class="flex contained items-center justify-center">
        <div class="w-full xl:min-h-25vh px-6 md:px-24 xl:px-0 flex flex-col lg:flex-row items-center justify-center relative">

            <?php
            if ($order == 1) :
                $content_margin = 'l';
                $hex_pos = 'right';
            else:
                $content_margin = 'r';
                $hex_pos = 'left';
            endif;
            ?>

            <div class="flex flex-col w-full lg:w-5/12 lg:m<?php echo $content_margin; ?>-1/12 items-start justify-center relative order-2">
                <h2 class="text-2xl sm:text-3xl xl:text-5xl xl:leading-snug mb-2 xl:mb-4 mt-6 xl:mt-8 font-title font-light uppercase text-brand-dark"><?php the_sub_field( 'title' ); ?></h2>
                <p class="text-base font-normal"><?php the_sub_field( 'content' ); ?></p>
                <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                    <?php $button_link = get_sub_field( 'button_link' ); ?>            
                    <?php if ( $button_link ) : ?>
                    <div class="flex flex-row relative">
                        <a class="button mt-4 md:mt-8 mb-2" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                    </div>
                    <?php endif; ?>
                <?php else : ?>
                <?php endif; ?>


            </div>

            <div class="w-full lg:w-1/2 relative order-1 lg:order-<?php echo $order ?>">
                <div class="relative">
                    <div class="hexagon hexagon--<?php echo $icon; ?> hexagon--large absolute -top-4 md:-top-9 xl:-top-hex-xl -<?php echo $hex_pos; ?>-hex md:-<?php echo $hex_pos; ?>-hex-md xl:-<?php echo $hex_pos; ?>-hex-xl"></div>
                    <?php if ( $image ) : ?>
                        <img class="w-full object-cover"src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>