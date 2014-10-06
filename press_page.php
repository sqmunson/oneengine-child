<?php 
/**
 * Template Name: Press Page Template
 */
?>
<?php
global $post,$wp_query;
get_header();
?>
<!-- Blog Header
======================================================================== -->
<div class="blog-header-wrapper">
    <?php
        $color      = oneengine_option('header_blog_color');
        $img        = oneengine_option('header_blog_img', false, 'url');
        $repeat     = oneengine_option('header_blog_repeat');
        $parallax   = oneengine_option('header_blog_parallax');
        $cover      = oneengine_option('header_blog_cover');

        $bg_repeat  = '';
        if( $repeat == 1 || $repeat == true){
            $bg_repeat = 'background-repeat:no-repeat;';
        }else $bg_repeat = 'background-repeat:repeat;';

        $bg_cover = '';
        if( $cover == 1 || $cover == true){
            $bg_cover = 'background-size:cover;';
        }else $bg_cover = '';

        $bg_img = '';
        if( $img ){
            $bg_img = 'background-image:url('.oneengine_option('header_blog_img', false, 'url').');';
        }else $bg_img = '';

        $img        = ( ! empty ( $img ) )      ? ''.$bg_img.'' : '';
        $color      = ( ! empty ( $color ) )    ? 'background-color:'. $color .';' : '';
        $repeat     = ( ! empty ( $repeat ) )   ? ''. $bg_repeat .';' : '';
        // $cover      = ( ! empty ( $cover ) )    ? ''. $bg_cover .'' : '';
        $cover      = ( ! empty ( $cover ) )    ? '' : '';
        // $parallax   = ( ! empty ( $parallax ) ) ? 'background-attachment: fixed;': '';
        $parallax   = ( ! empty ( $parallax ) ) ? '': '';


        /** Style Container */
        $style = (
            ! empty( $img ) ||
            ! empty( $color ) ||
            ! empty( $repeat ) ||
            ! empty( $cover ) ||
            ! empty( $parallax ) ) ?
                sprintf( '%s %s %s %s %s', $img, $color, $repeat, $cover, $parallax ) : '';
        $css = '';
        if ( ! empty( $style ) ) {
            $css = 'style="'. $style .'" ';
        }
    ?>
    <!-- <div class="blog-header-img parallax" <?php echo $css ?>></div> -->
    <div class="blog-header-img">
        <img class="" data-0="top:-100px" data-500="top:50px" src="<?php echo oneengine_option('header_blog_img', false, 'url'); ?>" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="display:none;">
                <!-- Logo
                ======================================================================== -->
                <div calss="logo-wrapper">
                    <div class="logo">
                         <a href="<?php echo home_url(); ?>">
                            <?php
                                $top   = '' ;
                                $left  = '' ;
                                $width = '' ;
                                if( oneengine_option('logo_top') != '' )$top    = 'top:'.oneengine_option('logo_top').'px;' ;
                                if( oneengine_option('logo_left') != '' )$left  = 'left:'.oneengine_option('logo_left').'px;';
                                if( oneengine_option('logo_width') != '' )$width = 'width:'.oneengine_option('logo_width').'px;';
                                if( oneengine_option('custom_logo', false, 'url') !== '' ){
                                    echo '<div class="logo-wrapper" style="'.$width.$left.$top.'"><img src="'. oneengine_option('custom_logo', false, 'url') .'" alt="'.get_bloginfo( 'name' ).'" /></div>';
                                }else{
                            ?>
                                <div class="logo-img"><span>E</span></div>
                            <?php } ?>
                         </a>
                    </div>
                </div>
                <!-- Logo / End -->
            </div>

            <?php
                $color_title        = oneengine_option('header_blog_title_color');
                $color_sub_title    = oneengine_option('header_blog_subtitle_color');

                $color_title        = ( ! empty ( $color_title ) )      ? 'color:'. $color_title .';' : '';
                $color_sub_title    = ( ! empty ( $color_sub_title ) )  ? 'color:'. $color_sub_title .';' : '';

                /** Style Container */
                $title_color = (
                    ! empty( $color_title ) ) ?
                        sprintf( '%s', $color_title) : '';
                $css_title_color = '';
                if ( ! empty( $title_color ) ) {
                    $css_title_color = 'style="'. $title_color .'" ';
                }

                $sub_title_color = (
                    ! empty( $color_sub_title ) ) ?
                        sprintf( '%s', $color_sub_title) : '';
                $css_sub_title_color = '';
                if ( ! empty( $sub_title_color ) ) {
                    $css_sub_title_color = 'style="'. $sub_title_color .'" ';
                }
            ?>
            <div class="animation-wrapper col-md-12">
                <div class="heading-title-wrapper blog-heading" style="color">
                    <h2 class="title" <?php echo $css_title_color ?>><?php echo oneengine_option('header_blog_title') ?></h2>
                    <span class="line-title" style="background-color:#cc467c"></span>
                    <span class="sub-title" <?php echo $css_sub_title_color ?>><?php echo oneengine_option('header_blog_subtitle') ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Header -->
<div class="clearfix"></div>
<!-- Container
======================================================================== -->

<div class="site-inner">
    <div class="wrap">
        <div class="container press-page">
            <div class="row">
                <div class="blog-wrapper animation-wrapper col-md-12" style="margin:10px 0 10px">
                    <div class="row" id="posts_container">
                        <div class="blog-left">

                            <h1 style="margin-bottom:30px;">Latest Announcements</h1>

                            <?php
                                $args = array( 'numberposts' => 10, 'category_name' => 'latest-announcements' );
                                $posts = get_posts( $args );
                                foreach( $posts as $post ): setup_postdata($post);
                            ?>
                                <div class="blog-left_item">
                                    <?php the_time('F j, Y');?>
                                    <h1 class="title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                </div>

                            <?php
                                endforeach;
                                wp_reset_query();
                            ?>
                        </div>

                        <div class="blog-right">

                            <h1 style="margin-bottom:30px;">In The News</h1>

                            <div class="in-the-news">

                                <?php
                                    $args = array( 'numberposts' => 50, 'category_name' => 'in-the-news' );
                                    $posts = get_posts( $args );
                                    $post_count = count($posts);

                                    for ($i = 0; $i < $post_count; $i++) { 
                                        $post = $posts[$i];
                                        setup_postdata($post);
                                        $url = get_post_meta(get_the_ID(), 'url', true);
                                ?>
                                
                                    <?php
                                        if ($i % 10 === 0) {
                                            ?> <div class="news-items"> <?php // opens the news-items div to hold 10 items
                                        }
                                    ?>

                                    <div style="margin-bottom:30px;">
                                        <div>
                                        <?php 
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('thumbnail');
                                            } 
                                        ?>
                                        </div>
                                        <?php the_time('F j, Y');?>
                                        <h1 class="title-blog"><a href="<?php echo $url; ?>" target="_blank"><?php the_title(); ?></a></h1>
                                    </div>

                                    <?php
                                        if ($i !== 0 && (($i % 9 === 0) || ($i === ($post_count - 1)))) {
                                            ?> </div> <?php // closes the news-items div containing 10 items (or less)
                                        }
                                    ?>

                                <?php
                                    } // end for loop
                                    wp_reset_query();
                                ?>

                            </div> <!-- end of in-the-news -->

                            <?php
                                if ($post_count > 10) {
                                    ?>
                                        <span class="more-news-button">More</span>
                                    <?php
                                }
                            ?>
                            
                            <h1 style="margin-bottom:30px;">Awards & Events</h1>

                            <div class="awards-events">

                                <?php
                                    $args = array( 'numberposts' => 50, 'category_name' => 'awards-events' );
                                    $posts = get_posts( $args );
                                    $post_count = count($posts);

                                    for ($i = 0; $i < $post_count; $i++) { 
                                        $post = $posts[$i];
                                        setup_postdata($post);
                                        $url = get_post_meta(get_the_ID(), 'url', true);
                                ?>
                                    <?php
                                        if ($i % 10 === 0) {
                                            ?> <div class="awards-items"> <?php // opens the news-items div to hold 10 items
                                        }
                                    ?>

                                    <div style="margin-bottom:30px;">
                                        <?php the_content();?>
                                        <h1 class="title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    </div>

                                    <?php
                                        if ($i !== 0 && (($i % 9 === 0) || ($i === ($post_count - 1)))) {
                                            ?> </div> <?php // closes the news-items div containing 10 items (or less)
                                        }
                                    ?>

                                <?php
                                    } // end for loop
                                    wp_reset_query();
                                ?>

                            </div> <!-- end of awards-events -->

                            <?php
                                if ($post_count > 10) {
                                    ?>
                                        <span class="more-awards-button">More</span>
                                    <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>
                <input type="hidden" id="current_page" value="<?php echo get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ?>">
                <input type="hidden" id="max_page" value="<?php echo $wp_query->max_num_pages ?>">
            </div>
        </div>
    </div>
</div>
<!-- <div> needed for stupid footer closing div -->
<!-- Container / End -->
<?php get_footer(); ?>