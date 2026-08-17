<?php
    $bg_styles = '';
    $content_styles = '';
    $bg = get_sub_field( 'bg_color' );;
    $icon = get_sub_field( 'icon_option' );
    if ($bg == 'light') {
        $bg_styles = 'gradient--light';
        $content_styles = 'text-white';
    } elseif ($bg == 'medium') {
        $bg_styles = 'gradient--medium';
        $content_styles = 'text-brand-dark';
    } elseif ($bg == 'dark') {
        $bg_styles = 'gradient--dark';
        $content_styles = 'text-white';
    }
?>

<section class="flex items-center justify-center <?php echo $bg_styles; ?>">
    <div class="w-full xl:min-h-75vh py-8 lg:py-16 contained items-start justify-center relative">
        <div class="flex flex-col md:w-3/4 md:ml-1/12 items-start justify-center relative">
            <div class="hexagon hexagon--<?php echo $icon; ?>"></div>
            <p class="text-2xl sm:text-3xl xl:text-5.5xl xl:leading-snug my-4 xl:my-8 font-title font-semibold <?php echo  $content_styles; ?>"><?php the_sub_field( 'quote' ); ?></p>
            <p class="text-base xl:text-3xl font-normal <?php echo  $content_styles; ?>"><?php the_sub_field( 'client' ); ?></p>
        </div>
    </div>
</section>