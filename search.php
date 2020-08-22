<?php get_header(); ?>

<body <?php body_class( );?>>

<?php get_template_part( "/template-parts/common/hero" ); ?>

<div class="posts">

<?php
if (!have_posts()) {
    ?>
   <div class="container">
   <div class="row">
   <div class="col-md-12 text-center">
   <h2>
    <?php  _e('No results found'); ?>
   
   </h2>
   </div></div></div>
   <?php
}
?>


<?php 
while (have_posts()) {
    the_post(  );
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <h2>You have search for: <?php _e(the_search_query(  )); ?></h2>
            </div>
        </div>
    </div>
    <?php
    
    get_template_part( "post-formats/content", get_post_format(  ) );

}
?>
    


    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                    the_posts_pagination( array(
                    "screen_reader_text" => ' ',
                    "prev_text" => "New",
                    "next_text" => "Old",
                    "mid_size" => 3
                    ) );
                ?>
            </div>
        </div>
    </div>




</div>

<?php get_footer(  );?>



