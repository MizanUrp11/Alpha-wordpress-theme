<?php get_header(); ?>

<body <?php body_class( );?>>

<?php get_template_part( "/template-parts/common/hero" ); ?>

<div class="posts text-center">


<h2>Posts under 

<?php
if(is_month(  )){
    $month = esc_html( get_query_var( "monthnum" ) );
    $dateObj = DateTime::createFromFormat("!m",$month);
    echo $dateObj-> format("F");
}elseif(is_year(  )){
    echo esc_html( get_query_var( "year" ) );
}elseif(is_day(  )){
    $day = esc_html( get_query_var( "day" ) );
    $month = esc_html( get_query_var( "monthnum" ) );
    $year = esc_html( get_query_var( "year" ) );
    printf("%s/%s/%s",$day,$month,$year);
}
?>
</h2>

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



