<?php
/**
* Template Name: Custom Query
*/
?>



<?php get_header(); ?>

<body <?php body_class( );?>>

<?php get_template_part( "/template-parts/common/hero" ); ?>

<div class="posts text-center">


<?php 
$paged = get_query_var("paged") ? get_query_var("paged") : 1;
$post_ids = array(212,41,38,5,11,15,54,46);
$total = 10;
$posts_per_page = 3;
$_p = get_posts( array(
    'posts_per_page' => $posts_per_page,
    'author__in' => array(2),
    'numberposts' => $total,
    // 'post__in' => $post_ids,
    'orderby' =>'post__in',
    'paged' => $paged
) );



foreach ($_p as $post) {
    setup_postdata($post);
    ?>
    <a href="<?php echo the_permalink(  ); ?>"><h2><?php echo the_title( ); ?></h2></a>
<?php
}
wp_reset_postdata(  );
?>

<div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                echo paginate_links( array(
                    'total'=> ceil( $total / $posts_per_page )
                ) );
                ?>
            </div>
        </div>
    </div>


    

</div>

<?php get_footer(  );?>

