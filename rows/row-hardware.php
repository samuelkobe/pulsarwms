<?php
    // set variables
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
        $mt = 'mt-12 lg:mt-40';
    endif;

    //check and set bottom margin
    if ($bottom_margin == 'none') :
        $mb = 'mb-0';
    elseif ($bottom_margin == 'moderate') :
        $mb = 'mb-8 lg:mb-20';
    elseif ($bottom_margin == 'ample') : 
        $mb = 'mb-12 lg:mb-40';
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

<section class="<?php echo $mt, ' ', $mb, ' ', $pt, ' ', $pb; ?>">
    <div class="flex contained items-center justify-center">

            <?php
            if ($order == 1) :
                $content_wrapper_justify = 'end';
                $image_wrapper_justify = 'start';
                $image_alignment = 'left';
            else:
                $content_wrapper_justify = 'start';
                $image_wrapper_justify = 'end';
                $image_alignment = 'right';
            endif;
            ?>

        <div class="w-full xl:min-h-25vh p-8 lg:p-16 flex flex-col sm:flex-row items-center justify-<?php echo $content_wrapper_justify ?> relative">
            
            <div class="w-full h-full <?php echo $bg_color; ?> rounded-lg transform rotate-2 sm:rotate-3 absolute z-0 top-0 left-0"></div>
            <div class="w-full h-full bg-brand-medium rounded-lg transform rotate-0 sm:rotate-1 absolute z-0 top-0 left-0"></div>

            <div class="flex flex-col w-full sm:w-3/4 relative bg-white rounded-lg p-4 lg:p-12 z-10">
            
                <h3 class="text-lg lg:text-3xl font-title font-light uppercase text-brand-medium mt-2"><?php the_sub_field( 'brandname' ); ?></h3>
                <h2 class="text-2xl sm:text-3xl xl:text-4.5xl xl:leading-snug mb-1 xl:mb-2 font-title font-semibold uppercase text-brand-dark"><?php the_sub_field( 'title' ); ?></h2>
                <p class="text-base font-normal"><?php the_sub_field( 'content' ); ?></p>

                <?php if ( get_sub_field( 'link_toggle' ) == 1 ) : ?>
                    <div class="mt-2 lg:mt-4">
                        <?php $page_link = get_sub_field( 'page_link' ); ?>
                        <?php if ( $page_link ) : ?>
                            <a class="text-brand-medium text-base lg:text-lg" href="<?php echo esc_url( $page_link['url'] ); ?>" target="<?php echo esc_attr( $page_link['target'] ); ?>"><?php echo esc_html( $page_link['title'] ); ?></a>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                <?php endif; ?>

            </div>

            <div class="w-full sm:w-11/12 relative sm:absolute flex flex-row z-0 <?php echo $image_alignment ?>-0 justify-<?php echo $image_wrapper_justify ?> mt-8 sm:mt-0 p-8 sm:p-0 bg-white sm:bg-transparent rounded-lg sm:rounded-none">
                <?php if ( $image ) : ?>
                    <img class="w-full sm:w-2/5 object-contain max-h-35vh md:max-h-65vh relative <?php echo $image_alignment ?>-0"src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>