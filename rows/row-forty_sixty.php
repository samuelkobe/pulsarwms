<?php
    $image = get_sub_field( 'image' );
    if (get_sub_field( 'image_position') == 1 ) : 
        $order = 1;
    else :
        $order = 3;
    endif;
?>

<section class="flex contained items-center justify-center">
    <div class="w-full xl:min-h-25vh py-12 lg:pb-24 lg:pt-12 px-6 md:px-24 xl:px-0 flex flex-col lg:flex-row items-center justify-center relative">

        <?php
        if ($order == 1) :
            $content_margin = 'l';
            $hex_pos = 'right';
        else:
            $content_margin = 'r';
            $hex_pos = 'left';
        endif;
        ?>
        <div class="hidden lg:w-1/12"></div>
        <div class="flex flex-col w-full lg:w-1/2 lg:m<?php echo $content_margin; ?>-1/12 items-start justify-center relative order-2">
            <h2 class="text-xl lg:text-2.5xl xl:leading-snug my-4 xl:my-8 font-title font-light uppercase text-brand-medium"><?php the_sub_field( 'title' ); ?></h2>
            <p class="text-base font-normal"><?php the_sub_field( 'content' ); ?></p>
        </div>

        <div class="w-full lg:w-1/3 relative order-1 lg:order-<?php echo $order ?>">
            <div class="relative">
                <?php if ( $image ) : ?>
                    <img class="w-full object-cover"src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
			
