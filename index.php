<?php get_header(); ?>

<body <?php body_class( );?>>

<?php get_template_part( "/template-parts/common/hero" ); ?>

<div class="posts">

<?php 
while (have_posts()) {
    the_post(  );
    get_template_part( "post-formats/content", get_post_format(  ) );

}
?>
    

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12"></div>
                <?php
                    the_posts_pagination( array(
                    "screen_reader_text" => ' ',
                    "prev_text" => "Newer",
                    "next_text" => "Older",
                    "mid_size" => 3
                    ) );
                ?>
           
        </div>
    </div>




</div>

<?php get_footer(  );?>



