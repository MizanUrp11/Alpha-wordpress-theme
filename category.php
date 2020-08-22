<?php get_header(); ?>

<body <?php body_class( );?>>

<?php get_template_part( "/template-parts/common/hero" ); ?>

<div class="posts text-center">


<h2>Posts under <?php echo single_cat_title(  ); ?></h2>

<?php 
while (have_posts()) {
    the_post(  );
    ?>
    <a href="<?php echo the_permalink(  ); ?>"><h2><?php echo the_title( ); ?></h2></a>
<?php


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



