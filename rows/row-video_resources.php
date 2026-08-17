<?php if ( have_rows( 'video_resource' ) ) : ?>

    <section class="">
        <div class="flex contained">
            <div class="flex flex-col md:flex-row w-full flex-wrap lg:w-11/12 my-8 lg:my-16">
                <?php while ( have_rows( 'video_resource' ) ) : the_row(); ?>

                    <?php
                        // set variables
                        $icon = get_sub_field( 'icon_option' );
                    ?>

                    <div class="w-full flex flex-row md:items-end md:min-h-35vh lg:items-start lg:min-h-0 md:w-5/12 md:mr-1/12 lg:mr-0 lg:ml-1/12 mb-4 lg:mb-8">

                        <div class="flex flex-col w-full relative mb-hex lg:mb-hex-md">
                            <h3 class="text-lg xl:text-2.5xl font-title font-light uppercase text-brand-medium my-1 xl:my-2"><?php the_sub_field( 'subtitle' ); ?></h3>
                            <h2 class="text-2xl xl:text-3xl xl:leading-snug mb-2 xl:mb-4 font-title font-semibold uppercase text-brand-dark"><?php the_sub_field( 'title' ); ?></h2>
                            <div class="video-embed">
                                <?php the_sub_field( 'embed' ); ?>
                            </div>
                            <div class="hexagon hexagon--<?php echo $icon; ?> absolute -bottom-hex xl:-bottom-hex-md -right-hex xl:-right-hex-md"></div>
                        </div>

                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php else : ?>
    <?php // no rows found ?>
<?php endif; ?>
