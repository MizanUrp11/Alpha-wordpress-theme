<?php get_header(); ?>

<body <?php body_class( );?>>

<?php get_template_part( "/template-parts/common/hero" ); ?>



<div class="posts text-center">

<!-- <h2>Posts under <?php //echo single_tag_title(  ); ?></h2> -->

<?php 
while (have_posts()) {
    the_post(  );
    ?>
    <a href="<?php echo the_permalink(  ); ?>"><h2><?php echo the_title( ); ?></h2></a>
<?php


}
?>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 offset-4 text-center">
                <?php
                    the_posts_pagination( array(
                        'screen_reader_text' => __( ' ' ),
                        "prev_text" => "Back",
                        "next_text" => "Next",
                        "mid_size" => 5,
                    ) );
                ?>
            </div>
        </div>
    </div>

</div>


<div class="container">
    
<div class="authorsection border p-4">
    <div class="row">
        <div class="col-md-2 authorimage">
        <?php echo get_avatar( get_the_author_meta( "id" ) ); ?>
        </div>
        <div class="col-md-10">
        <h4>
        <?php echo strtoupper(get_the_author_meta( "display_name" ));?>
        </h4>
        <p>
        <?php echo get_the_author_meta( "nicename" ); ?>
        </p>
        <p>
           <?php echo get_the_author_meta( "description" ); ?>
        </p>
        </div>
    </div>
</div>
</div>






<?php get_footer(  );?>



