<?php
    // set variables
    $icon = get_sub_field( 'icon_option' );
    $bg_gradient = get_sub_field( 'bg_gradient' );
    $background_icon = get_sub_field( 'background_icon' );
    $background_icon_svg = get_sub_field( 'background_icon_svg' );
    
    //check for left or right image position
    if (get_sub_field( 'video_position') == 1 ) : 
        $order = 1;
    else :
        $order = 3;
    endif;

    if ($bg_gradient == 'light') {
        $bg_styles = 'gradient--light';
    } elseif ($bg_gradient == 'medium') {
        $bg_styles = 'gradient--medium';
    } elseif ($bg_gradient == 'dark') {
        $bg_styles = 'gradient--dark';
    } elseif ($bg_gradient == 'darkest') {
        $bg_styles = 'gradient--darkest';
    }
?>

<section class="<?php echo $bg_styles; ?> overflow-hidden">
    <div class="flex contained items-center justify-center">
        <div class="w-full xl:min-h-75vh py-12 lg:py-32 h-full xl:px-0 flex flex-col lg:flex-row items-center justify-center relative z-0">

            <?php
            if ($order == 1) :
                $content_margin = 'l';
                $video_margin = 'r';
                $hex_pos = 'right';
            else:
                $content_margin = 'r';
                $video_margin = 'l';
                $hex_pos = 'left';
            endif;
            ?>

            <div class="flex flex-col w-full 3xl:w-4/12 3xl:m<?php echo $content_margin; ?>-1/12 items-start justify-center relative order-2 z-0">
                <div class="hexagon hexagon--<?php echo $icon; ?> hidden xl:inline-flex absolute xl:top-7 xl:-left-4 -z-1"></div>
                <h2 class="text-2xl sm:text-3xl xl:text-5xl xl:leading-snug mb-2 xl:mb-4 mt-6 xl:mt-8 font-title font-light uppercase text-white"><?php the_sub_field( 'title' ); ?></h2>
                <p class="text-base font-normal text-white"><?php the_sub_field( 'content' ); ?></p>
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

            <div class="flex flex-row items-center w-full lg:m<?php echo $video_margin; ?>-1/12 relative order-1 lg:order-<?php echo $order ?>">
            
                <?php if ( get_row_layout() == 'video_embed' ) : ?>
                    <div class="video-embed">
                        <?php the_sub_field( 'embed' ); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex flex-row items-center justify-center w-full h-full lg:w-7/12 absolute right-0 -z-1">

                <?php if ( get_sub_field( 'background_icon_type' ) == 1 ) : ?>
                    <?php if ( $background_icon ) : ?>
                        <img class="hidden lg:inline-flex w-full object-contain pointer-events-none" src="<?php echo esc_url( $background_icon['url'] ); ?>" alt="<?php echo esc_attr( $background_icon['alt'] ); ?>" />
                    <?php endif; ?>
                <?php else : ?>
                    <?php if ( $background_icon_svg ) : ?>
                        <img class="hidden lg:inline-flex w-full object-contain pointer-events-none" src="<?php echo esc_url( $background_icon_svg['url'] ); ?>" alt="<?php echo esc_attr( $background_icon_svg['alt'] ); ?>"" />
                    <?php endif; ?>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>