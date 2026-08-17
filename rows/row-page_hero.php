<?php if ( get_sub_field( 'page_hero' ) == 1 ) : ?>
    
    <?php
        $background_icon = get_sub_field( 'background_icon' );
        $background_icon_svg = get_sub_field( 'background_icon_svg' );
        $bg_styles = '';
        $bg = get_sub_field( 'bg_color' );;

        $background_video = get_sub_field( 'background_video' );
        $video = '<video
                                class="absolute top-0 left-0 w-full h-full object-cover -z-1"
                                preload="metadata"
                                muted
                                autoplay
                                loop
                                playsinline
                                src="' . $background_video . '"
                                type="video/mp4">
                                Sorry, your browser doesn\'t support embedded videos.
                            </video>';
        
        $button = 'button mt-4 md:mt-8 mb-2';
        if ($bg == 'light') {
            $bg_styles = 'gradient--light';
        } elseif ($bg == 'medium') {
            $bg_styles = 'gradient--medium';
        } elseif ($bg == 'dark') {
            $bg_styles = 'gradient--dark';
        } elseif ($bg == 'darkest') {
            $bg_styles = 'gradient--darkest';
        }
    ?>

        <?php if ( get_sub_field( 'background_type' ) == 1 ) : // This check is to have the section with a gradient or a video ?>
            <section class="flex items-center justify-center <?php echo $bg_styles; ?> overflow-hidden">
        <?php else : ?>
            <section class="flex relative w-full lg:custom-h-screen custom-h-screen-75 overflow-hidden">
                <div class="absolute left-0 top-0 h-full w-full gradient gradient--darkest-down z-0 opacity-80 pointer-events-none"></div>
                <?php echo $video;?>
        <?php endif; ?>

        <div class="w-full py-8 md:py-16 contained items-start justify-center relative">

            <div class="w-full flex flex-col md:flex-row">

            <?php if ( get_sub_field( 'background_type' ) == 1 ) : // This check is so the hero image will remain when background type is set to image ?> 
                <div class="flex flex-col w-full md:w-5/12 items-start justify-center absolute md:relative top-0 left-0">
                    <?php if ( get_sub_field( 'image_type' ) == 1 ) : ?>
                        <?php if ( $background_icon ) : ?>
                            <img class="p-12 xl:p-24" src="<?php echo esc_url( $background_icon['url'] ); ?>" alt="<?php echo esc_attr( $background_icon['alt'] ); ?>" />
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ( $background_icon_svg ) : ?>
                            <img class="p-12 xl:p-24" src="<?php echo esc_url( $background_icon_svg['url'] ); ?>" alt="<?php echo esc_attr( $background_icon_svg['alt'] ); ?>"" />
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="flex flex-col w-full md:w-1/2 py-24 md:py-0 items-start justify-center relative">
            <?php else : ?>
                <div class="flex flex-col w-full xl:w-1/2 xl:ml-1/12 py-24 lg:py-0 items-start justify-center relative">
            <?php endif; ?>

                    <h1 class="text-white font-light font-title uppercase text-5xl lg:text-7xl xl:text-8xl leading-normal lg:leading-snug xl:leading-tight "><?php the_sub_field( 'hero_title' ); ?></h1>
                    <p class="text-white text-base xl:text-lg w-3/4 xl:w-full"><?php the_sub_field( 'hero_content' ); ?></p>
                    <div class="flex flex-row relative">

                        <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                            <?php $button_link = get_sub_field( 'button_link' ); ?>            
                            <?php if ( $button_link ) : ?>
                            <div class="flex flex-row relative">
                                <a class="<?php echo $button; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                            </div>
                            <?php endif; ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>
    </section>


<?php else : ?>
    
    <script type="module">
        const content_header = document.getElementById("content-wrapper");
        const header_element = document.getElementById("header");
        header_element.classList.add('hold-down');
        content_header.classList.add('pt-32');
    </script>

<?php endif; ?>