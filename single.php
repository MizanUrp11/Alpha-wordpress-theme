<?php get_header(); ?>

<body <?php body_class(array("first_class", "second_class")); ?>>
    <?php get_template_part("/template-parts/common/hero"); ?>


    <div class="container">
        <div class="row">

            <?php if (is_active_sidebar("sidebar-1")) : ?>

                <div class="col-md-8">

                <?php else : ?>

                    <div class="col-md-12">

                    <?php endif; ?>

                    <div class="posts">

                        <?php
                        while (have_posts()) {
                            the_post();

                        ?>
                            <div <?php post_class(array("first_class", "second_class")); ?>>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 offset-2">
                                            <h2 class="post-title">
                                                <?php the_title(); ?>
                                            </h2>
                                            <h2><?php the_author_posts_link(); ?></h2>
                                            <?php echo get_the_date("jS F Y"); ?>

                                            <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>", "</li><li>", "</li></ul>"); ?>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-8 offset-2">
                                            <div class="slider">


                                                <?php
                                                if (class_exists('Attachments')) {
                                                    $attachments = new Attachments('slider');
                                                    if ($attachments->exist()) {
                                                        while ($attachments->get()) {
                                                ?>
                                                            <div>
                                                                <?php echo $attachments->image("image"); ?>
                                                            </div>
                                                <?php
                                                        }
                                                    } else {
                                                        if (has_post_thumbnail()) {
                                                            //$post_thumbnail_url = get_the_post_thumbnail_url( null, 'large' );
                                                            echo '<a class="popup" href="#" data-featherlight="image">';
                                                            the_post_thumbnail("large", array('class' => 'img-fluid'));
                                                            echo '</a>';
                                                        }
                                                    }
                                                }

                                                ?>
                                            </div>
                                            <div>

                                                <?php
                                                if (!class_exists("Attachments")) {

                                                    if (has_post_thumbnail()) {
                                                        //$post_thumbnail_url = get_the_post_thumbnail_url( null, 'large' );
                                                        echo '<a class="popup" href="#" data-featherlight="image">';
                                                        the_post_thumbnail("large", array('class' => 'img-fluid'));
                                                        echo '</a>';
                                                    }
                                                }
                                                the_content();




                                                //////////END/////////////






                                                //Start To show different types of image
                                                // the_post_thumbnail( "alpha_square_new1" );
                                                // the_post_thumbnail( "alpha_square_new2" );
                                                // the_post_thumbnail( "alpha_square_new3" );
                                                // the_post_thumbnail( "alpha_square_new4" );
                                                //End


                                                wp_link_pages();
                                                ?>

                <!-- ACF information -->
                                                <?php if (get_post_format() == 'image' && function_exists('the_field')) : ?>
                                                    
                                                    
                                                    <div class="metainfo">
                                                        <strong>Camera Model:</strong> <?php the_field('camera_model'); ?><br>

                                                        <strong>Location:</strong>
                                                        <?php
                                                        $alpha_location = get_field('location');
                                                        echo esc_html($alpha_location);
                                                        ?><br>

                                                        <strong>Date: </strong><?php the_field('date'); ?><br>

                                                        <p>
                                                            <?php
                                                            if (get_field('licensed') == 1) {
                                                            ?>
                                                                <?php echo apply_filters('the_content', get_field('license_information')) ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </p>

                                                        <p>
                                                            <?php
                                                            $alpha_image = get_field('image');
                                                            $alpha_image_details = wp_get_attachment_image_src($alpha_image, 'alpha-square');
                                                            echo "<img src='" . esc_url($alpha_image_details[0]) . "'" . "class='acf-image'>";
                                                            ?>
                                                        </p>

                                                        <p>
                                                            <?php
                                                            $file = get_field('attachment');
                                                            if ($file) {
                                                                $file_thumb = get_field('thumbnail', $file);
                                                                $file_url = wp_get_attachment_url($file);
                                                                if ($file_thumb) {
                                                                    $file_thumb_details = wp_get_attachment_image_src($file_thumb);
                                                                    _e('<h2>Thumbnail</h2>', 'alpha');
                                                                    echo "<a href='{$file_url}'><img src='" . esc_url($file_thumb_details[0]) . "'" . "class='acf-image'></a>";
                                                                } else {
                                                                    echo "<a href='{$file_url}'>{$file_url}</a>";
                                                                }
                                                            }
                                                            ?>
                                                        </p>

                                                    </div>
                                                <?php endif; ?>

                                                <!-- ACF END -->





<!-- CMB 2 Start -->
<?php if (get_post_format() == 'image' && class_exists('CMB2')) : 
    $alpha_camera_model = get_post_meta( get_the_ID(  ), '_alpha_camera_model',true );
    $alpha_location = get_post_meta( get_the_ID(  ), '_alpha_location', true );
    $alpha_date = get_post_meta( get_the_ID(  ), '_alpha_date' , true );
    $alpha_licensed = get_post_meta( get_the_ID(  ), '_alpha_licensed', true );
    $alpha_license_information = get_post_meta( get_the_ID(  ), '_alpha_license_information', true );
    $alpha_image_info = get_post_meta( get_the_ID(  ), '_alpha_image_id', true );
    $alpha_image_details = wp_get_attachment_image_src( $alpha_image_info, 'alpha-square' );
    ?>


<div class="metainfo">
<strong>Camera Model:</strong> <?php echo esc_html($alpha_camera_model); ?><br>
<strong>Location:</strong> <?php echo esc_html($alpha_location); ?><br>
<strong>Date:</strong> <?php echo esc_html($alpha_date); ?><br>
<?php if($alpha_licensed): ?>
    <strong>License: </strong> <?php echo esc_html($alpha_license_information); ?>
<?php endif; ?> <br>
 <img src="<?php echo $alpha_image_details[0]; ?>">


<p>
    <?php 
    $alpha_file_info = get_post_meta( get_the_ID(  ), '_alpha_resume', true );
    echo esc_html__($alpha_file_info);
    ?>
</p>


</div>
<?php endif; ?>


<!-- CMB2 End -->

                                            </div>
                                            <?php


                                            next_post_link();
                                            echo "<br>";
                                            previous_post_link();
                                            ?>


                                        </div>

                                    </div>

                                </div>
                            </div>



                        <?php
                        }
                        ?>

                        <div class="authorsection border p-4">
                            <div class="row">
                                <div class="col-md-2 authorimage">
                                    <?php echo get_avatar(get_the_author_meta("ID")); ?>
                                </div>
                                <div class="col-md-10">
                                    <h4>
                                        <?php echo get_the_author_meta("display_name"); ?>
                                    </h4>
                                    <p>
                                        <?php echo get_the_author_meta("description"); ?>
                                    </p>
                                    <p>
                                        <?php if(function_exists('the_field')):?>
                                            Facebook
                                            URL: <?php the_field('facebook', 'user_' . get_the_author_meta('ID')); ?><br>
                                            Twitter
                                            URL: <?php the_field('twitter', 'user_' . get_the_author_meta('ID')); ?><br>
                                        <?php endif; ?>
                                    </p>




                                    <?php if (function_exists('the_field')): ?>
                                        <div>
                                            <h3><?php _e('Related Post', 'alpha'); ?></h3>

                                            <?php
                                            $related_post = get_field('related_posts');

                                            $alpha_rp = new WP_Query(array(
                                                'post__in' => $related_post,
                                                'orderby' => 'post__in'
                                            ));

                                            while ($alpha_rp->have_posts()) {
                                                $alpha_rp->the_post();
                                            ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <h4><?php the_title(); ?></h4>
                                                </a>

                                            <?php
                                                wp_reset_query();
                                            }


                                            ?>
                                        </div>
                                    <?php endif; ?>









                                </div>
                            </div>
                        </div>



                        <?php
                        if (!post_password_required()) {
                            comments_template();
                        }
                        ?>

                    </div>
                    </div>
                    <?php if (is_active_sidebar("sidebar-1")) : ?>
                        <div class="col-md-4">

                            <?php
                            if (is_active_sidebar("sidebar-1")) {
                                dynamic_sidebar("sidebar-1");
                            }
                            ?>

                        </div>
                    <?php endif; ?>
                </div>
        </div>



        <?php get_footer(); ?>