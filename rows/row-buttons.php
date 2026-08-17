<?php if ( have_rows( 'cta_button' ) ) : ?>
    <section class="flex flex-row items-center justify-center relative bg-white" id="cta">
        <div class="w-full py-2 md:py-8 lg:py-16 contained items-center justify-center relative z-10">
            <div class="flex flex-row flex-wrap justify-center w-full 2xl:w-2/3">

                <?php while ( have_rows( 'cta_button' ) ) : the_row(); ?>

                    <div class="flex flex-col items-center justify-center w-full md:w-1/3 py-8">
                        <?php $icon = get_sub_field( 'icon_option' ); ?>

                        <div class="hexagon hexagon--<?php echo $icon; ?>"></div>

                        <h3 class="text-xl lg:text-2xl uppercase text-center font-title text-brand-medium mt-4"><?php the_sub_field( 'title' ); ?></h3>
                        <?php $button_link = get_sub_field( 'button_link' ); ?>            
                        <?php if ( $button_link ) : ?>
                        <div class="flex flex-row relative">
                            <a class="button mt-4 md:mt-8 mb-2" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            
            </div>
        </div>
    </section>
<?php else : ?>
    <?php // no rows found ?>
<?php endif; ?>
