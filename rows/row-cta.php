<?php
    $background_icon = get_sub_field( 'background_icon' );
    $background_icon_svg = get_sub_field( 'background_icon_svg' );
    $bg_classes = '';
    $title_color = '';
    $content_color = '';
    $button = '';

    if ( get_sub_field( 'background_color' ) == 1 ) : 
        $bg_classes = 'bg-gradient-to-t from-brand-dark to-brand-transitionDark';
        $title_color = 'text-white';
        $content_color = 'text-white';
        $button = 'button bordered mt-4 md:mt-8 mb-2';
    else : 
        $bg_classes = 'bg_white';
        $title_color = 'text-brand-dark';
        $content_color = 'text-grey-dark';
        $button = 'button mt-4 md:mt-8 mb-2';
    endif; 
?>

<section class="flex flex-row items-center justify-center relative overflow-hidden <?php echo $bg_classes; ?>" id="cta">
    <div class="w-full h-80 lg:h-108 contained items-center justify-center relative z-10">

        <?php if ( get_sub_field( 'background_icon_type' ) == 1 ) : ?>
            <?php if ( $background_icon ) : ?>
                <img class="absolute self-start -mt-16 lg:-mt-32 h-64 lg:h-144 opacity-80 -z-1 pointer-events-none" src="<?php echo esc_url( $background_icon['url'] ); ?>" alt="<?php echo esc_attr( $background_icon['alt'] ); ?>" />
            <?php endif; ?>
		<?php else : ?>
            <?php if ( $background_icon_svg ) : ?>
                <img class="absolute self-start -mt-16 lg:-mt-32 h-64 lg:h-144 opacity-80 -z-1 pointer-events-none" src="<?php echo esc_url( $background_icon_svg['url'] ); ?>" alt="<?php echo esc_attr( $background_icon_svg['alt'] ); ?>"" />
            <?php endif; ?>
		<?php endif; ?>

        <h3 class="text-2xl lg:text-5xl leading-7 uppercase text-center font-title <?php echo $title_color; ?>"><?php the_sub_field( 'title' ); ?></h3>
        <p class="text-base lg:text-lg text-center mt-4 lg:mt-6 w-full lg:w-2/3 <?php echo $content_color; ?>"><?php the_sub_field( 'content' ); ?></p>
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
</section>